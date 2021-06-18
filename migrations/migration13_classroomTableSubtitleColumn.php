migration13_classroomTableSubtitleColumn.php

<?php

use core\Application;


class migration13_classroomTableSubtitleColumn
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "ALTER TABLE classrooms
        ADD COLUMN subtitle VARCHAR(255) NOT NULL AFTER name;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
    }
}
