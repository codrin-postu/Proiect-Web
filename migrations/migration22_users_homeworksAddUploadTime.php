<?php

use core\Application;


class migration22_users_homeworksAddUploadTime
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE users_homeworks
        ADD COLUMN uploaded_at TIMESTAMP NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
