<?php

namespace App\Kernel\Container;

use App\Kernel\Config\Config;
use App\Kernel\Database\Database;
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

    public readonly Config $config;

    public readonly Database $database;

    public function __construct()
    {
        $this->registerServices();
    }

    public function registerServices(): void
    {
        $this->config = new Config();
        $this->database = new Database($this->config);
        $this->session = new Session();
        $this->request = Request::createFromGlobals();
        $this->view = new View($this->session);
        $this->redirect = new Redirect();
        $this->request->setValidator(new Validator());
        $this->router = new Router(
            $this->view,
            $this->request,
            $this->redirect,
            $this->session
        );
    }
}
