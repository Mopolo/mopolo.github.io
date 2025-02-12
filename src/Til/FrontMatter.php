<?php

declare(strict_types=1);

namespace Mopolo\Cv\Til;

final readonly class FrontMatter
{
    public function __construct(
        public string $category,
        public string $title,
        /** @var array<string>|null */
        public ?array $sources = null,
    ) {
    }
}
