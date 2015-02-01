<?php

define('DEBUG', true);

define('DS', DIRECTORY_SEPARATOR);

define('BASE_PATH', dirname(dirname(__FILE__)));
define('LIB_PATH', BASE_PATH . DS . 'lib');
define('APP_PATH', BASE_PATH . DS . 'app');
define('MODEL_PATH', APP_PATH . DS . 'model');
define('VIEW_PATH', APP_PATH . DS . 'view');
define('CONTROLLER_PATH', APP_PATH . DS . 'controller');


define('DB_HOST', 'localhost');
define('DB_NAME', 'team_balance');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DNS', 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8');

?>
