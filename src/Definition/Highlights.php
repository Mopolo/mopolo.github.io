<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use function array_map;
use function explode;
use function trim;

final class Highlights
{
    /**
     * @param string[] $lines
     */
    public function __construct(
        public readonly array $lines,
    ) {
    }

    /** @psalm-pure */
    public static function fromText(string $lines): Highlights
    {
        return new Highlights(array_map(fn(string $line) => trim($line), explode("\n", $lines)));
    }
}
