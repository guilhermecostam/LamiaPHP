<?php

namespace App\Core;

abstract class Controller
{
	protected function render(string $viewName, array $data = null): void
	{
		include __DIR__ . "/../../views/{$viewName}.php";
	}
}
