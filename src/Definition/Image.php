<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Image
{
    public readonly string $thumbnail;

    public function __construct(
        public readonly string $id,
        public readonly string $url,
    ) {
        $this->thumbnail = '/img/thumbnails/' . substr($url, 5);
    }
}
