<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get( $path, $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post( $path,  $action)
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch( $uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $action = $this->routes[$method][$path] ?? null;

        if (!$action) {
            http_response_code(404);
            echo '404 Not Found';
            exit;
        }

        [$controllerName, $methodName] = $action;

        require_once __DIR__ . '/../Controllers/' . $controllerName . '.php';

        $controller = new $controllerName();

        $controller->$methodName();
    }
}
