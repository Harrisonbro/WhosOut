<?php

class DatabaseConnection {

	private static $db; 

	private function __construct() {}

	public static function getInstance() {
		if(!isset(self::$db)) {
			global $f3; 
			self::$db = new DB\SQL(
				'mysql:host='.$f3->get('DB_HOST').'; dbname='.$f3->get('DB_NAME'), 
				$f3->get('DB_USER'), 
				$f3->get('DB_PASS')
			);
		}
		return self::$db; 
	}

}