<?php

use core\Application;

class migration01_initial
{
    public function up()
    {
        $database = Application::$application->database;
        $stmt = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            middlename VARCHAR(255),
            lastname VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $database->pdo->exec($stmt);
    }

    public function down()
    {
        $database = Application::$application->database;
        $stmt = "DROP TABLE users;";
        $database->pdo->exec($stmt);
    }
}