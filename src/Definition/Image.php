<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Image
{
    public string $id;

    public string $url;

    public string $thumbnail;

    public function __construct(string $id, string $url)
    {
        $this->id = $id;
        $this->url = $url;
        $this->thumbnail = '/img/thumbnails/' . substr($url, 5);
    }
}
