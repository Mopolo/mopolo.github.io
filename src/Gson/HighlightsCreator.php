<?php
declare(strict_types=1);

namespace Mopolo\Cv\Gson;

use Mopolo\Cv\Definition\Highlights;
use Mopolo\Cv\Support\Translator;
use Tebru\Gson\JsonDeserializationContext;
use Tebru\Gson\JsonDeserializer;
use Tebru\PhpType\TypeToken;

final class HighlightsCreator implements JsonDeserializer
{
    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function deserialize($value, TypeToken $type, JsonDeserializationContext $context)
    {
        $lines = $this->translator->translate($value);

        return new Highlights(array_map(fn (string $line) => trim($line), explode("\n", $lines)));
    }
}
