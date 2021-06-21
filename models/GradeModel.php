<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class GradeModel extends DatabaseModel
{
    public string $id = '0';
    public string $grade = '';
    public string $userId = '';
    public string $classroomId = '';
    public string $homeworkId = '';
    public string $detail = '';
    public string $added_at = '';
    public string $type = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'grades';
    }

    public function columnsToInput(): array
    {
        return [
            'grade',
            'type',
            'detail',
            'userId',
            'classroomId',
            'homeworkId'
        ];
    }

    public function inputs(): array
    {
        return [
            'grade',
            'type',
            'detail',
            'userId',
            'classroomId',
            'homeworkId'
        ];
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



    public function rules(): array
    {
        return [
            'grade' => [self::RULE_REQUIRED, self::RULE_NUMBER],
            'type' => [self::RULE_REQUIRED],
            'detail' => [self::RULE_REQUIRED]
        ];
    }

    public static function getLatestId()
    {
        $stmt = self::prepare("SELECT * FROM classrooms ORDER BY id DESC LIMIT 0, 1;");

        $stmt->execute();
        return $stmt->fetchObject(ClassroomModel::class)->{"id"};
    }

    public static function getClassById($id)
    {
        $stmt = self::prepare("SELECT * FROM classrooms WHERE id = :$id;");

        $stmt->bindValue(":$id", $id);

        $stmt->execute();
        return $stmt->fetchObject(ClassroomModel::class);
    }
}
