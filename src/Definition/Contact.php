<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

use Mopolo\Cv\Support\Str;

use function base64_encode;

final class Contact
{
    public readonly string $email;
    public readonly string $linkedin;
    public readonly string $twitter;

    public function __construct(
        string $email,
        string $linkedin,
        string $twitter,
    ) {
        $this->email = Str::random(5) . base64_encode(Str::random(5) . $email . Str::random(5)) . Str::random(5);
        $this->linkedin = $linkedin;
        $this->twitter = $twitter;
    }
}
