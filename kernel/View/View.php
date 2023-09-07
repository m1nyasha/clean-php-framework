<?php

namespace App\Kernel\View;

use App\Kernel\Container\Container;
use App\Kernel\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        private Container $container
    ) {
    }

    public function page(string $name): void
    {
        extract($this->defaultData());

        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name not found");
        }

        include $viewPath;
    }

    public function component(string $name): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";

        if (! file_exists($componentPath)) {
            throw new ViewNotFoundException("Component $name not found");
        }

        include $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->container->session,
        ];
    }
}
