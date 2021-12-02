<?php
declare(strict_types=1);

namespace Mopolo\Cv\Binding;

use Mopolo\Cv\Definition\Image;

final class ImageBinding
{
    public function __invoke(mixed $value): Image
    {
        $path = '/img/projects/' . substr($value, 4);

        return new Image($value, $path);
    }
}
