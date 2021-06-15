<?php

use core\Application;

class migration09_lessonsTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `lessons`
        (
         `id`          int AUTO_INCREMENT PRIMARY KEY,
         `title`       varchar(45) NOT NULL ,
         `content`     longtext NOT NULL ,
         `created_at`  timestamp NOT NULL ,
         `classroomId` int NOT NULL 
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS lessons;";
        $database->pdo->exec($stmt);
    }
}