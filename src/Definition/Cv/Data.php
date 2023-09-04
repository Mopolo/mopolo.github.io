<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

final readonly class Data
{
    /**
     * @param array<Skill> $skills
     * @param array<Work> $work
     * @param array<Project> $projects
     * @param array<School> $studies
     */
    public function __construct(
        public Site    $site,
        public Contact $contact,
        public Links   $links,
        public array   $skills,
        public array   $work,
        public array   $projects,
        public array   $studies,
    ) {
    }
}
