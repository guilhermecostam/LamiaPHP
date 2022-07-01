<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\View;

class ErrorController extends Controller
{
	public function notFound(): void
	{
		(new View)->render('error/404');
	}
}