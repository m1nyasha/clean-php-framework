<?php

namespace App\Kernel\Database;

interface DatabaseInterface
{
    public function connect(): void;

    public function insert(string $table, array $data): int;
}
