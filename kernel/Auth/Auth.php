<?php

namespace App\Kernel\Auth;

use App\Kernel\Database\DatabaseInterface;

class Auth implements AuthInterface
{
    public function __construct(
        private DatabaseInterface $db
    ) {
    }

    public function attempt(string $username, string $password): bool
    {
        // TODO: Implement attempt() method.
    }

    public function check(): bool
    {
        // TODO: Implement check() method.
    }

    public function user(): ?array
    {
        // TODO: Implement user() method.
    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }
}
