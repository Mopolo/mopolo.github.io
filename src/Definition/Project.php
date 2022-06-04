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
        public readonly ?string $url,
        public readonly ?string $summary,
        public readonly array $tags,
        public readonly array $images,
        public readonly ?Highlights $highlights,
        public readonly array $sections,
    ) {
    }
}
