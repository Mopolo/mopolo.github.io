<?php
declare(strict_types=1);

namespace Mopolo\Cv\Site;

final class SiteBuilder
{
    public const DEFAULT_LOCALE = 'fr';
    public const LOCALES = ['fr', 'en'];
    public const PAGES = ['index', 'work', 'opensource', 'studies', 'contact'];
    private const BUILD_DIRECTORY = __DIR__ . '/../../docs';

    private string $env;

    public function __construct(string $env)
    {
        $this->env = $env;
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

    private function path(string $page, string $locale): string
    {
        $path = self::BUILD_DIRECTORY;

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
        return $this->deleteDirectory(self::BUILD_DIRECTORY);
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
}
