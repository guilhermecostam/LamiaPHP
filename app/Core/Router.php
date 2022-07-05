<?php

namespace App\Core;

use App\Core\View;

class Router
{
    /**
     * The all routes of the system.
     *
     * @var array
     */
    private array $routes;

    /**
     * The requested uri.
     *
     * @var string
     */
    private string $uri;

    /**
     * Method that runs the requested route.
     *
     * @return array
     */
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

    /**
     * Method that validate if uri match with routes of system.
     *
     * @return void
     */
    public function match():void
    {
        $this->routes = include __DIR__ . '/../../routes/web.php';
        $this->uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        
        if (!isset($this->routes[$this->uri])) {
            View::errorCode(404);
        }
    }

    /**
     * Method that generate a route array.
     *
	 * @param string $controllerName
	 * @param string $methodName
     * @return array
     */
    public function createRoute(string $controllerName, string $methodName): array
    {
        return [
            'controller' => $controllerName,
            'method' => $methodName
        ];
    }
}