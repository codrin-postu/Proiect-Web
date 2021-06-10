<?php

namespace core;

class Database
{
    public \PDO $pdo;

    public function __construct()
    {
        $database = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
        $this->pdo = new \PDO($database, DB_USER, DB_PASS);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); //outputs errors
    }

    public function applyMigrations()
    {
        $migrationsToApply = [];
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();


        $files = scandir(Application::$rootDir.'/migrations');
        $migrations = array_diff($files, $appliedMigrations);
        
        foreach ($migrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$rootDir.'/migrations/'.$migration;

            $migrationClass = pathinfo($migration, PATHINFO_FILENAME);  //returns the name of the file without .php extension
            $instance = new $migrationClass();
            $this->log("Applying migration: $migrationClass");
            $instance->up();  //applying migrations that are not part of the applied migrations table
            $this->log("Applied migration: $migrationClass");
            $migrationsToApply[] = $migration;
        }

        if (!empty($migrationsToApply)) {
            $this->saveMigrations($migrationsToApply);
        } else {
            $this->log("All migrations have been already applied.");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $stmt = $this->pdo->prepare("SELECT migration FROM migrations;");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $migrationsString = implode(", ", array_map(fn($m) => "('$m')", $migrations));
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
                $migrationsString
            ");
        $stmt->execute();
    }

    protected function log(string $message)
    {
        echo '['.date('Y-m-d H:i:s').'] - '.$message."\n";
    }

    public function prepare(string $stmt)
    {
        return $this->pdo->prepare($stmt);
    }

}