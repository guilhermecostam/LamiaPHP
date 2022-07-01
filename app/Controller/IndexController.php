<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\View;

class IndexController extends Controller
{
	public function indexAction(): void
	{
		(new View)->render('index/index');
	}
}