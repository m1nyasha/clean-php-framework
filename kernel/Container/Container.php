<?php

namespace App\Kernel\Container;

use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\View\View;

class Container
{
    public readonly Request $request;

    public readonly Router $router;

    public readonly View $view;

    public function __construct()
    {
        $this->registerServices();
    }

    public function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->router = new Router($this);
        $this->view = new View();
    }
}
