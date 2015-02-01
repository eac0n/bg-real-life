<?php

/**
 * Description of Session
 *
 * @author Holger
 */
class Session {
	
	public static function start() {
		session_start();
	}
	
	public static function destroy() {
		session_destroy();
	}
	
	public static function getVar($name) {
		return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
	}
	
	public static function setVar($name, $value) {
		$_SESSION[$name] = $value;
	}
}

?>
