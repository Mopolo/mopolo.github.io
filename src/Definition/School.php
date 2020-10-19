<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class School
{
    public string $start;
    public ?string $end = null;
    public string $name;
    public string $place;

    public function __construct(string $start, ?string $end, string $name, string $place)
    {
        $this->start = $start;
        $this->end = $end;
        $this->name = $name;
        $this->place = $place;
    }
}
