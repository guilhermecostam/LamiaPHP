<?php

namespace App\Controller;

abstract class AbstractController
{
	protected function render(string $viewName, array $data = null): void
	{
		include __DIR__ . "/../../views/{$viewName}.php";
	}
}
