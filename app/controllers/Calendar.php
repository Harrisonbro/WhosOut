<?php

class Calendar {

	public function __construct(DatabaseInstance $db) {
		$this->db = $db; 
	}

	public static function getEntries() {
		$result = DatabaseConnection::getInstance()->exec('SELECT * FROM people'); 
		return $result; 
	}

}