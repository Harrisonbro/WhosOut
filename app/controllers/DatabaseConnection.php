<?php

class DatabaseConnection {

	private static $db; 

	private function __construct() {}

	public static function getInstance() {
		if(!isset(self::$db)) {
			self::$db = new DB\SQL(
				'mysql:host=localhost; dbname=whosout', 
				'root', 
				'root'
			);
		}
		return self::$db; 
	}

}