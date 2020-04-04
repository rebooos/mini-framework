<?php


namespace core;


use app\helpers\stringHelpers;

abstract class BaseModel
{
	protected $pdo;
	protected $table;
	protected $primaryKey = 'id';
	protected $errors = [];

	private $where = [];
	private $limit;

	public function __construct()
	{
		$this->pdo = DB::getInstance();
	}

	/**
	 * @param $sql
	 * @return bool
	 */
	public function query($sql)
	{
		return $this->pdo->execute($sql);
	}

	/**
	 * @return array
	 */
	public function findAll()
	{
		$sql = "SELECT * FROM {$this->table}";
		return $this->pdo->query($sql);
	}

	public function where($property, $operation = '', $value = null)
	{
		if ($value == null) {
			$this->where[] = [$property, '=', $operation];
		} else {
			$this->where[] = [$property, $operation, $value];
		}
		return $this;
	}

	public function limit($from, $to = '')
	{
		$this->limit = "LIMIT {$from}";
		if ($to) {
			$this->limit .= ", {$to}";
		}
	}

	public function get()
	{
		$value = $models = [];
		$sql = "SELECT * FROM {$this->table} WHERE ";
		foreach ($this->where as $key => $where) {
			$sql .= $where[0]. " " . $where[1] . " ? ";
			$value[$key] = $where[2];
		}
		if ($this->limit) {
			$sql .= " ". $this->limit;
		}
		$result = $this->pdo->query($sql, $value);
		if ($result) {
			$nameClass = get_called_class();
			foreach ($result as $data) {
				$model = new $nameClass();
				$model->setAttribute($data);
				$models[$data[$model->primaryKey]] = $model;
			}
			return $models;
		}
		return [];
	}


	/**
	 * @param $value
	 * @param string $field
	 * @return mixed
	 */
	public function findOne($value, $field = '')
	{
		$field = $field ?: $this->primaryKey;
		$sql = "SELECT * FROM {$this->table} WHERE {$field} = ? LIMIT 1";
		$result = $this->pdo->query($sql, [$value]);
		if ($result) {
			$this->setAttribute($result[0]);
			return $this;
		}
		return [];
	}

	/**
	 * @return bool
	 */
	public function save()
	{
		$pk = $this->primaryKey;
		if ($this->$pk) {
			return $this->update();
		} else {
			return $this->insert();
		}
	}

	public function exists($value, $field) {
		$sql = "SELECT count({$this->primaryKey}) as cnt FROM {$this->table} WHERE {$field} = ?";
		return (bool)$this->pdo->query($sql, [$value])[0]['cnt'];
	}

	public function update() {
		$fields = [];
		$pk = $this->primaryKey;
		$prepareData = $this->prepareData();
		unset($prepareData[$this->primaryKey]);
		foreach ($prepareData as $k => $v)
			$fields[] = "`$k` = '" . addslashes($v) . "'";

		$sql = "UPDATE {$this->table} SET " . implode(', ', $fields);
		$sql .= " WHERE {$this->primaryKey} = {$this->$pk}";

		return $this->pdo->execute($sql);
	}

	public function insert() {
		$fields = [];
		$prepareData = $this->prepareData();
		unset($prepareData[$this->primaryKey]);
		foreach ($prepareData as $k => $v) {
			$fields[] = "`$k` = '" . addslashes($v) . "'";
		}

		$sql = 'INSERT INTO ' . $this->table . ' SET ' . implode(', ', $fields);
		$res = $this->pdo->execute($sql);
		$pk = $this->primaryKey;
		$this->$pk = $this->pdo->lastInsertId();
		return $res;
	}

	private function prepareData()
	{
		$forInset = [];
		$apply = $this->applyAttribute();
		foreach ((array)$this as $key => $value) {
			if ($apply && in_array($key, $apply) || $apply == []) {
				$forInset[$key] = $value;
			}
		}

		return $forInset;
	}

	/**
	 * разрещенные поля у модели
	 * @return array
	 */
	protected function applyAttribute()
	{
		return [];
	}

	/**
	 * @param $sql
	 * @param array $params
	 * @return array
	 */
	public function find($sql, $params = [])
	{
		return $this->pdo->query($sql, $params);
	}

	public function setAttribute($data) {
		foreach ($data as $property => $oneModelData) {
			if (property_exists($this, $property)) {
				$apply = $this->applyAttribute();
				if ($apply && in_array($property, $apply) || $apply == []) {
					$this->$property = $oneModelData;
				}
			}
		}
	}

	/**
	 * @param $error
	 */
	public function setErrors($error) {
		if ($error) {
			$this->errors[] = $error;
			$_SESSION['errors'][] = $error;
		}
	}

	/**
	 * @return array
	 */
	public function getErrors() {
		return $this->errors;
	}

	/**
	 * @param $text
	 */
	public function setSuccess($text) {
		$_SESSION['success'][] = $text;
	}
}