<?php

/**
 * Description of Db
 *
 * @author Holger
 */
class Db {
	
	/**
	 *
	 * @var PDO 
	 */
	private static $connection = NULL;
	
	/**
	 *
	 * @param type $dbDsn
	 * @param type $dbUser
	 * @param type $db_Pass 
	 * @throws PDOException 
	 */
	public static function connect($dbDsn, $dbUser, $db_Pass) {
		self::$connection = new PDO($dbDsn, $dbUser, $db_Pass);
	}
	
	/**
	 *
	 * @return boolean 
	 */
	public static function isConnected() {
		return self::$connection === NULL ? false : true;
	}
	
	public static function quote($string, $parameter_type = PDO::PARAM_STR) {
		return self::$connection->quote($string, $parameter_type);
	}
	
	/**
	 *
	 * @param type $statement
	 * @return type
	 * @throws PDOException 
	 */
	public static function query($statement) {
		if(!self::isConnected()) {
			throw new PDOException('not connected');
		}
		return self::$connection->query($statement);
	}
	
	
	public static function select($table, $join = NULL, $where = NULL, $sortBy = NULL, $groupBy = NULL) {
		throw new Exception('not yet implemented');
	}
}

?>
