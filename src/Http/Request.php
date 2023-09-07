<?php

namespace App\Http;

class Request
{
    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $files,
        public readonly array $server,
        public readonly array $cookie,
    ) {
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_FILES, $_SERVER, $_COOKIE,);
    }

    public function uri(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}
