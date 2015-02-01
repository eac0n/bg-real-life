<?php

/**
 * Description of User
 *
 * @author Holger
 */
class User {
	
	private $id_user;
	private $id_role;
	private $email;
	
	private function __construct($id_user, $id_role, $email) {
		$this->id_user = $id_user;
		$this->id_role = $id_role;
		$this->email = $email;
	}
	
	public function getId() {
		return $this->id_user;
	}
	
	public function getIdRole() {
		return $this->id_role;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function isAdmin() {
		return $this->id_role == 1 ? true : false;
	}
	
	public function isCashier() {
		return $this->id_role == 2 ? true : false;
	}
	
	public function isPlayer() {
		return $this->id_role == 3 ? true : false;
	}

	public static function getUserByLogin($email, $password) {
		
		$sql = "SELECT
					*
				FROM
					user
				JOIN
					role
				USING
					(id_role)
				WHERE
					email = ".Db::quote($email)."
				AND
					password = MD5(".Db::quote($password).")";
					
		$result = Db::query($sql);
		
		if(false === $result OR $result->rowCount() != 1)
			return NULL;
		
		$user = $result->fetch();
		
		return new User($user['id_user'], $user['id_role'], $user['email']);
	}
}

?>
