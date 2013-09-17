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

	/**
	 * Returns initial set of days to build first view of calendar
	 */
	public static function getInitialDays() {
		$interval = 14; 
		$days = array(); 
		$datePointer = new DateTime('today'); 
		$days[] = $datePointer; 
		$datePointer = clone($datePointer); 
		$days[] = $datePointer->add( new DateInterval('P1D') );
		return $days; 
	}

}