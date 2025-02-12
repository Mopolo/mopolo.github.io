<?php

declare(strict_types=1);

namespace Mopolo\Cv\Til;

final readonly class Entry
{
    public function __construct(
        public FrontMatter $frontMatter,
        public string $content,
        public string $slug,
        public string $url,
    ) {}
}
