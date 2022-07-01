<?php

namespace App\Core;

class View
{
	public function render(string $viewName): void
	{
		include __DIR__ . "/../../views/{$viewName}.php";
	}

	public function redirect(string $url): void
    {
		header("location: {$url}");
		exit;
	}
}
