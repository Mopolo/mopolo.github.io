<?php

declare(strict_types=1);

namespace Mopolo\Cv\Site;

final readonly class Paths
{
    private const PROJECT_ROOT = __DIR__ . '/../../';

    private static function make(string $source, ?string $target = null): string
    {
        $target = $target === null
            ? ""
            : '/' . trim($target, '/');

        return self::PROJECT_ROOT . '/' . trim($source, '/') . $target;
    }

    public static function build(): string
    {
        return self::make('docs');
    }

    public static function resources(?string $target = null): string
    {
        return self::make('resources', $target);
    }

    public static function images(): string
    {
        return self::make('resources/img');
    }

    public static function public(string $path): string
    {
        return self::make('public', $path);
    }
}
