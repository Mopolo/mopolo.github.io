<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use DateTime;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
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
}
