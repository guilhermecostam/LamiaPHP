<?php

use App\Core\Router;
use App\Controllers\IndexController;

$routes = [
	'/' => (new Router)->createRoute(IndexController::class, 'indexAction'),
];

return $routes;
