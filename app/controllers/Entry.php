<?php

class Entry {

	private static $date; 
	private static $type; 
	private static $person_id; 

	public function __construct($d, $t, $p) {
		self::$date = $d; 
		self::$type = $t;
		self::$person_id = $p; 
	}

	public function save() {
		$entry = new DB\SQL\Mapper(DatabaseConnection::getInstance(), 'entries'); 
		$entry->date = self::$date; 
		$entry->type = self::$type; 
		$entry->person_id = self::$person_id; 
		$entry->save(); 
	}

}