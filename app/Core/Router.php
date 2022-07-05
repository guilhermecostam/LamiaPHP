<?php

namespace App\Core;

use App\Core\View;

class Router
{
    private array $routes;
    private string $uri;

    public function run():void
    {
        $this->match();
        $controllerName = $this->routes[$this->uri]['controller'];
        $methodName = $this->routes[$this->uri]['method'];

        if (
            !class_exists($controllerName) || 
            !method_exists($controllerName, $methodName)
        ) {
            View::errorCode(404);
        }

        (new $controllerName())->$methodName();
    }

    public function match():void
    {
        $this->routes = include __DIR__ . '/../../routes/web.php';
        $this->uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        
        if (!isset($this->routes[$this->uri])) {
            View::errorCode(404);
        }
    }

    public function createRoute(string $controllerName, string $methodName): array
    {
        return [
            'controller' => $controllerName,
            'method' => $methodName
        ];
    }
}