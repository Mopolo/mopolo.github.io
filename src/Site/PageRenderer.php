<?php
declare(strict_types=1);

namespace Mopolo\Cv\Site;

use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;
use League\CommonMark\MarkdownConverter;
use Mopolo\Cv\Definition\Cv;
use Mopolo\Cv\Definition\Site\Colors;
use Mopolo\Cv\Generator;
use Mopolo\Cv\Support\Translator;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator as SymfonyTranslator;
use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;
use Twig\Extra\String\StringExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

final class PageRenderer
{
    private string $locale;
    private string $env;
    private Translator $translator;
    private Environment $twig;
    private Cv $definition;

    public function __construct(string $locale, string $env)
    {
        setlocale(LC_ALL, $locale);
        \Locale::setDefault($locale);

        $this->locale = $locale;
        $this->env = $env;

        $translator = new SymfonyTranslator($locale);
        $translator->addLoader('xlf', new XliffFileLoader());
        $translator->addResource('xlf', __DIR__ . '/../../resources/i18n/fr.xlf', 'fr');
        $translator->addResource('xlf', __DIR__ . '/../../resources/i18n/en.xlf', 'en');

        $this->translator = new Translator($translator);

        $loader = new FilesystemLoader(__DIR__ . '/../../resources/views');
        $this->twig = new Environment($loader);
        $this->twig->addExtension(new IntlExtension());
        $this->twig->addExtension(new StringExtension());
        $this->twig->addFilter(
            new TwigFilter('trans', fn(string $value) => $this->translator->translate($value))
        );

        $this->definition = (new Generator($this->translator))->build();
    }

    public function renderPage(string $page): string
    {
        $colors = $this->colors($page);

        if ($colors instanceof Colors) {
            $this->twig->addFilter(
                new TwigFilter(
                    'md',
                    fn (string $value) => ($this->makeMarkdownConverter($colors->textLightBg))->convert($value)->getContent())
            );
        }

        return $this->twig->render(
            'pages/' . $page . '.twig',
            [
                'data' => $this->definition,
                'urls' => $this->menu($page),
                'langs' => $this->langs($page),
                'locale' => $this->locale,
                'title' => $this->translator->translate('site.'),
                'css' => SiteBuilder::findPublicCssFilePath(),
                'colors' => $colors,
            ]
        );
    }

    private function colors(string $pageId): ?Colors
    {
        foreach ($this->definition->site->pages as $page) {
            if ($page->id === $pageId) {
                return $page->colors;
            }
        }

        return null;
    }

    private function langs(string $currentPage): array
    {
        $urls = [];

        foreach (SiteBuilder::LOCALES as $locale) {
            $urls[] = [
                'label' => strtoupper($locale),
                'href' => $this->url($currentPage, $locale),
                'current' => $locale === $this->locale,
            ];
        }

        return $urls;
    }

    private function menu(string $currentPage): array
    {
        $urls = [];

        foreach (SiteBuilder::PAGES as $page) {
            $urls[$page] = [
                'href' => $this->url($page, $this->locale),
                'label' => $this->translator->translate('site.menu.' . $page),
                'current' => $page === $currentPage || ($page === 'index' && $currentPage === '404'),
                'colors' => $this->colors($page),
            ];
        }

        $urls['github'] = [
            'href' => $this->definition->links->github,
            'label' => 'Github',
            'colors' => $this->colors('github'),
        ];

        return $urls;
    }

    private function url(string $page, string $locale): string
    {
        if ($this->env === 'dev') {
            if ($page === 'index') {
                return '/?lang=' . $locale;
            }

            return '/?page=' . $page . '&lang=' . $locale;
        }

        $url = '/';

        if ($locale !== SiteBuilder::DEFAULT_LOCALE) {
            $url .= $locale . '/';
        }

        if ($page === 'index') {
            return $url;
        }

        return $url . $page;
    }

    private function makeMarkdownConverter(string $linkClasses): MarkdownConverter
    {
        $config = [
            'external_link' => [
                'internal_hosts' => 'mopolo.dev',
                'open_in_new_window' => false,
                'html_class' => "$linkClasses underline",
                'nofollow' => '',
                'noopener' => 'external',
                'noreferrer' => 'external',
            ],
        ];

        $environment = new \League\CommonMark\Environment\Environment($config);
        $environment->addExtension(new InlinesOnlyExtension());
        $environment->addExtension(new ExternalLinkExtension());

        return new MarkdownConverter($environment);
    }
}
