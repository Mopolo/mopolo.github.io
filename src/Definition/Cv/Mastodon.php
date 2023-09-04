<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

final readonly class Mastodon
{
    public function __construct(
        public string $url,
        public string $username,
    ) {
    }
}
