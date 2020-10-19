<?php
declare(strict_types=1);

namespace Mopolo\Cv\Support;

use Symfony\Contracts\Translation\TranslatorInterface;

final class Translator
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function translate(string $key): string
    {
        if (str_starts_with($key, 'l:')) {
            $key = substr($key, 2);
        }

        $message = trim($this->translator->trans($key));

        return empty($message) ? $key : $message;
    }
}
