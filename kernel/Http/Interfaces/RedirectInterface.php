<?php

namespace App\Kernel\Http\Interfaces;

interface RedirectInterface
{
    public function to(string $path): void;
}
