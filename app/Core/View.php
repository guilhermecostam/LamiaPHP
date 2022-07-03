<?php

namespace App\Core;

class View
{
	public function render(string $viewName, array $args = []): void
	{
		extract($args);
		$path = __DIR__ . "/../../resources/views/{$viewName}.php";
		if (file_exists($path)) {
			include $path;
		}
	}

	public function redirect(string $url): void
    {
		header("location: {$url}");
		exit;
	}

	public static function errorCode(string|int $code):void
	{
		http_response_code($code);
		$path = __DIR__ . "/../../resources/views/error/{$code}.php";
		if (file_exists($path)) {
			include $path;
		}
		exit;
	}
}
