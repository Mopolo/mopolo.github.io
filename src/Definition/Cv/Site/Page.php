<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv\Site;

final readonly class Page
{
    public function __construct(
        public string $id,
        public Colors $colors,
    ) {
    }
}
