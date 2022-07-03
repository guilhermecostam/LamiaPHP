<?php

use App\Core\Router;

include __DIR__ . '/../vendor/autoload.php';

$dotEnv = parse_ini_file(__DIR__ . '/../.env');
if (!empty($dotEnv)) {
	foreach ($dotEnv as $key => $value) {
		$_ENV[$key] = $value;
	}
}

(new Router())->run();
