<?php

use core\Application;

class migration06_users_classroomsTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `users_classrooms`
        (
         `id`          int NOT NULL AUTO_INCREMENT ,
         `type`        varchar(45) NOT NULL ,
         `userId`      int NOT NULL ,
         `classroomId` int NOT NULL ,
        
        PRIMARY KEY (`id`)
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS users_classes;";
        $database->pdo->exec($stmt);
    }
}