<?php

namespace App\Kernel\Storage;

interface StorageInterface
{
    public function get(string $path): string|false;

    public function url(string $path): string;
}
