<?php
declare(strict_types=1);

namespace Mopolo\Cv\Definition;

/**
 * @psalm-immutable
 */
final class Links
{
    public string $github;
    public string $gitlab;

    public function __construct(string $github, string $gitlab)
    {
        $this->github = $github;
        $this->gitlab = $gitlab;
    }
}
