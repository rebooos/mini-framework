<?php


namespace app\controllers;

use app\helpers\validateUserHelper;
use app\models\UserModel;

class UserController extends AppController
{
	public function __construct(array $route)
	{
		parent::__construct($route);
	}

	public function loginAction()
	{
		if (!empty($_POST)) {
			$user = new UserModel();
			if ($user->login()) {
				$_SESSION['success'][] = 'Успешно авторизовались';
				redirect('/');
			} else {
				$_SESSION['errors'][] = 'Логин или пароль введены не верно';
				redirect(false);
			}
		}
	}

	public function logoutAction()
	{
		if (isset($_SESSION['user'])) unset($_SESSION['user']);
		redirect('/');
	}

	public function registrationAction()
	{
		/** @var UserModel $user */
		$user = new UserModel();

		if(!empty($_POST))
		{
			$email = trim(strip_tags($_POST['email']));
			$login = trim(strip_tags($_POST['login']));

			$user->setErrors(validateUserHelper::validateLoginLength($login));
			$user->setErrors(validateUserHelper::validateLoginSymbols($login));
			$user->setErrors(validateUserHelper::validateEmail($email));
			if($user->exists($email, 'email')) {
				$user->setErrors("Пользователь с таким email'ом уже существует в базе данных");
			}

			if($user->getErrors() == []) {
				$user->email = $email;
				$user->login = $login;
				$user->firstName = trim(strip_tags($_POST['firstName']));
				$user->lastName = trim(strip_tags($_POST['lastName']));
				$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->save();

				$user->setSuccess("Регистрация прошла успешна");
				redirect('/');
			} else {
				$_SESSION['form_data'] = $_POST;
				redirect(false);
			}
		}
	}
}