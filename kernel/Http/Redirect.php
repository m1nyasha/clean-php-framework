<?php

namespace App\Kernel\Http;

use App\Kernel\Http\Interfaces\RedirectInterface;

class Redirect implements RedirectInterface
{
    public function to(string $path): void
    {
        header("Location: $path");
        exit;
    }
}
