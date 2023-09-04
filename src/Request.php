<?php

declare(strict_types=1);

namespace Mopolo\Cv;

use Locale;
use LogicException;
use Mopolo\Cv\Definition\Cv\Data;
use Mopolo\Cv\Definition\Cv\Site\Colors;
use function setlocale;

final class Request
{
    private string $env;
    private string $locale;
    private Data $data;
    private ?string $page = null;

    private function __construct(string $env, string $locale, Data $data)
    {
        $this->env = $env;
        $this->locale = $locale;
        $this->data = $data;
    }

    public static function start(string $env, string $locale, Data $data): Request
    {
        $request = new Request($env, $locale, $data);

        setlocale(LC_ALL, $locale);
        Locale::setDefault($locale);

        return $request;
    }

    public function navigateTo(string $page): Request
    {
        $request = clone $this;
        $request->page = $page;

        return $request;
    }

    public function env(): string
    {
        return $this->env;
    }

    public function locale(): string
    {
        return $this->locale;
    }

    public function page(): string
    {
        if ($this->page === null) {
            throw new LogicException('`Request::page` ne peut être appelé sans avoir appelé `Request::navigateTo`');
        }

        return $this->page;
    }

    public function data(): Data
    {
        return $this->data;
    }

    public function colors(?string $forPage = null): ?Colors
    {
        foreach ($this->data->site->pages as $page) {
            if ($page->id === ($forPage ?? $this->page())) {
                return $page->colors;
            }
        }

        return null;
    }
}
