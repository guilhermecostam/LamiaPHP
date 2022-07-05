<?php

namespace App\Core;

use App\Connection\Connection;

abstract class Model
{
    /**
     * The Connection instance.
     *
     * @var Connection
     */
    private Connection $db;

    /**
     * Create a new Connection instance.
     */
    public function __construct()
    {
        $this->db = new Connection();
    }
}