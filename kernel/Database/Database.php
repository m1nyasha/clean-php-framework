<?php

namespace App\Kernel\Database;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO(
            'mysql:host=localhost;dbname=php-mvc',
            'root',
            'root'
        );
    }

    public function insert(string $table, array $data): int
    {
        // TODO: Implement insert() method.
    }
}
