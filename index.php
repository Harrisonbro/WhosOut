<?php

$f3=require('lib/base.php');

$f3->config('config.ini');

$f3->route('GET /',
	function() {
		echo "hi world"; 
	}
);

$f3->run();