<?php

namespace App\Kernel\Upload;

class UploadedFile implements UploadedFileInterface
{
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly string $tmpName,
        public readonly int $error,
        public readonly int $size,
    ) {
    }

    public function move(string $path, string $fileName = null): string|false
    {
        $storagePath = APP_PATH."/storage/$path";

        $fileName = $fileName ?? $this->getRandomName();

        if (! is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        $storagePath .= "/$fileName";

        if (move_uploaded_file($this->tmpName, $storagePath)) {
            return "storage/$path/$fileName";
        }

        return false;
    }

    public function getExtension(): string
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    private function getRandomName(): string
    {
        return md5(uniqid(rand(), true)).'.'.$this->getExtension();
    }
}
