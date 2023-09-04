<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

use function substr;

final readonly class Image
{
    /** @psalm-pure */
    public function __construct(
        public string $id,
        public string $url,
        public string $thumbnail,
    ) {
    }

    /** @psalm-pure */
    public static function fromKey(string $value): self
    {
        $path = '/img/projects/' . substr($value, 4);

        return new self($value, $path, '/img/thumbnails/' . substr($path, 5));
    }
}
