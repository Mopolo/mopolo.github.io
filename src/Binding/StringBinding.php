<?php
declare(strict_types=1);

namespace Mopolo\Cv\Binding;

use Mopolo\Cv\Support\Translator;

final class StringBinding
{
    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function __invoke(mixed $value): string
    {
        if (str_starts_with($value, 'l:')) {
            return $this->translator->translate($value);
        }

        return $value;
    }
}
