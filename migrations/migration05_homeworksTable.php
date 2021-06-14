<?php

use core\Application;

class migration05_homeworksTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `homeworks`
        (
         `id`          int AUTO_INCREMENT PRIMARY KEY,
         `title`       varchar(45) NOT NULL ,
         `description` longtext NOT NULL ,
         `start_date`  timestamp NOT NULL ,
         `end_date`    datetime NOT NULL ,
         `classroomId` int NOT NULL
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS homeworks;";
        $database->pdo->exec($stmt);
    }
}