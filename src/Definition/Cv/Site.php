<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

use Mopolo\Cv\Definition\Cv\Site\Page;

final readonly class Site
{
    /**
     * @param array<Page> $pages
     */
    public function __construct(
        public array $pages,
    ) {
    }
}
