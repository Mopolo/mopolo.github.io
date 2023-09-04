<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

final readonly class Section
{
    public function __construct(
        public string $name,
        public string $highlights,
    ) {
    }
}
