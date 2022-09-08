<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use DateTime;

final class Work
{
    /**
     * @param array<string> $tags
     * @param array<Project> $projects
     */
    public function __construct(
        public readonly string $name,
        public readonly string $place,
        public readonly DateTime $start,
        public readonly string $intro,
        public readonly string $summary,
        public readonly array $tags = [],
        public readonly array $projects = [],
        public readonly ?DateTime $end = null,
    ) {
    }
}
