<?php

namespace core;

abstract class DatabaseModel extends Model
{
    abstract public function tableName() : string;

    abstract public function inputs() : array;

    abstract public function columnsToInput() : array;

    public function save()
    {
        $tableName = $this->tableName();
        $tableColumns = $this->columnsToInput();
        $inputs = $this->inputs();
        $params = array_map(fn($input) => ":$input", $inputs);
        $stmt = self::prepare("INSERT INTO $tableName (".implode(",", $tableColumns).") 
            VALUES(".implode(",", $params).")");
            
        foreach ($inputs as $input) {
            // var_dump($this->$input, $this->{$input});
             $stmt->bindValue(":$input", $this->{$input});
        }

        // echo '<pre>';
        // var_dump($stmt);
        // echo '</pre>';
        // exit;
    
        $stmt->execute();
        return true;
    }

    static public function prepare($stmt)
    {
        return Application::$application->database->pdo->prepare($stmt);
    }

}