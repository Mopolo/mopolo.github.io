<?php
declare(strict_types=1);

namespace Mopolo\Cv;

use CuyZ\Valinor\Mapper\Source\FileSource;
use CuyZ\Valinor\MapperBuilder;
use Mopolo\Cv\Definition\Cv;
use Mopolo\Cv\Binding\DateTimeBinding;
use Mopolo\Cv\Binding\HighlightsBinding;
use Mopolo\Cv\Binding\ImageBinding;
use Mopolo\Cv\Binding\StringBinding;
use Mopolo\Cv\Support\Translator;
use SplFileObject;

final class Generator
{
    private Translator $translator;
    private DateTimeBinding $dateTimeBinding;
    private StringBinding $stringBinding;
    private ImageBinding $imageBinding;
    private HighlightsBinding $highlightsBinding;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
        $this->dateTimeBinding = new DateTimeBinding();
        $this->stringBinding = new StringBinding($translator);
        $this->imageBinding = new ImageBinding();
        $this->highlightsBinding = new HighlightsBinding($translator);
    }

    public function build(): Cv
    {
        return (new MapperBuilder())
            ->bind($this->dateTimeBinding)
            ->bind($this->stringBinding)
            ->bind($this->imageBinding)
            ->bind($this->highlightsBinding)
            ->mapper()
            ->map(
                Cv::class,
                new FileSource(new SplFileObject(__DIR__ . '/../resources/data/cv.json'))
            );
    }
}
