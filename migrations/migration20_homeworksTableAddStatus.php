<?php

use core\Application;


class migration20_homeworksTableAddStatus
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE homeworks
        ADD COLUMN status TINYINT(4) NOT NULL";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
