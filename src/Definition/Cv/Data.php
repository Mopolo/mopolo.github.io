<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

use Mopolo\Cv\Definition\Links\Link;

final readonly class Data
{
    /**
     * @param array<Skill> $skills
     * @param array<Work> $work
     * @param array<Project> $projects
     * @param array<School> $studies
     * @param array<Link> $links
     */
    public function __construct(
        public Site    $site,
        public Contact $contact,
        public array   $skills,
        public array   $work,
        public array   $projects,
        public array   $studies,
        public array   $links,
    ) {
    }
}
