<?php
declare(strict_types=1);

namespace Mopolo\Cv\Site;

use Exception;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Symfony\Component\Finder\Finder;
use function file_exists;
use function file_get_contents;
use function json_decode;

final class SiteBuilder
{
    public const DEFAULT_LOCALE = 'fr';
    public const LOCALES = ['fr', 'en'];
    public const PAGES = ['index', 'work', 'projects', 'til', 'studies', 'contact'];

    private string $env;
    private ImageManager $images;

    public function __construct(string $env)
    {
        $this->env = $env;
        $this->images = new ImageManager(new Driver());
    }

    public function build(): void
    {
        if (!$this->cleanup()) {
            throw new Exception('Cleanu failed');
        }

        foreach (self::LOCALES as $locale) {
            $renderer = new PageRenderer($locale, $this->env);

            foreach (self::PAGES as $page) {
                $path = $this->path($page, $locale);

                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                $path .= '/index.html';

                file_put_contents($path, $renderer->renderPage($page));
            }

            $finder = new Finder();
            $finder->files()
                ->in(Paths::resources('data/til'))
                ->name('*.md')
                ->sortByName();

            foreach ($finder as $file) {
                $slug = str_replace('.md', '', $file->getRelativePathname());
                $path = $this->path('til/' . $slug, $locale);

                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                file_put_contents(
                    $this->path('til/' . $slug, $locale) . '/index.html',
                    $renderer->renderPage('til/' . $slug)
                );
            }

            file_put_contents(
                $this->path('404', $locale) . '.html',
                $renderer->renderPage('404')
            );
        }
    }

    public function thumbnails(): void
    {
        @mkdir(Paths::public('/img/thumbnails'), 0777, true);

        $finder = new Finder();

        $finder->files()
            ->name(['*.jpg', '*.jpeg', '*.png'])
            ->in(Paths::images());

        foreach ($finder as $file) {
            $newPath = Paths::public('/img/thumbnails/' . $file->getRelativePath());
            $newFilename = $newPath . '/' . $file->getFilename();

            @mkdir($newPath, 0777, true);

            $image = $this->images->read($file->getPathname());

            $newWidth = 50;
            $newHeight = null;

            if ($image->height() > $image->width()) {
                [$newWidth, $newHeight] = [$newHeight, $newWidth];
            }

            $image->scaleDown($newWidth, $newHeight)->save($newFilename);
        }
    }

    private function path(string $page, string $locale): string
    {
        $path = Paths::build();

        if ($locale !== self::DEFAULT_LOCALE) {
            $path .= '/' . $locale;
        }

        if ($page !== 'index') {
            $path .= '/' . $page;
        }

        return $path;
    }

    private function cleanup(): bool
    {
        return $this->deleteDirectory(Paths::build());
    }

    private function deleteDirectory(string $dir): bool
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        $items = scandir($dir);

        if (!is_array($items)) {
            return false;
        }

        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }

    public static function findPublicCssFilePath(): string
    {
        $mixManifestFile = Paths::public('mix-manifest.json');

        if (!file_exists($mixManifestFile)) {
            return '/css/style.css';
        }

        $manifestContent = file_get_contents($mixManifestFile);

        if ($manifestContent === false) {
            throw new Exception('Could not read mix-manifest.json');
        }

        $manifest = json_decode($manifestContent, true);

        if (!is_array($manifest)) {
            throw new Exception('Could not decode mix-manifest.json');
        }

        return $manifest['/css/style.css'] ?? '/css/style.css';
    }
}
