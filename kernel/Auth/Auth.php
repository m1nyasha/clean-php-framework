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
            'email' => $username,
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
        return $this->session->has('user_id');
    }

    public function user(): ?array
    {
        if (! $this->check()) {
            return null;
        }

        return $this->db->first('users', [
            'id' => $this->session->get('user_id'),
        ]);
    }

    public function logout(): void
    {
        $this->session->remove('user_id');
    }
}
