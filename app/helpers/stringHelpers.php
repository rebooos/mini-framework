<?php

namespace app\helpers;

class stringHelpers
{
	/**
	 * @param $string
	 * @return string|string[] $string
	 */
	public static function upperCamelCase($string)
	{
		return str_replace(' ', '', ucwords(str_replace(['-','_'], ' ', $string)));
	}

	/**
	 * @param $string
	 * @return string
	 */
	public static function lowerCamelCase($string) {
		return lcfirst(self::upperCamelCase($string));
	}

	public static function test() {

	}
}