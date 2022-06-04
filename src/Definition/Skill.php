<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Skill
{
    public function __construct(
        public readonly string $name,
        public readonly int $level,
    ) {
    }
}
