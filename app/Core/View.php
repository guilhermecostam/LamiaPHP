<?php

namespace App\Core;

class View
{
	public function render(string $viewName, array $args = []): void
	{
		extract($args);
		include __DIR__ . "/../../resources/views/{$viewName}.php";
	}

	public function redirect(string $url): void
    {
		header("location: {$url}");
		exit;
	}
}
