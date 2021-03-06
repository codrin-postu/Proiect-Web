<?php

namespace core;

use \PDO;

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

        $where = $this->clause();

        $clauseInputs = array_keys($where);

        $clause = implode("AND ", array_map(fn ($clauseInput) => "$clauseInput = :$clauseInput", $clauseInputs));

        $set = '';
        for ($i = 0; $i < count($tableColumns); $i++) {
            $set = $set . $tableColumns[$i] . '=' . $params[$i];
            if ($i < count($tableColumns) - 1) {
                $set = $set . ', ';
            }
        }

        $stmt = self::prepare("UPDATE $tableName 
            SET $set
            WHERE $clause;");

        foreach ($inputs as $input) {
            // var_dump($this->$input, $this->{$input});
            $stmt->bindValue(":$input", $this->{$input});
        }

        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return true;
    }

    static public function prepare($stmt)
    {
        return Application::$application->database->pdo->prepare($stmt);
    }

    public function findOne($where, $optional = '')
    {
        $tableName = static::tableName();
        $inputs = array_keys($where);
        $endStmt = implode(" AND ", array_map(fn ($input) => "$input = :$input", $inputs));
        // SELECT * FROM tableName WHERE email = :email AND firstname = :firstname
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $endStmt $optional");
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchObject(static::class);
    }

    public function findAll($where, $optional = "")
    {
        $tableName = static::tableName();
        $inputs = array_keys($where);
        $endStmt = implode(" AND ", array_map(fn ($input) => "$input = :$input", $inputs));
        // SELECT * FROM tableName WHERE email = :email AND firstname = :firstname
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $endStmt $optional");
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
