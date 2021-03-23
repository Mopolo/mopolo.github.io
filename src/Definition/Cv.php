<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Cv
{
    public Contact $contact;

    public Links $links;

    /** @var Skill[] */
    public array $skills;

    /** @var Work[] */
    public array $work;

    /** @var Project[] */
    public array $projects;

    /** @var School[] */
    public array $studies;
}
