<?php

use App\Core\Router;
use App\Controller\IndexController;

$routes = [
	'/' => Router::createRoute(IndexController::class, 'indexAction'),
];

return $routes;
