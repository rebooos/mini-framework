<?php

namespace app\helpers;

class validateUserHelper
{
	public static function validateLoginLength($login) {
		if(strlen($login) < 3 || strlen($login) > 30) {
			return "Логин должен быть не меньше 3-х символов и не больше 30";
		}

		return "";
	}

	public static function validateLoginSymbols($login) {
		if(!preg_match("/^[a-zA-Z0-9@.]+$/",$login)) {
			return "Логин может состоять только из букв английского алфавита и цифр";
		}

		return "";
	}

	public static function validateEmail($login) {
		if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
			return "Email указан не корректно";
		}

		return "";
	}
}