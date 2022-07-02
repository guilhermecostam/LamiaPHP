<?php

namespace App\Controller;

use App\Request\IndexRequest;
use App\Core\Controller;
use App\Core\View;

class IndexController extends Controller
{
	public function indexAction(): void
	{
		$messages = (new IndexRequest)->validations();
		(new View)->render('index/index', $messages);
	}
}