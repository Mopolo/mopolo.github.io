<?php
declare(strict_types=1);

namespace Mopolo\Cv;

use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use Mopolo\Cv\Binding\DateTimeBinding;
use Mopolo\Cv\Binding\HighlightsBinding;
use Mopolo\Cv\Binding\ImageBinding;
use Mopolo\Cv\Binding\StringBinding;
use Mopolo\Cv\Definition\Cv;
use Mopolo\Cv\Support\Translator;
use SplFileObject;

final class Generator
{
    private DateTimeBinding $dateTimeBinding;
    private StringBinding $stringBinding;
    private ImageBinding $imageBinding;
    private HighlightsBinding $highlightsBinding;

    public function __construct(Translator $translator)
    {
        $this->dateTimeBinding = new DateTimeBinding();
        $this->stringBinding = new StringBinding($translator);
        $this->imageBinding = new ImageBinding();
        $this->highlightsBinding = new HighlightsBinding($translator);
    }

    public function build(): Cv
    {
        return (new MapperBuilder())
            ->registerConstructor($this->dateTimeBinding)
            ->alter($this->stringBinding)
            ->registerConstructor($this->imageBinding)
            ->registerConstructor($this->highlightsBinding)
            ->mapper()
            ->map(
                Cv::class,
                Source::file(new SplFileObject(__DIR__ . '/../resources/data/cv.json'))
            );
    }
}
