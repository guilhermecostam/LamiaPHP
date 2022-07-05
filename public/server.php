<?php

use App\Core\Router;

include __DIR__ . '/../vendor/autoload.php';

$dotEnv = parse_ini_file(__DIR__ . '/../.env');
if (!empty($dotEnv)) {
	foreach ($dotEnv as $key => $value) {
		$_ENV[$key] = $value;
	}
}

ini_set("display_errors", 1);
error_reporting(E_ERROR);

(new Router())->run();
