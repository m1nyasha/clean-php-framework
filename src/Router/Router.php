<?php

namespace App\Router;

class Router
{
    public function dispatch(string $uri): void
    {
        $routes = $this->routes();

        $routes[$uri]();
    }

    private function routes(): array
    {
        return require APP_PATH.'/config/routes.php';
    }
}
