<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Mastodon
{
    public function __construct(
        public readonly string $url,
        public readonly string $username,
    ) {
    }
}
