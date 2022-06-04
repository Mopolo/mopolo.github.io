<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class School
{
    public function __construct(
        public readonly int $year,
        public readonly string $name,
        public readonly string $place,
    ) {
    }
}
