<?php

namespace App\Kernel\Auth;

interface AuthInterface
{
    public function attempt(string $username, string $password): bool;

    public function check(): bool;

    public function user(): ?array;

    public function logout(): void;
}
