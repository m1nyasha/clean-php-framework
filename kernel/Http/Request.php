<?php

namespace App\Kernel\Http;

use App\Kernel\Http\Interfaces\RequestInterface;
use App\Kernel\Upload\UploadedFile;
use App\Kernel\Upload\UploadedFileInterface;
use App\Kernel\Validator\ValidatorInterface;

class Request implements RequestInterface
{
    private ValidatorInterface $validator;

    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $files,
        public readonly array $server,
        public readonly array $cookie,
    ) {
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_FILES, $_SERVER, $_COOKIE,);
    }

    public function uri(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }

    public function validate(array $roles): bool
    {
        $data = [];

        foreach ($roles as $field => $role) {
            $data[$field] = $this->input($field);
        }

        return $this->validator->validate($data, $roles);
    }

    public function errors(): array
    {
        return $this->validator->errors();
    }

    public function file(string $key): ?UploadedFileInterface
    {
        if (! isset($this->files[$key])) {
            return null;
        }

        return new UploadedFile(
            $this->files[$key]['name'],
            $this->files[$key]['type'],
            $this->files[$key]['tmp_name'],
            $this->files[$key]['error'],
            $this->files[$key]['size'],
        );
    }
}
