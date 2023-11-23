<?php

declare(strict_types=1);

namespace Mopolo\Cv\Til;

final readonly class Entry
{
    public function __construct(
        public string $category,
        public string $title,
        public string $content,
        public string $slug,
        public string $url,
    ) {}
}
