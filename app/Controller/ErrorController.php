<?php

namespace App\Controller;

use App\Core\Controller;

class ErrorController extends Controller
{
	public function notFound(): void
	{
		parent::render('error/404');
	}
}