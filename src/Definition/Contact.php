<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class Contact
{
    public string $email;

    public string $linkedin;

    public string $twitter;
}
