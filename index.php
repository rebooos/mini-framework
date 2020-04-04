<?php
include_once 'app/helpers/develop.php';
include_once "config.php";

use core\Router;

$query = rtrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

spl_autoload_register(function($class) {
	$path = str_replace('\\', '/', $class . '.php');
	if (file_exists($path)) {
		require_once $path;
	}
});

session_start();

Router::add('^$', ['controller' => 'App', 'action' => 'Index']);
Router::add('^/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);