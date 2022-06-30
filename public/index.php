<?php

use App\Controller\ErrorController;

include __DIR__ . '/../vendor/autoload.php';

$uri = reset(explode('?', $_SERVER['REQUEST_URI']));

$routes = include __DIR__ . '/../routes/routes.php';

if (!isset($routes[$uri])) {
	(new ErrorController())->notFound();
	exit;
}

$controllerName = $routes[$uri]['controller'];
$methodName = $routes[$uri]['method'];

(new $controllerName())->$methodName();
