<?php


namespace core;


class DB
{
	private $pdo;
	private static $instance;

	private function __construct()
	{
		$this->pdo = new \PDO(DB_CONNECT, DB_USER, DB_PASS);
	}

	public static function getInstance() {
		if  (self::$instance === null) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * @param string $sql
	 * @param array $params
	 * @return bool
	 */
	public function execute($sql, $params = [])
	{
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute($params);
	}

	/**
	 * @param $sql
	 * @param array $params
	 * @return array
	 */
	public function query($sql, $params = [])
	{
		$stmt = $this->pdo->prepare($sql);
		$res = $stmt->execute($params);
		if ($res !== false) {
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		return [];
	}

	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}