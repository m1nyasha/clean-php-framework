<?php

namespace App;

class App
{
    public function run(): void
    {
        $routes = require APP_PATH.'/config/routes.php';

        $uri = $_SERVER['REQUEST_URI'];

        $routes[$uri]();
    }
}
