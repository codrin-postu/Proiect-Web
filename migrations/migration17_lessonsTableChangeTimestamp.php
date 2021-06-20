<?php

use core\Application;

class migration17_lessonsTableChangeTimestamp
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE lessons 
            MODIFY created_at datetime NOT NULL,
            ADD COLUMN updated_at timestamp NOT NULL;";

        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
