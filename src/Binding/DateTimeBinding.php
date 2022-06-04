<?php

declare(strict_types=1);

namespace Mopolo\Cv\Binding;

use DateTime;

final class DateTimeBinding
{
    public function __invoke(string $value): DateTime
    {
        return DateTime::createFromFormat('Y-m-d', $value);
    }
}
