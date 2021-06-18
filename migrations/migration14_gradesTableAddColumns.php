<?php

use core\Application;


class migration14_gradesTableAddColumns
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE grades
        ADD COLUMN detail VARCHAR(255) NOT NULL,
        ADD COLUMN added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
