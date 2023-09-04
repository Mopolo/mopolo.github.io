<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

final readonly class School
{
    public function __construct(
        public int    $year,
        public string $name,
        public string $place,
    ) {
    }
}
