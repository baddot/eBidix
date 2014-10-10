<?php
/*******************************************************************************
 *                         Dispatcher class
 *******************************************************************************
 *      Author:     BWeb Media
 *      Email:      contact@bwebmedia.com
 *      Website:    http://www.bwebmedia.com
 *
 *      File:       dispatcher.class.php
 *      Version:    1.2
 *      Copyright:  (c) 2009+ BWeb Media 
 *      
 ******************************************************************************/


class Dispatcher 
{
	public static $instance = null;
	private $controller;
	private $action = null;
	private $value = null;
	
	private function __construct() {
		$request_uri = ( isset($_GET['url']) ) ? strtolower(rawurldecode($_GET['url'])) : null;
		$parts = explode('/', $request_uri);
		if ($parts[0] == 'admin') {
			define('_ADMIN_', true);
			if(isset($parts[1])) {
				$this->controller = (!empty($parts[1])) ? $parts[1] : null;
				$this->action = (!empty($parts[2])) ? 'admin_'.$parts[2] : 'admin_index';
				$this->value = (!empty($parts[3])) ? $parts[3] : null;
			} else {
				$this->controller = 'dashboard';
				$this->action = 'admin_index';
			}
		} else if (isset($parts[1])) {
			$this->controller = (!empty($parts[0])) ? $parts[0] : null;
			$this->action = (!empty($parts[1])) ? $parts[1] : null;
			$this->value = (!empty($parts[2])) ? $parts[2] : null;
		} else {
			if ( ctype_digit(substr($parts[0], 0, 1)) ) {
				$this->controller = 'auction';
				$this->action = 'view';
				$explode = explode("-", $parts[0]);
				$this->value = $explode[0];
			} else {
				require _DIR_ . '/config/routes.inc.php';
				$name = $parts[0];
				if ( array_key_exists($name, $routes) ) {
					$this->controller = ( isset($routes[$name]['controller']) ) ? $routes[$name]['controller'] : null;
					$this->action = ( isset($routes[$name]['action']) ) ? $routes[$name]['action'] : null;
					$this->value = ( isset($routes[$name]['value']) ) ? $routes[$name]['value'] : null;
				} else {
					$this->controller = 'auction';
					$this->action = 'index';
				}
			}
		}
	}
	
	public static function getInstance() {
		if (!self::$instance)
			self::$instance = new self();
		return self::$instance;
	}
	
	public function run() {
		try {
			$class = $this->controller . 'Controller';
			require_once _DIR_ .'/app/controller/'.$class.'.php';
			$start = new $class();
			if ( isset($start->models) && !empty($start->models) ) {
				foreach($start->models as $model) {
					include _DIR_ . "/app/model/{$model}.php";
					$start->$model = new $model();
				}
			}
			if ( isset($start->libs) && !empty($start->libs) ) {
				foreach($start->libs as $lib) {
					include _DIR_ . "/app/libs/{$lib}/{$lib}.php";
				}
			}
			$action = ( is_null($this->action) ) ? 'index' : $this->action;
			$start->$action($this->value);
		} catch (Exception $e) {
			tools::log($e->getMessage(), 'error');
		}
	}
	
	private function checkLicence() {
		
	}
}

?>