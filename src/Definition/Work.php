<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use DateTime;

/**
 * @psalm-immutable
 */
final class Work
{
    public string $name;
    public string $place;
    public DateTime $start;
    public ?DateTime $end;
    public string $intro;
    public string $summary;

    /** @var string[] */
    public array $tags;

    /** @var Project[] */
    public array $projects;

    /**
     * @param string $name
     * @param string $place
     * @param DateTime $start
     * @param DateTime|null $end
     * @param string $intro
     * @param string $summary
     * @param string[] $tags
     * @param Project[] $projects
     */
    public function __construct(string $name, string $place, DateTime $start, ?DateTime $end, string $intro, string $summary, array $tags, array $projects)
    {
        $this->name = $name;
        $this->place = $place;
        $this->start = $start;
        $this->end = $end;
        $this->intro = $intro;
        $this->summary = $summary;
        $this->tags = $tags;
        $this->projects = $projects;
    }
}
