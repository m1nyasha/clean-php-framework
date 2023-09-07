<?php

namespace App\Kernel\View;

class View
{
    public function page(string $name): void
    {
        extract(['view' => $this]);

        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new \Exception("View $name not found");
        }

        include APP_PATH."/views/pages/$name.php";
    }

    public function component(string $name): void
    {
        include APP_PATH."/views/components/$name.php";
    }
}
