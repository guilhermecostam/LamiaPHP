<?php

namespace App\Controller;

use App\Core\Controller;

class IndexController extends Controller
{
	public function indexAction(): void
	{
		parent::render('index/index');
	}
}