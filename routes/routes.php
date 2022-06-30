<?php

$routes = [
	include 'web.php',
];

$toReturn = [];
foreach ($routes as $values) {
    foreach ($values as $key => $route) {
        $toReturn[$key] = $route;
    }
}

return $toReturn;
