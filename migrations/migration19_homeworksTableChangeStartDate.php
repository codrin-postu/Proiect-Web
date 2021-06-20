<?php

use core\Application;

class migration19_homeworksTableChangeStartDate
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE homeworks 
            MODIFY start_date datetime NOT NULL,
            ADD COLUMN updated_at timestamp NOT NULL;";

        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
