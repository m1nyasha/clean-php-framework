<?php

namespace App\Router;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $routes = $this->routes();

        $routes[$uri]();
    }

    private function initRoutes(): void
    {
        $routes = $this->routes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    /**
     * @return Route[]
     */
    private function routes(): array
    {
        return require APP_PATH.'/config/routes.php';
    }
}
