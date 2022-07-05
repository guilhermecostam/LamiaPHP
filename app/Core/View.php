<?php

namespace App\Core;

class View
{
	/**
     * Method that render an view by name. This method can receive
	 * arguments to extranct and put in view.
     *
	 * @param string $viewName
	 * @param array $args
     * @return void
     */
	public function render(string $viewName, array $args = []): void
	{
		extract($args);
		$path = __DIR__ . "/../Views/{$viewName}.php";
		if (file_exists($path)) {
			include $path;
		}
	}

	/**
     * Method that redirect for a requested url.
     *
	 * @param string $url
     * @return void
     */
	public function redirect(string $url): void
    {
		header("location: {$url}");
		exit;
	}

	/**
     * Method that render an view by erro code. This method can receive
	 * arguments to extranct and put in view.
     *
	 * @param int $code
	 * @param array $args
     * @return void
     */
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
