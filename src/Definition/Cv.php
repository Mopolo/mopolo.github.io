<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Cv
{
    /**
     * @param array<Skill> $skills
     * @param array<Work> $work
     * @param array<Project> $projects
     * @param array<School> $studies
     */
    public function __construct(
        public readonly Site $site,
        public readonly Contact $contact,
        public readonly Links $links,
        public readonly array $skills,
        public readonly array $work,
        public readonly array $projects,
        public readonly array $studies,
    ) {
    }
}
