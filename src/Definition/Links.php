<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Links
{
    public string $github;

    public string $gitlab;
}
