<?php

use App\Controller\ErrorController;

include __DIR__ . '/../vendor/autoload.php';

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

$routes = include __DIR__ . '/../routes/web.php';

if (!isset($routes[$uri])) {
	(new ErrorController())->notFound();
	exit;
}

$controllerName = $routes[$uri]['controller'];
$methodName = $routes[$uri]['method'];

(new $controllerName())->$methodName();
