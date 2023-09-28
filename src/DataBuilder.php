<?php
declare(strict_types=1);

namespace Mopolo\Cv;

use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use Mopolo\Cv\Definition\Cv\Data;
use Mopolo\Cv\Definition\Cv\Image;

final class DataBuilder
{
    public function build(): Data
    {
        $cv = Source::json(file_get_contents(__DIR__ . '/../resources/data/cv.json'))->camelCaseKeys();
        $links = Source::json(file_get_contents(__DIR__ . '/../resources/data/links.json'))->camelCaseKeys();

        $data = iterator_to_array($cv);
        $data['links'] = $links;

        return (new MapperBuilder())
            ->supportDateFormats('Y-m-d')
            ->registerConstructor(Image::fromKey(...))
            ->mapper()
            ->map(
                Data::class,
                $data,
            );
    }
}
