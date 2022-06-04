<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Highlights
{
    /**
     * @param string[] $lines
     */
    public function __construct(
        public readonly array $lines,
    ) {
    }
}
