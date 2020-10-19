<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class Contact
{
    public string $email;
    public string $linkedin;
    public string $twitter;

    public function __construct(string $email, string $linkedin, string $twitter)
    {
        $this->email = $email;
        $this->linkedin = $linkedin;
        $this->twitter = $twitter;
    }
}
