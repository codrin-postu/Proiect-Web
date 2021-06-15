<?php

use core\Application;

class migration08_users_attendanceTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `attendance`
        (
         `id`          int AUTO_INCREMENT PRIMARY KEY,
         `attended_at` timestamp NOT NULL ,
         `code`        varchar(45) NOT NULL ,
         `userId`      int NOT NULL ,
         `classroomId` int NOT NULL 
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS users_attendance;";
        $database->pdo->exec($stmt);
    }
}