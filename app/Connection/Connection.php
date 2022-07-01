<?php

namespace App\Connection;

use PDO;

abstract class Connection
{
	private string $hostname;
	private string $database;
	private string $username;
	private string $password;

	public function __construct()
	{
		$this->hostname = $_ENV['HOSTNAME'];
		$this->database = $_ENV['DB_NAME'];
		$this->username = $_ENV['DB_USERNAME'];
		$this->password = $_ENV['DB_PASSWORD'];
	}
	
	public function getConnection(): PDO
	{
		return new PDO(
			"mysql:host={$this->hostname};dbname={$this->database}",
			$this->username,
			$this->password
		);
	}
}