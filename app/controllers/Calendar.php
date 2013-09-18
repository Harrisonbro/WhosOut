<?php

class Calendar {

	// Holds array of date objects 
	private $initialDays; 

	public function __construct() {
		$this->setInitialDays(); 
		$this->applyInitialEntriesToInitialDays(); 
	}

	private function setInitialDays() {
		// Get set of days
		$interval = 14; 
		$days = array(); 
		$datePointer = new DateTime('today'); 
		$days[$datePointer->format('Y-m-d')] = (object)array('date'=>$datePointer, 'entries'=>array()); // TODO: consider making a Day class with a constructor that takes care of all this
		for($i=1; $i<$interval; $i++) {
			$datePointer = clone($datePointer); 
			$datePointer->add( new DateInterval('P1D') );
			$days[$datePointer->format('Y-m-d')] = (object)array('date'=>$datePointer, 'entries'=>array()); 
		}
		// Set result to class property
		$this->initialDays = $days; 
	}

	private function applyInitialEntriesToInitialDays() {
		foreach($this->getInitialEntries() as $e) {
			$this->initialDays[$e->date]->entries[] = $e; 
		}
	}

	public function getInitialDays() {
		return $this->initialDays; 
	}

	public function getEntriesByDay(DateTime $date) {
		$entry = new DB\SQL\Mapper(DatabaseConnection::getInstance(), 'entries'); 
		$entries = $entry->find('date="' . $date->format('Y-m-d') . '"'); 
		return $entries; 
	}

	public function getEntriesByInterval(DateTime $start, DateTime $end) {
		$entry = new DB\SQL\Mapper(DatabaseConnection::getInstance(), 'entries'); 
		$entries = $entry->find('date>="' . $start->format('Y-m-d') . '" and date<="' . $end->format('Y-m-d') . '"'); 
		return $entries; 
	}

	public function getInitialEntries() {
		$initialdays = $this->getInitialDays(); 
		$start = array_shift($initialdays); 
		$end = array_pop($initialdays); 
		return $this->getEntriesByInterval($start->date, $end->date); 
	}

	public function getPeople() {
		// Get array of people objects
		$people = new DB\SQL\Mapper(DatabaseConnection::getInstance(), 'people'); 
		$result = $people->find(); 
		// Set array keys to person ID
		foreach($result as $r) {
			$result_hashmap[$r->id] = $r; 
		}
		// Return
		return $result_hashmap; 
	}

}