<?php

use core\Application;

class migration12_homeworksTableAlter
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE homeworks AUTO_INCREMENT=1000001;";
        $database->pdo->exec($stmt);
    }

    public function down() {}
}