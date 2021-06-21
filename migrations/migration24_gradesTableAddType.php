<?php

use core\Application;


class migration24_gradesTableAddType
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE grades
        ADD COLUMN type VARCHAR(255) NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
