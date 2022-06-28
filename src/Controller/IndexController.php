<?php

namespace App\Controller;

class IndexController extends AbstractController
{
	public function indexAction(): void
	{
		parent::render('index/index');
	}
}