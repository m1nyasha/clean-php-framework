<?php

namespace App\Kernel\Container;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\Session\Session;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class Container
{
    public readonly Request $request;

    public readonly Router $router;

    public readonly View $view;

    public readonly Redirect $redirect;

    public readonly Session $session;

    public function __construct()
    {
        $this->registerServices();
    }

    public function registerServices(): void
    {
        $this->session = new Session();
        $this->request = Request::createFromGlobals();
        $this->view = new View($this->session);
        $this->redirect = new Redirect();
        $this->request->setValidator(new Validator());
        $this->router = new Router($this);
    }
}
