<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;
use Mopolo\Cv\Definition\Site\Page;

#[Immutable]
final class Site
{
    /** @var Page[] */
    public array $pages;
}
