<?php

use core\Application;

class migration28_users_classroomTableChangeType
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE users_classrooms 
            CHANGE type userType varchar(40) NOT NULL";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
