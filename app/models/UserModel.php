<?php

namespace app\models;

use core\BaseModel;

class UserModel extends BaseModel
{

	public $userId;
	public $email;
	public $login;
	public $password;
	public $firstName;
	public $lastName;

	protected $table = 'Users';
	protected $primaryKey = 'userId';

	protected function applyAttribute()
	{
		return [
			'userId',
			'email',
			'login',
			'password',
			'firstName',
			'lastName',
		];
	}

	public function login() {
		$login = trim($_POST['login']);
		$password = trim($_POST['password']);
		if ($login && $password) {
			$this->findOne($login, 'login');
	        if ($this->userId) {
				if (password_verify($password, $this->password)) {
					foreach ($this as $k => $v) {
						if ($k != 'password' && in_array($k, $this->applyAttribute()))
							$_SESSION['user'][$k] = $v;
					}
					return true;
				}
	        }
		}
		return false;
	}

	public function isAuth() {
		return isset($_SESSION['user']);
	}
}