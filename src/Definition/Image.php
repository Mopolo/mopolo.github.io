<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class Image
{
    public string $id;
    public string $url;

    public function __construct(string $id, string $url)
    {
        $this->id = $id;
        $this->url = $url;
    }
}
