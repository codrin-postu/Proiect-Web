<?php

session_start();

require __DIR__."/../requires.php";
use core\Application;

$application = new Application();

$application->router->get('/', 'index');
$application->router->get('/login', 'login');

$application->run();