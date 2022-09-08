<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Project
{
    /**
     * @param array<string> $tags
     * @param array<Image> $images
     * @param array<Section> $sections
     */
    public function __construct(
        public readonly string $name,
        public readonly array $tags = [],
        public readonly array $images = [],
        public readonly ?Highlights $highlights = null,
        public readonly array $sections = [],
        public readonly ?string $url = null,
        public readonly ?string $summary = null,
    ) {
    }
}
