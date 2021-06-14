<?php

use core\Application;

class migration04_gradesTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `grades`
        (
         `id`          int NOT NULL AUTO_INCREMENT ,
         `grade`       int NOT NULL ,
         `userId`      int NOT NULL ,
         `classroomId` int NOT NULL ,
        
        PRIMARY KEY (`id`)
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE grades;";
        $database->pdo->exec($stmt);
    }
}