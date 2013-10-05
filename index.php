<?php

$f3=require('lib/base.php');

$f3->config('config.ini');
$f3->set('AUTOLOAD', 'app/controllers/'); 

$f3->route('GET /', 
	function($f3) {
		$calendar = new Calendar; 
		$f3->set('days', $calendar->getInitialDays()); 
		$f3->set('people', $calendar->getPeople());
		$f3->set('entries', $calendar->getInitialEntries());  
		$view = new View; 
		echo $view->render('index.php'); 
	}
);
$f3->route('POST /entries/create', 
	function() {
		$person_id = $_POST['person_id']; 
		$date = $_POST['date']; 
		$type = $_POST['type']; 
		$entry = new Entry($date, $type, $person_id); 
		$entry->save(); 
	}
); 

$f3->run();