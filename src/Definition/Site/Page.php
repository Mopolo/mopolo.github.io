<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Site;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Page
{
    public string $id;

    public Colors $colors;
}
