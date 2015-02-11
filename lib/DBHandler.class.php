<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBHandler
 *
 * @author NeyNey
 */
class DBHandler {
    
    private $connection;
    
    public function __construct() {
	$this->connection = new PDO(DB_DSN, DB_USER, DB_PASS);
    }
    
    /**
     * 
     * @param string $sql
     * @param array $params
     * @return PDOStatement
     */
    public function query($sql, $params = array()) {
	$stmt = $this->connection->prepare($sql);
	foreach ($params as $param => $value) {
	    $stmt->bindParam($param, $value);
	}
	$stmt->execute();
	echo '<pre>';
	var_dump($stmt->errorInfo());
	echo '</pre>';
	return $stmt;
    }
}
