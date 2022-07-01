<?php

use App\Core\Router;
use App\Controller\IndexController;

$routes = [
	'/' => (new Router)->createRoute(IndexController::class, 'indexAction'),
];

return $routes;
