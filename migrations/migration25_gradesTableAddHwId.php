<?php

use core\Application;


class migration25_gradesTableAddHwId
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE grades
        ADD COLUMN homeworkId INT NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
