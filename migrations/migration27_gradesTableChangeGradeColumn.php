<?php

use core\Application;

class migration27_gradesTableChangeGradeColumn
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE grades 
            MODIFY grade decimal(5,2)  NOT NULL;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
