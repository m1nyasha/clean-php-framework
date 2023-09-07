<?php

namespace App\Kernel\View;

class View
{
    public function page(string $name): void
    {
        include APP_PATH."/views/pages/$name.php";
    }
}
