<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class Section
{
    public string $name;
    public Highlights $highlights;

    public function __construct(string $name, Highlights $highlights)
    {
        $this->name = $name;
        $this->highlights = $highlights;
    }
}
