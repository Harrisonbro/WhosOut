<?php

$f3=require('lib/base.php');

$f3->config('config.ini');
$f3->set('AUTOLOAD', 'app/controllers/'); 

$f3->route('GET /', 'myTest->testMethod');

$f3->run();