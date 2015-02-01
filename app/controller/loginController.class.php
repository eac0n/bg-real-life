<?php

/**
 * Description of FinesController
 *
 * @author Holger
 */
class LoginController extends AppController {
	
	public function action_index() {
		
	}
	public function after_action() {
		
	}
	public function before_action() {
		
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		$password = filter_input(INPUT_POST, 'password');

		if(!$email || !$password) {
			die('Login fehlgeschlagen');
		}

		$user = User::getUserByLogin($email, $password);

		if(NULL === $user)
			die('Login fehlgeschlagen');

		// login successfull
		Session::setVar('user', $user);

		header('location:game');

		exit();
	}
}

?>
