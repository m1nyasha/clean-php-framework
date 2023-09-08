<?php

namespace App\Kernel\Auth;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{
    public function __construct(
        private DatabaseInterface $db,
        private SessionInterface $session
    ) {
    }

    public function attempt(string $username, string $password): bool
    {
        $user = $this->db->first('users', [
            'username' => $username,
        ]);

        if (! $user) {
            return false;
        }

        if (! password_verify($password, $user['password'])) {
            return false;
        }

        $this->session->set('user_id', $user['id']);

        return true;
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
