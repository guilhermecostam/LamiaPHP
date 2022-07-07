<?php

use App\Core\Router;

include __DIR__ . '/../vendor/autoload.php';

// Retrieves the system environment variables in the .env file
// and sends them to the associative array $_ENV for global call.
$dotEnv = parse_ini_file(__DIR__ . '/../.env');
if (!empty($dotEnv)) {
	foreach ($dotEnv as $key => $value) {
		$_ENV[$key] = $value;
	}
}

// Set to display errors that occur in the application.
// Here you also specify to only display errors classified as Fatal run-time errors
ini_set("display_errors", 1);
error_reporting(E_ERROR);

// Initialize Router class and runs the requested uri
(new Router())->run();
