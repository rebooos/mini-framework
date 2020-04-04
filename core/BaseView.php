<?php


namespace core;


use app\controllers\AppController;

class BaseView
{
	/**
	 * текущий маршрут
	 * @var []
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

	public function __construct($route, $layout = '', $view = '')
	{
		$this->route = $route;
		if ($layout === false) {
			$this->layout = false;
		} else {
			$this->layout = $layout ?: LAYOUT;
		}
		$this->view = $view;
	}

	/**
	 * отрисовка шаблона
	 * @param array $vars
	 */
	public function render(array $vars)
	{
		extract($vars);

		$fileView = APP."/views/{$this->route["controller"]}/{$this->view}.php";
		ob_start();
		if (is_file($fileView)) {
			require $fileView;
		} else {
			echo "<b> Template {$this->view} not found </b>";
		}
		$content = ob_get_clean();
		if ($this->layout !== false) {
			$fileLayout = APP."/views/layouts/{$this->layout}.php";
			if (is_file($fileLayout)) {
				require $fileLayout;
			} else {
				echo "<b> Layout {$this->layout} not found </b>";
			}
		}


	}
}