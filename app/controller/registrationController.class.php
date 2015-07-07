<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author NeyNey
 */
class RegistrationController extends AppController {
    
    public function action_index() {
	$username = filter_input(INPUT_GET, 'username');
	$email = filter_input(INPUT_GET, 'email');
	$checkrules = filter_input(INPUT_GET, 'checkrules');
	
	if($username === NULL) {
	    $username = '';
	}
	if($email === NULL) {
	    $email = '';
	}
	if($checkrules === NULL) {
	    $checkrules = false;
	}
	
	$this->set_user_var('username', $username);
	$this->set_user_var('email', $email);
	$this->set_user_var('checkrules', $checkrules);
    }

    public function after_action() {
	
    }

    public function before_action() {
	
    }
    
    public function action_register() {
	$username = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	$checkrules = filter_input(INPUT_POST, 'checkrules');
	
	if(empty($username) || empty($email) || empty($password) || !$checkrules) {
	    // TODO: fehlermeldung ausgeben...
	    die('depp');
	    return;
	}
	
	$sql = 'INSERT INTO users '
		. 'SET nameUser = :username, mailadressUser = :email, passwordUser = :password, idRole = 2, idNeighborhood = 1, registerDate = NOW() ';
	$params = array(
	    ':username' => $username,
	    ':email' => $email,
	    ':password' => password_hash($password, PASSWORD_BCRYPT)
	);
	
	$this->set_user_var('success', $this->dbHandler->query($sql, $params));
	$this->set_user_var('username', $username);
	$this->set_user_var('email', $email);
	$this->set_user_var('checkrules', $checkrules);
    }

//put your code here
}
