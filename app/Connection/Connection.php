<?php

namespace App\Connection;

use PDO;

abstract class Connection
{
	public static function getConnection(): PDO
	{
		$hostname = 'localhost';
		$database = 'example_database';
		$username = 'root';
		$password = 'password';

		return new PDO("mysql:host={$hostname};dbname={$database}", $username, $password);
	}
}