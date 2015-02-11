<?php

require_once 'defines.php';

if(DEBUG) {
	error_reporting(E_ALL);
}

date_default_timezone_set("Europe/Berlin");
setlocale(LC_ALL, 'deu', 'de_DE');

spl_autoload_register(function ($class) {
	
	$class_file = $class . '.class.php';
	
	$class_path = LIB_PATH . DS . $class_file;
	if (file_exists($class_path)) {
		require_once $class_path;
		return;
	}
	
	$class_path = CONTROLLER_PATH . DS . $class_file;
	if (file_exists($class_path)) {
		require_once $class_path;
		return;
	}
	
	$class_path = MODEL_PATH . DS . $class_file;
	if (file_exists($class_path)) {
		require_once $class_path;
		return;
	}
	
	// error
});

//try {
//	Db::connect(DB_DSN, DB_USER, DB_PASS);
//}
//catch(PDOException $e) {
//	die($e->getMessage());
//}

Session::start();

Controller::dispatch();

?>
