<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use function substr;

final class Image
{
    /** @psalm-pure */
    public function __construct(
        public readonly string $id,
        public readonly string $url,
        public readonly string $thumbnail,
    ) {
    }

    /** @psalm-pure */
    public static function fromKey(string $value): self
    {
        $path = '/img/projects/' . substr($value, 4);

        return new self($value, $path, '/img/thumbnails/' . substr($path, 5));
    }
}
