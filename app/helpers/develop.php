<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function dump($str) {
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
}

function redirect($http = false) {
	if ($http) {
		$redirect = $http;
	} else {
		$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
	}
	header("Location: $redirect");
	exit();
}