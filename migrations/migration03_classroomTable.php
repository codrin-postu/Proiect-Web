<?php

use core\Application;

class migration03_classroomTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `classrooms`
        (
         `id`            int AUTO_INCREMENT  PRIMARY KEY,
         `code`          varchar(45) NOT NULL ,
         `name`          varchar(45) NOT NULL ,
         `description`   longtext NOT NULL ,
         `duration`      varchar(45) NOT NULL ,
         `commitment`    varchar(45) NOT NULL ,
         `classCount`       varchar(45) NOT NULL ,
         `subject`       varchar(45) NOT NULL ,
         `evaluation`    varchar(45) NOT NULL ,
         `difficulty`    varchar(45) NOT NULL ,
         `prerequisites` varchar(45) NOT NULL ,
         `credits`       int NOT NULL ,
         `topics`        varchar(45) NOT NULL 
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE classrooms;";
        $database->pdo->exec($stmt);
    }
}