<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

final readonly class Project
{
    /**
     * @param array<string> $tags
     * @param array<Image> $images
     * @param array<Section> $sections
     */
    public function __construct(
        public string  $name,
        public array   $tags = [],
        public array   $images = [],
        public ?string $highlights = null,
        public array   $sections = [],
        public ?string $url = null,
        public ?string $summary = null,
    ) {
    }
}
