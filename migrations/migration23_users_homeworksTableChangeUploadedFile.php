<?php

use core\Application;

class migration23_users_homeworksTableChangeUploadedFile
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE users_homeworks 
            MODIFY uploaded_file VARCHAR(255) NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
