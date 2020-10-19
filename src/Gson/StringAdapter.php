<?php
declare(strict_types=1);

namespace Mopolo\Cv\Gson;

use Mopolo\Cv\Support\Translator;
use Tebru\Gson\Context\ReaderContext;
use Tebru\Gson\Context\WriterContext;
use Tebru\Gson\TypeAdapter;

final class StringAdapter extends TypeAdapter
{
    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function read($value, ReaderContext $context)
    {
        if (str_starts_with($value, 'l:')) {
            return $this->translator->translate($value);
        }

        return $value;
    }

    public function write($value, WriterContext $context)
    {
        return $value;
    }
}
