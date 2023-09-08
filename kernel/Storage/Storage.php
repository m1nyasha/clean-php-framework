<?php

namespace App\Kernel\Storage;

use App\Kernel\Config\ConfigInterface;
use App\Kernel\Http\Interfaces\RequestInterface;

class Storage implements StorageInterface
{
    public function __construct(
        private ConfigInterface $config,
        private RequestInterface $request
    ) {
    }

    public function get(string $path): string|false
    {
        if (file_exists($this->storagePath($path))) {
            return file_get_contents($this->storagePath($path));
        }

        return false;
    }

    public function url(string $path): string
    {
        $host = $this->config->get('app.url') ?? $this->request->url();

        return "$host/storage/$path";
    }

    private function storagePath(string $path = ''): string
    {
        return APP_PATH."/storage/$path";
    }
}
