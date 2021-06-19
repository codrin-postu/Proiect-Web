<?php

namespace models;

use core\DatabaseModel;
use core\Model;
use DateInterval;
use DateTime;
use DateTimeZone;

class LessonModel extends DatabaseModel
{
    public string $id = '0';
    public string $number = '';
    public $created_at;
    public string $classroomId = '';
    public string $title = '';
    public string $content = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'lessons';
    }

    public function columnsToInput(): array
    {
        return [
            'number',
            'title',
            'classroomId',
            'content'
        ];
    }

    public function inputs(): array
    {
        return [
            'number',
            'title',
            'classroomId',
            'content'
        ];
    }

    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'number' => [self::RULE_REQUIRED],
            'content' => [self::RULE_REQUIRED]
        ];
    }

    public function save()
    {

        // echo '<pre>';
        // var_dump($classroomCode);
        // echo '</pre>';
        // exit;


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
