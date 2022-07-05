<?php

namespace App\Connection;

use PDO;
use PDOStatement;
use PDOException;
use App\Core\View;

abstract class Connection
{
	/**
     * The PDO instance.
     *
     * @var PDO
     */
	private PDO $db;

	/**
     * Create a new PDO instance.
     */
	public function __construct()
	{
		try {
			$this->db = new PDO(
				"mysql:host={$_ENV['DB_HOSTNAME']};dbname={$_ENV['DB_NAME']}",
				$_ENV['DB_USERNAME'],
				$_ENV['DB_PASSWORD']
			);
		} catch (PDOException $e) {
			(new View)->errorCode(500, ['throwable' => $e]);
			die();
		}
	}
	
	/**
     * Method that make a PDO statement.
     *
	 * @param string $sql
	 * @param array $params
     * @return PDOStatement $statement
     */
	public function query(string $sql, array $params = []): PDOStatement
	{
		$statement = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$statement->bindValue(":{$key}", $val);
			}
		}
		$statement->execute();

		return $statement;
	}

	/**
     * Method that returns a row of PDO statement.
     *
	 * @param string $sql
	 * @param array $params
     * @return array $result
     */
	public function row(string $sql, array $params = []): array
	{
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
     * Method that returns a column of PDO statement.
     *
	 * @param string $sql
	 * @param array $params
     * @return mixed $result
     */
	public function column(string $sql, array $params = []): mixed
	{
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}
}