<?php

use core\Application;

class migration26_equationsTable
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE `equations`
        (
         `id`               int AUTO_INCREMENT PRIMARY KEY,
         `equation`         varchar(255) NOT NULL ,
         `gradeCount`       int NOT NULL ,
         `classroomId`      int NOT NULL,
         `created_at`       timestamp NOT NULL
        ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE IF EXISTS equations;";
        $database->pdo->exec($stmt);
    }
}
