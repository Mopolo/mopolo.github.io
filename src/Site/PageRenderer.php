<?php
declare(strict_types=1);

namespace Mopolo\Cv\Site;

use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;
use League\CommonMark\MarkdownConverter;
use Mopolo\Cv\DataBuilder;
use Mopolo\Cv\Request;
use Mopolo\Cv\Support\Str;
use Mopolo\Cv\Support\Translator;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator as SymfonyTranslator;
use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;
use Twig\Extra\String\StringExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

use function rand;

final class PageRenderer
{
    private Request $request;
    private Translator $translator;
    private Environment $twig;

    public function __construct(string $locale, string $env)
    {
        $this->registerWhoops();
        $this->initTranslator($locale);
        $this->startRequest($env, $locale);
        $this->initTwig();
    }

    private function registerWhoops(): void
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }

    private function startRequest(string $env, string $locale): void
    {
        $this->request = Request::start($env, $locale, (new DataBuilder())->build());
    }

    private function initTranslator(string $locale): void
    {
        $translator = new SymfonyTranslator($locale);
        $translator->addLoader('xlf', new XliffFileLoader());
        $translator->addResource('xlf', __DIR__ . '/../../resources/i18n/fr.xlf', 'fr');
        $translator->addResource('xlf', __DIR__ . '/../../resources/i18n/en.xlf', 'en');

        $this->translator = new Translator($translator);
    }

    private function initTwig(): void
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../resources/views');
        $this->twig = new Environment($loader);
        $this->twig->addExtension(new IntlExtension());
        $this->twig->addExtension(new StringExtension());
        $this->twig->addFilter(
            new TwigFilter('trans', fn(string $value) => $this->translator->translate($value))
        );

        $this->twig->addFilter(
            new TwigFilter(
                'md',
                function (string $value) {
                    return ($this->makeMarkdownConverter($this->request->colors()?->textLightBg ?? ''))
                        ->convert($value)
                        ->getContent();
                }
            )
        );
    }

    public function renderPage(string $page): string
    {
        $this->request = $this->request->navigateTo($page);

        return $this->twig->render(
            'pages/' . $page . '.twig',
            [
                'data' => $this->request->data(),
                'urls' => $this->menu(),
                'langs' => $this->langs(),
                'locale' => $this->request->locale(),
                'title' => $this->translator->translate('site.'),
                'css' => SiteBuilder::findPublicCssFilePath(),
                'colors' => $this->request->colors(),
                'random_string' => Str::random(rand(10, 20)),
            ]
        );
    }

    private function langs(): array
    {
        $urls = [];

        foreach (SiteBuilder::LOCALES as $locale) {
            $urls[] = [
                'label' => strtoupper($locale),
                'href' => $this->url($this->request->page(), $locale),
                'current' => $locale === $this->request->locale(),
            ];
        }

        return $urls;
    }

    private function menu(): array
    {
        $urls = [];

        foreach (SiteBuilder::PAGES as $page) {
            $urls[$page] = [
                'href' => $this->url($page, $this->request->locale()),
                'label' => $this->translator->translate('site.menu.' . $page),
                'current' => $page === $this->request->page() || ($page === 'index' && $this->request->page() === '404'),
                'colors' => $this->request->colors($page),
            ];
        }

        $urls['github'] = [
            'href' => $this->request->data()->links->github,
            'label' => 'Github',
            'colors' => $this->request->colors('github'),
        ];

        return $urls;
    }

    private function url(string $page, string $locale): string
    {
        if ($this->request->env() === 'dev') {
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
