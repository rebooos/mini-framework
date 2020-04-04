<?php
namespace core;

use app\helpers\stringHelpers;

class Router
{
	protected static $routes = [];
	protected static $route = [];

	public static function add($regex, $route = [])
	{
		self::$routes[$regex] = $route;
	}

	public static function getRoutes()
	{
		return self::$routes;
	}

	public static function getRoute()
	{
		return self::$route;
	}

	public static function matchRoute($url)
	{
		foreach (self::$routes as $pattern => $route) {
			if (preg_match("#".$pattern."#i", $url, $matches)) {
				foreach ($matches as $km => $vm) {
					if (is_string($km)) {
						$route[$km] = $vm;
					}
				}
				if (!isset($route['action'])) {
					$route['action'] = 'Index';
				}
				$route['controller'] = stringHelpers::upperCamelCase($route['controller']);
				self::$route = $route;
				return true;
			}
		}
		return false;
	}

	public static function dispatch($url)
	{
		if (self::matchRoute($url)) {
			$controller = 'app\controllers\\'.self::$route['controller'].'Controller';
			if (class_exists($controller)) {
				$classObject = new $controller(self::$route);
				$action = stringHelpers::lowerCamelCase(self::$route['action']).'Action';
				if (method_exists($classObject, $action)) {
					$classObject->$action();
					$classObject->getView();
				} else {
					echo "Method $controller::$action not found";
				}
			} else {
				echo "Controller $controller not found";
			}
		} else {
			http_response_code(404);
			include 'public/404.html';
		}
	}
}