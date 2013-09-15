<?php

$f3=require('lib/base.php');

$f3->config('config.ini');
$f3->set('AUTOLOAD', 'app/controllers/'); 

$f3->route('GET /', 
	function($f3) {
		$f3->set('myvar', 'hello world'); 
		$Template = new Template; 
		echo $Template->render('mytempl.htm'); 
	}
);

$f3->run();