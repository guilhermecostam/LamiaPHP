<?php

use App\Core\Router;
use App\Controllers\IndexController;

// Welcome routes
$routes = [
	'/' => (new Router)->createRoute(IndexController::class, 'indexAction'),
];

return $routes;
