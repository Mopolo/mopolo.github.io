<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Site;

final class Page
{
    public function __construct(
        public readonly string $id,
        public readonly Colors $colors,
    ) {
    }
}
