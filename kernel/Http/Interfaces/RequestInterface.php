<?php

namespace App\Kernel\Http\Interfaces;

interface RequestInterface
{
    public static function createFromGlobals(): static;

    public function uri(): string;

    public function method(): string;

    public function input(string $key, $default = null): mixed;

    public function file(string $key, $default = null): mixed;

    public function validate(array $roles): bool;

    public function errors(): array;
}
