<?php
declare(strict_types=1);

namespace Mopolo\Cv;

use Mopolo\Cv\Definition\Cv;
use Mopolo\Cv\Definition\Highlights;
use Mopolo\Cv\Definition\Image;
use Mopolo\Cv\Gson\HighlightsCreator;
use Mopolo\Cv\Gson\ImageCreator;
use Mopolo\Cv\Gson\StringAdapter;
use Mopolo\Cv\Support\Translator;
use Tebru\Gson\Gson;

final class Generator
{
    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function build(): Cv
    {
        $gson = Gson::builder()
            ->setDateTimeFormat('Y-m-d')
            ->registerType('string', new StringAdapter($this->translator))
            ->registerType(Highlights::class, new HighlightsCreator($this->translator))
            ->registerType(Image::class, new ImageCreator())
            ->build();

        /** @var Cv $data */
        $data = $gson->fromJson(
            file_get_contents(__DIR__ . '/../resources/data/cv.json'),
            Cv::class
        );

        return $data;
    }
}
