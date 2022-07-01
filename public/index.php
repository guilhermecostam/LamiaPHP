<?php

use App\Controller\ErrorController;

include __DIR__ . '/../vendor/autoload.php';

$dotEnv = parse_ini_file(__DIR__ . '/../.env');
if (!empty($dotEnv)) {
	foreach ($dotEnv as $key => $value) {
		$_ENV[$key] = $value;
	}
}

$uri = reset(explode('?', $_SERVER['REQUEST_URI']));

$routes = include __DIR__ . '/../routes/web.php';
if (!isset($routes[$uri])) {
	(new ErrorController())->notFound();
	exit;
}

$controllerName = $routes[$uri]['controller'];
$methodName = $routes[$uri]['method'];

(new $controllerName())->$methodName();
