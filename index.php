<?php

session_start();

require_once "./requires.php";
use core\Application;

$application = new Application();

$application->router->get('/',function() {
    return 'Hello World';
});
$application->router->get('/contact', function() {
    return 'Contact';
});

$application->run();