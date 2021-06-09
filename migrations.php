<?php

session_start();

require __DIR__."/requires.php";

use core\Application;

$application = new Application(__DIR__); //send in the project root DIR

$application->database->applyMigrations();