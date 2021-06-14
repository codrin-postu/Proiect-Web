<?php

use core\Application;

class migration02_renameUserColumn
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE users 
            CHANGE firstname firstName VARCHAR(255),
            CHANGE middlename middleName VARCHAR(255),
            CHANGE lastname lastName VARCHAR(255),
            CHANGE type accountType VARCHAR(255);";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}