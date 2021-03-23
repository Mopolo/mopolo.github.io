<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class School
{
    public int $year;

    public string $name;

    public string $place;
}
