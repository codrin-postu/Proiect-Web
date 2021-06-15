<?php

use core\Application;

class migration10_attendance_codesTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `attendance_codes`
        (
         `id`          int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
         `code`        varchar(45) NOT NULL ,
         `created_at`  timestamp NOT NULL ,
         `expires_at`  datetime NOT NULL ,
         `classroomId` int NOT NULL
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS attendance_codes;";
        $database->pdo->exec($stmt);
    }
}