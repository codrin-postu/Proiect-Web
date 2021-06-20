<?php

use core\Application;

class migration18_lessonsTableChangeId
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE lessons AUTO_INCREMENT=1000001;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
