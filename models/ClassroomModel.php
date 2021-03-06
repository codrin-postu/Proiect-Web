<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class ClassroomModel extends DatabaseModel
{
    public string $id = '0';
    public string $name = '';
    public string $subtitle = '';
    public string $description = '';
    public string $duration = '';
    public string $commitment = '';
    public string $classCount = '';
    public string $subject = '';
    public string $evaluation = ''; //"student" "academic" <- professor
    public string $difficulty = '';
    public string $prerequisites = '';
    public string $credits = '';
    public string $topics = '';
    public string $disabled = ''; //Not to be used. Just for disabled inputs

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'classrooms';
    }

    public function columnsToInput(): array
    {
        return [
            'name',
            'description',
            'subtitle',
            'duration',
            'commitment',
            'classCount',
            'subject',
            'evaluation',
            'difficulty',
            'prerequisites',
            'credits',
            'topics'
        ];
    }

    public function inputs(): array
    {
        return [
            'name',
            'description',
            'subtitle',
            'duration',
            'commitment',
            'classCount',
            'subject',
            'evaluation',
            'difficulty',
            'prerequisites',
            'credits',
            'topics'
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
            'name' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'subtitle' => [self::RULE_REQUIRED],
            'duration' => [self::RULE_REQUIRED],
            'commitment' => [self::RULE_REQUIRED],
            'classCount' => [self::RULE_REQUIRED],
            'subject' => [self::RULE_REQUIRED],
            'evaluation' => [self::RULE_REQUIRED],
            'difficulty' => [self::RULE_REQUIRED],
            'prerequisites' => [self::RULE_REQUIRED],
            'topics' => [self::RULE_REQUIRED],
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
