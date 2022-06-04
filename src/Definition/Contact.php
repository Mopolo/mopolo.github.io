<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

final class Contact
{
    public function __construct(
        public readonly string $email,
        public readonly string $linkedin,
        public readonly string $twitter,
    ) {
    }
}
