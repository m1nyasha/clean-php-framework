<?php

namespace App\Kernel\Container;

use App\Kernel\Auth\Auth;
use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\Config;
use App\Kernel\Database\Database;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\Session\Session;
use App\Kernel\Storage\Storage;
use App\Kernel\Storage\StorageInterface;
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

    public readonly AuthInterface $auth;

    public readonly StorageInterface $storage;

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
        $this->redirect = new Redirect();
        $this->request->setValidator(new Validator());
        $this->auth = new Auth($this->database, $this->session);
        $this->view = new View($this->session, $this->auth);
        $this->storage = new Storage($this->config, $this->request);
        $this->router = new Router(
            $this->view,
            $this->request,
            $this->redirect,
            $this->session,
            $this->database,
            $this->auth,
            $this->storage
        );
    }
}
