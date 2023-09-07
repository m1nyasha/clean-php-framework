<?php

namespace App\Kernel\Router;

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
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            echo '404 | Страница не найдена';
            exit;
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            $controller = new $controller();

            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }

    private function findRoute(string $uri, string $method): bool|Route
    {
        if (! isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
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
