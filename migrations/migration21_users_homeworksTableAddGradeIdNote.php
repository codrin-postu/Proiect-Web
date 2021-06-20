<?php

use core\Application;


class migration21_users_homeworksTableAddGradeIdNote
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE users_homeworks
        ADD COLUMN status TINYINT(4) NOT NULL,
        ADD COLUMN gradeId INT NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
