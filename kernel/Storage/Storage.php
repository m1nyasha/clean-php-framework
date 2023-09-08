<?php

namespace App\Kernel\Storage;

class Storage implements StorageInterface
{
    public function get(string $path): string|false
    {
        if (file_exists($this->storagePath($path))) {
            return file_get_contents($this->storagePath($path));
        }

        return false;
    }

    public function url(string $path): string
    {
        return "http://localhost:8000/storage/$path";
    }

    private function storagePath(string $path = ''): string
    {
        return APP_PATH."/storage/$path";
    }
}
