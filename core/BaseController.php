<?php


namespace core;


abstract class BaseController
{
	/**
	 * текущий маршрут
	 * @var string
	 */
	public $route;
	/**
	 * текущий вид
	 * @var string
	 */
	public $view;
	/**
	 * текущий шаблон
	 * @var string
	 */
	public $layout;

	/**
	 * переменные для шаблонов
	 * @var []
	 */
	public $vars = [];

	public function __construct(array $route)
	{
		$this->route = $route;
		$this->view = $route['action'];
	}

	/**
	 * @return string
	 */
	public function getView()
	{
		$viewObject = new BaseView($this->route, $this->layout, $this->view);
		$viewObject->render($this->vars);
	}

	/**
	 * @param array $vars
	 */
	public function setVars(array $vars)
	{
		$this->vars = $vars;
	}

	/**
	 * @return bool
	 */
	public function isAjax()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	public function getTemplate($view, $vars = [])
	{
		extract($vars);
		return APP."/views/{$this->route['controller']}/{$view}.php";
	}
}