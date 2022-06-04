<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use Mopolo\Cv\Definition\Site\Page;

final class Site
{
    /**
     * @param array<Page> $pages
     */
    public function __construct(
        public readonly array $pages,
    ) {
    }
}
