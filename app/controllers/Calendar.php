<?php

class Calendar {

	public static function getEntries() {
		$result = DatabaseConnection::getInstance()->exec('SELECT * FROM entries'); 
		return $result; 
	}

	public static function getPeople() {
		$result = DatabaseConnection::getInstance()->exec('SELECT * FROM people'); 
		return $result; 
	}

}