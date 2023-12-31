<?php

namespace App\Kernel\Http\Interfaces;

use App\Kernel\Upload\UploadedFileInterface;

interface RequestInterface
{
    public static function createFromGlobals(): static;

    public function uri(): string;

    public function url(): string;

    public function method(): string;

    public function input(string $key, $default = null): mixed;

    public function file(string $key): ?UploadedFileInterface;

    public function server(string $key, $default = null): mixed;

    public function schema(): string;

    public function host(): string;

    public function validate(array $roles): bool;

    public function errors(): array;
}
