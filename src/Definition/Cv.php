<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class Cv
{
    public Contact $contact;
    public Links $links;

    /** @var Work[] */
    public array $work;

    /** @var Project[] */
    public array $projects;

    /** @var School[] */
    public array $studies;

    /**
     * @param Contact $contact
     * @param Links $links
     * @param Work[] $work
     * @param Project[] $projects
     * @param School[] $studies
     */
    public function __construct(Contact $contact, Links $links, array $work, array $projects, array $studies)
    {
        $this->contact = $contact;
        $this->links = $links;
        $this->work = $work;
        $this->projects = $projects;
        $this->studies = $studies;
    }
}
