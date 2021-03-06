<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Highlights
{
    /** @var string[] */
    public array $lines;

    /** @param string[] $lines */
    public function __construct(array $lines)
    {
        $this->lines = $lines;
    }
}
