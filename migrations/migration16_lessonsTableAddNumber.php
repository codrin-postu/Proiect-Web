<?php

use core\Application;

class migration16_lessonsTableAddNumber
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE lessons 
            ADD COLUMN number int NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
