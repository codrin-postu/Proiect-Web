<?php

use core\Application;

class migration15_attendanceTableAddColumn
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE attendance 
            CHANGE code codeId int NOT NULL";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
