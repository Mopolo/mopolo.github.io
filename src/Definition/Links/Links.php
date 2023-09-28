<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Links;

final readonly class Links
{
    /**
     * @param array<Link> $links
     */
    public function __construct(
        public array $links,
    ) {
    }
}
