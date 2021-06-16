<?php

use core\Application;

class migration11_classroomTableAlter
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE classrooms AUTO_INCREMENT=100001;";
        $database->pdo->exec($stmt);
    }

    public function down() {}
}