<?php

namespace App\Core;

class View
{
	public static function render(string $viewName): void
	{
		include __DIR__ . "/../../views/{$viewName}.php";
	}

	public static function redirect(string $url): void
    {
		header("location: {$url}");
		exit;
	}
}
