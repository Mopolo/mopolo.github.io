<?php
declare(strict_types=1);

namespace Mopolo\Cv\Binding;

use Mopolo\Cv\Definition\Highlights;
use Mopolo\Cv\Support\Translator;

final class HighlightsBinding
{
    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function __invoke(mixed $value): Highlights
    {
        $lines = $this->translator->translate($value);

        return new Highlights(array_map(fn(string $line) => trim($line), explode("\n", $lines)));
    }
}
