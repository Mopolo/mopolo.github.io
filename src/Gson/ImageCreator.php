<?php
declare(strict_types=1);

namespace Mopolo\Cv\Gson;

use Mopolo\Cv\Definition\Image;
use Tebru\Gson\JsonDeserializationContext;
use Tebru\Gson\JsonDeserializer;
use Tebru\PhpType\TypeToken;

final class ImageCreator implements JsonDeserializer
{
    public function deserialize($value, TypeToken $type, JsonDeserializationContext $context)
    {
        $path = '/img/projects/' . substr($value, 4);

        return new Image($value, $path);
    }
}
