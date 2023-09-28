<?php

declare(strict_types=1);

namespace Mopolo\Cv\Definition\Links;

final readonly class Link
{
    public string $host;

    /**
     * @param array<string> $tags
     */
    public function __construct(
        public \DateTimeImmutable $date,
        public string $title,
        public string $url,
        public array $tags,
        public string $description,
    ) {
        $this->host = parse_url($url, PHP_URL_HOST);
    }
}
