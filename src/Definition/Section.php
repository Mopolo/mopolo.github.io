<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Section
{
    public function __construct(
        public readonly string $name,
        public readonly Highlights $highlights,
    ) {
    }
}
