<?php

namespace App\Controller;

use App\Request\IndexRequest;
use App\Core\Controller;
use App\Core\View;
use Throwable;

class IndexController extends Controller
{
	public function indexAction(): void
	{
		try {
			$messages = (new IndexRequest)->validations();
			(new View)->render('index/index', $messages);
		} catch (Throwable $th) {
			(new View)->errorCode(400, ['throwable' => $th]);
		}
	}
}