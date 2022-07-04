<?php

namespace App\Core;

class View
{
	public function render(string $viewName, array $args = []): void
	{
		extract($args);
		$path = __DIR__ . "/../Views/{$viewName}.php";
		if (file_exists($path)) {
			include $path;
		}
	}

	public function redirect(string $url): void
    {
		header("location: {$url}");
		exit;
	}

	public static function errorCode(int $code, array $args = []):void
	{
		extract($args);
		http_response_code($code);
		$path = __DIR__ . "/../Views/error/{$code}.php";
		if (file_exists($path)) {
			include $path;
		}
		exit;
	}
}
