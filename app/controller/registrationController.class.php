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
		. 'SET nameUser = :username, mailadressUser = :email, passwordUser = :password, idRole = 0, idNeighborhood = 0, registerDate = NOW() ';
	$params = array(
	    ':username' => $username,
	    ':email' => $email,
	    ':password' => password_hash($password, PASSWORD_BCRYPT)
	);
	
	$stmt = $this->dbHandler->query($sql, $params);
	
	var_dump($stmt);
    }

//put your code here
}
