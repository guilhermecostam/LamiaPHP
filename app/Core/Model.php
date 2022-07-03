<?php

namespace App\Core;

use App\Connection\Connection;

abstract class Model
{
    private Connection $db;

    public function __construct()
    {
		$this->db = new Connection();
	}
}