<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Links
{
    public function __construct(
        public readonly string $github,
        public readonly string $gitlab,
    ) {
    }
}
