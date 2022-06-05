<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Site;

final class Colors
{
    public function __construct(
        public readonly string $textLightBg,
        public readonly string $textDarkBg,
        public readonly string $bg,
        public readonly string $home,
        public readonly string $header,
    ) {
    }
}
