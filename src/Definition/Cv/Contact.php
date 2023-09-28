<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition\Cv;

use Mopolo\Cv\Support\Str;
use function base64_decode;
use function base64_encode;

final readonly class Contact
{
    public string $email;
    public string $linkedin;
    public string $twitter;
    public string $github;
    public string $gitlab;
    public Mastodon $mastodon;

    public function __construct(
        string $email,
        string $linkedin,
        string $twitter,
        string $github,
        string $gitlab,
        Mastodon $mastodon,
    ) {
        $email = base64_decode($email);
        $this->email = Str::random(5) . base64_encode(Str::random(5) . $email . Str::random(5)) . Str::random(5);
        $this->linkedin = $linkedin;
        $this->twitter = $twitter;
        $this->github = $github;
        $this->gitlab = $gitlab;
        $this->mastodon = $mastodon;
    }
}
