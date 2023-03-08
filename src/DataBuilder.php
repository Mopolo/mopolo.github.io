<?php
declare(strict_types=1);

namespace Mopolo\Cv;

use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use Mopolo\Cv\Definition\Data;
use Mopolo\Cv\Definition\Image;
use SplFileObject;

final class DataBuilder
{
    public function build(): Data
    {
        return (new MapperBuilder())
            ->supportDateFormats('Y-m-d')
            ->registerConstructor(Image::fromKey(...))
            ->mapper()
            ->map(
                Data::class,
                Source::file(new SplFileObject(__DIR__ . '/../resources/data/cv.json'))
                    ->camelCaseKeys()
            );
    }
}
