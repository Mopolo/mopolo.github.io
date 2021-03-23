<?php
declare(strict_types=1);

namespace Mopolo\Cv\Site;

use Intervention\Image\Constraint;
use Intervention\Image\ImageManager;
use Symfony\Component\Finder\Finder;

use function file_exists;
use function file_get_contents;
use function json_decode;

final class SiteBuilder
{
    public const DEFAULT_LOCALE = 'fr';
    public const LOCALES = ['fr', 'en'];
    public const PAGES = ['index', 'work', 'opensource', 'studies', 'contact'];
    private const BUILD_DIR = __DIR__ . '/../../docs';
    private const RESOURCES_DIR = __DIR__ . '/../../resources';
    private const IMG_DIR = self::RESOURCES_DIR . '/img';
    private const PUBLIC_DIR = __DIR__ . '/../../public';
    private const MIX_MANIFEST_FILE = self::PUBLIC_DIR . '/mix-manifest.json';

    private string $env;
    private ImageManager $images;

    public function __construct(string $env)
    {
        $this->env = $env;
        $this->images = new ImageManager(['driver' => 'gd']);
    }

    public function build(): void
    {
        if (!$this->cleanup()) {
            throw new \Exception('Cleanu failed');
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

            file_put_contents(
                $this->path('404', $locale) . '.html',
                $renderer->renderPage('404')
            );
        }
    }

    public function thumbnails(): void
    {
        @mkdir(self::PUBLIC_DIR . '/img/thumbnails', 0777, true);

        $finder = new Finder();

        $finder->files()
            ->name(['*.jpg', '*.jpeg', '*.png'])
            ->in(self::IMG_DIR);

        foreach ($finder as $file) {
            $newPath = self::PUBLIC_DIR . '/img/thumbnails/' . $file->getRelativePath();
            $newFilename = $newPath . '/' . $file->getFilename();

            @mkdir($newPath, 0777, true);

            $image = $this->images->make($file->getPathname());

            $newWidth = 50;
            $newHeight = null;

            if ($image->height() > $image->width()) {
                [$newWidth, $newHeight] = [$newHeight, $newWidth];
            }

            $image->resize($newWidth, $newHeight, function (Constraint $constraint) {
                $constraint->aspectRatio();
            })
                ->save($newFilename);
        }
    }

    private function path(string $page, string $locale): string
    {
        $path = self::BUILD_DIR;

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
        return $this->deleteDirectory(self::BUILD_DIR);
    }

    private function deleteDirectory(string $dir): bool
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
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
        if (!file_exists(self::MIX_MANIFEST_FILE)) {
            return '/css/style.css';
        }

        $manifest = json_decode(file_get_contents(self::MIX_MANIFEST_FILE), true);

        return $manifest['/css/style.css'] ?? '/css/style.css';
    }
}
