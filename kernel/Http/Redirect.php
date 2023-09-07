<?php

namespace App\Kernel\Http;

class Redirect
{
    public function to(string $path): void
    {
        header("Location: $path");
        exit;
    }
}
