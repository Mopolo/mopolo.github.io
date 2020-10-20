<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class School
{
    public int $year;
    public string $name;
    public string $place;

    public function __construct(int $year, string $name, string $place)
    {
        $this->year = $year;
        $this->name = $name;
        $this->place = $place;
    }
}
