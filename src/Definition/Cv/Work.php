<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

use DateTime;

final readonly class Work
{
    /**
     * @param array<string> $tags
     * @param array<Project> $projects
     */
    public function __construct(
        public string    $name,
        public string    $place,
        public DateTime  $start,
        public string    $intro,
        public string    $summary,
        public array     $tags = [],
        public array     $projects = [],
        public ?DateTime $end = null,
    ) {
    }
}
