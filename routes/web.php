<?php

// Merge all routes of the system.
$routes = array_merge(
	include 'welcome.php',
);

return $routes;
