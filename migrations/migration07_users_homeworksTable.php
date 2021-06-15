<?php

use core\Application;

class migration07_users_homeworksTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `users_homeworks`
        (
         `id`            int AUTO_INCREMENT PRIMARY KEY,
         `uploaded_file` varchar(45) NOT NULL ,
         `userId`        int NOT NULL ,
         `homeworkId`    int NOT NULL 
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS users_homeworks;";
        $database->pdo->exec($stmt);
    }
}