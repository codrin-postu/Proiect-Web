<?php

namespace models;

use core\DatabaseModel;
use core\Model;
use DateInterval;
use DateTime;
use DateTimeZone;

class EquationModel extends DatabaseModel
{
    public string $id = '0';
    public string $equation = '';
    public $created_at;
    public string $classroomId = '';
    public string $gradeCount = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'equations';
    }

    public function columnsToInput(): array
    {
        return [
            'equation',
            'gradeCount',
            'classroomId'
        ];
    }

    public function inputs(): array
    {
        return [
            'equation',
            'gradeCount',
            'classroomId'
        ];
    }

    public function rules(): array
    {
        return [
            'equation' => [self::RULE_REQUIRED],
            'gradeCount' => [self::RULE_REQUIRED]
        ];
    }

    public function updateColumn()
    {
        $tableName = $this->tableName();

        $stmt = self::prepare("UPDATE $tableName 
            SET equation = $this->equation,
            gradeCount = $this->gradeCount
            WHERE classroomId = $this->classroomId;");

        $stmt->execute();
        return true;
    }

    public function save()
    {

        $tableName = $this->tableName();
        $tableColumns = $this->columnsToInput();
        $inputs = $this->inputs();
        $params = array_map(fn ($input) => ":$input", $inputs);
        $stmt = self::prepare("INSERT INTO $tableName (" . implode(",", $tableColumns) . ") 
            VALUES(" . implode(",", $params) . ");");

        foreach ($inputs as $input) {
            // var_dump($this->$input, $this->{$input});
            $stmt->bindValue(":$input", $this->{$input});
        }

        $stmt->execute();
        return true;
    }
}
