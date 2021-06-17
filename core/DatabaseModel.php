<?php

namespace core;

abstract class DatabaseModel extends Model
{
    abstract public function tableName(): string;

    abstract public function inputs(): array;

    abstract public function columnsToInput(): array;

    abstract public function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $tableColumns = $this->columnsToInput();
        $inputs = $this->inputs();
        $params = array_map(fn ($input) => ":$input", $inputs);



        $stmt = self::prepare("
            INSERT INTO $tableName (" . implode(",", $tableColumns) . ") 
            VALUES(" . implode(",", $params) . ")");


        var_dump($stmt);
        exit;
        foreach ($inputs as $input) {
            // var_dump($this->$input, $this->{$input});
            $stmt->bindValue(":$input", $this->{$input});
        }

        $stmt->execute();
        return true;
    }

    public function update()
    {
        $tableName = $this->tableName();
        $tableColumns = $this->columnsToInput();
        $inputs = $this->inputs();
        $params = array_map(fn ($input) => ":$input", $inputs);
        $clause = $this->clause();
        $set = '';
        $id = $this->id;

        for ($i = 0; $i < count($tableColumns); $i++) {
            $set = $set . $tableColumns[$i] . '=' . $params[$i];
            if ($i < count($tableColumns) - 1) {
                $set = $set . ', ';
            }
        }

        // echo "<pre>";
        // var_dump($set);
        // foreach ($inputs as $input) {
        //     var_dump($this->id);
        // }
        // echo "</pre>";
        // exit;

        $stmt = self::prepare("UPDATE $tableName 
            SET $set
            WHERE $clause;");

        foreach ($inputs as $input) {
            // var_dump($this->$input, $this->{$input});
            $stmt->bindValue(":$input", $this->{$input});
        }

        $stmt->bindValue(":id", $id);

        // echo "<pre>";
        // var_dump(intval($id));
        // var_dump($stmt);
        // echo "</pre>";
        // exit;

        $stmt->execute();
        return true;
    }

    static public function prepare($stmt)
    {
        return Application::$application->database->pdo->prepare($stmt);
    }

    public function findOne($where)
    {
        $tableName = static::tableName();
        $inputs = array_keys($where);
        $endStmt = implode("AND ", array_map(fn ($input) => "$input = :$input", $inputs));
        // SELECT * FROM tableName WHERE email = :email AND firstname = :firstname
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $endStmt");
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchObject(static::class);
    }
}
