<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class Project
{
    public string $name;
    public ?string $url = null;
    public ?string $summary;

    /** @var string[] */
    public array $tags;

    /** @var Image[] */
    public array $images;

    public ?Highlights $highlights;

    /** @var Section[] */
    public array $sections;

    /**
     * @param string $name
     * @param string[] $tags
     * @param string|null $url
     * @param string|null $summary
     * @param array $images
     * @param Highlights|null $highlights
     * @param Section[] $sections
     */
    public function __construct(string $name, array $tags, ?string $url, ?string $summary, array $images, ?Highlights $highlights, array $sections)
    {
        $this->name = $name;
        $this->tags = $tags;
        $this->url = $url;
        $this->summary = $summary;
        $this->images = $images;
        $this->highlights = $highlights;
        $this->sections = $sections;
    }
}
