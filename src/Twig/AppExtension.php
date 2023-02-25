<?php

declare(strict_types=1);

namespace Mopolo\Cv\Twig;

use Mopolo\Cv\Support\Translator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class AppExtension extends AbstractExtension
{
    public function __construct(
        private readonly Translator $translator
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('translate', [$this, 'translate']),
        ];
    }

    public function translate(string $value): string
    {
        if (str_starts_with($value, 'l:')) {
            return $this->translator->translate($value);
        }

        return $value;
    }
}
