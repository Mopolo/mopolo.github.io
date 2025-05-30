<?php

declare(strict_types=1);

namespace Mopolo\Cv\Til;

use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use Exception;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;
use League\CommonMark\MarkdownConverter;
use Mopolo\Cv\Request;
use Mopolo\Cv\Site\Paths;
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

final class Renderer
{
    private readonly Request $request;
    private readonly MarkdownConverter $markdown;

    public function __construct(Request $request)
    {
        $this->request = $request;

        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new FrontMatterExtension());
        $environment->addExtension(new HighlightCodeExtension('nord'));

        $this->markdown = new MarkdownConverter($environment);
    }

    /**
     * @return array<string, array<Entry>>
     */
    public function renderList(): array
    {
        $finder = new Finder();
        $finder->files()
            ->in(Paths::resources('/data/til'))
            ->name('*.md')
            ->sortByName();

        $tils = [];

        foreach ($finder as $file) {
            $entry = $this->renderFile($file);

            $tils[$entry->frontMatter->category][] = $entry;
        }

        return $tils;
    }

    public function renderFromSlug(string $slug): Entry
    {
        return $this->renderFile(Paths::resources('/data/til/' . $slug . '.md'));
    }

    public function renderFile(string|SplFileInfo $pathOrFile): Entry
    {
        if ($pathOrFile instanceof SplFileInfo) {
            return $this->render($pathOrFile->getRealPath(), $pathOrFile->getContents());
        }

        if (!file_exists($pathOrFile)) {
            throw new Exception('TIL not found');
        }

        $content = file_get_contents($pathOrFile);

        if (!is_string($content)) {
            throw new Exception('Invalid TIL content');
        }

        return $this->render($pathOrFile, $content);
    }

    public function render(string $path, string $content): Entry
    {
        $parts = explode('/', $path);
        $slug = implode('/', array_slice($parts, -2, 2));
        $slug = str_replace('.md', '', $slug);

        $result = $this->markdown->convert($content);

        if (!$result instanceof RenderedContentWithFrontMatter) {
            throw new Exception('Missing front matter in ' . $path);
        }

        $rawFrontMatter = $result->getFrontMatter();

        if (!is_array($rawFrontMatter)) {
            throw new Exception("Front matter is not an array");
        }

        $frontMatter = (new MapperBuilder())->mapper()->map(FrontMatter::class, Source::array($rawFrontMatter));

        return new Entry(
            $frontMatter,
            $result->getContent(),
            $slug,
            $this->url($slug),
        );
    }

    private function url(string $slug): string
    {
        if ($this->request->env() === 'dev') {
            return '/?page=til/' . $slug;
        }

        return '/til/' . $slug;
    }
}
