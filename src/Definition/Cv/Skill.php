<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

final readonly class Skill
{
    public function __construct(
        public string $name,
        public int    $level,
    ) {
    }
}
