<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
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
}
