<?php

$f3=require('lib/base.php');

$f3->config('config.ini');
$f3->set('AUTOLOAD', 'app/controllers/'); 

$f3->route('GET /', 
	function($f3) {
		$f3->set('entries', Calendar::getEntries()); 
		$f3->set('people', Calendar::getPeople()); 
		$view = new View; 
		echo $view->render('index.php'); 
	}
);

$f3->run();