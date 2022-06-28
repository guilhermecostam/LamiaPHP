<?php

namespace App\Controller;

class ErrorController extends AbstractController
{
	public function notFound(): void
	{
		parent::render('error/404');
	}
}