<?php

namespace App\Core;

use App\Core\Exception\RouteNotFoundException;

class Router
{
    private static array $routes = [];

    public static function get(string $route, callable|array $callback)
    {
        self::$routes['get'][$route] = $callback;
    }

    public function route()
    {
        $route = $_SERVER['REQUEST_URI'];
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        $callback = self::$routes[$method][$route] ?? null;

        if ($callback === null) {
            throw new RouteNotFoundException();
        }

        if (!is_array($callback)) {
            return $callback();
        }

        $controller = new $callback[0];

        return $controller->{$callback[1]}();
    }
}
