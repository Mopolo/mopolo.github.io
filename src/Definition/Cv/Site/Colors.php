<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv\Site;

final readonly class Colors
{
    public function __construct(
        public string $textLightBg,
        public string $textDarkBg,
        public string $bg,
        public string $home,
        public string $header,
    ) {
    }
}
