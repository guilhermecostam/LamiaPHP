<?php

use App\Controller\IndexController;

function createRoute(string $controllerName, string $methodName): array
{
	return [
		'controller' => $controllerName,
		'method' => $methodName
	];
}

$routes = [
	'/' => createRoute(IndexController::class, 'indexAction'),
];

return $routes;
