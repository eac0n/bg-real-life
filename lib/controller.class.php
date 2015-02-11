<?php

/**
 * Description of Controller
 *
 * @author Holger
 */
abstract class Controller {
	
	private $name;
	private $action;
	
	private $user_vars;
	
	protected $dbHandler;
	
	public function __construct($name, $action) {
		
		$this->name = $name;
		$this->action = empty($action) ? 'index' : $action;
		
		$this->user_vars = array();
		
		$this->dbHandler = new DBHandler();
		
		$this->before_action();
		$action_method = 'action_' . $action;
		if(is_callable(array($this, $action_method))) {
			$this->$action_method();
		}
		else {
			$this->action_index();
		}
		$this->after_action();
		
		$this->load_view();
	}

	public function __set($name, $value) {
		$this->user_vars[$name] = $value;
	}
	
	public function __get($name) {
		return isset($this->user_vars[$name]) ? $this->user_vars[$name] : NULL;
	}
	
	public abstract function before_action();
	public abstract function action_index();
	public abstract function after_action();
	
	private function load_view() {
		$view_path = VIEW_PATH . DS . 'templates' . DS . strtolower($this->name) . DS . strtolower($this->action) . '.php';
		if(file_exists($view_path)) {
			
			foreach ($this->user_vars as $var => $value) {
				$$var = $value;
			}
			
			include_once $view_path;
			return true;
		}
		return false;
	}
	
	public static function dispatch() {

		$controller = filter_input(INPUT_GET, 'controller');
		$action = filter_input(INPUT_GET, 'action');

		$controller_class = $controller . 'Controller';

		if(self::load_controller($controller_class) && class_exists($controller_class)) {
			$dispatcher = new $controller_class($controller, $action);
		}
		else {
			self::load_controller('homeController');
			$dispatcher = new HomeController('home', $action);
		}
	}
	
	

	private static function load_controller($name) {
		$controller_path = CONTROLLER_PATH . DS . $name . '.class.php';
		if(file_exists($controller_path)) {
			include_once $controller_path;
			return true;
		}
		return false;
	}

	
}
