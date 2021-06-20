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
            'content',
            'created_at'
        ];
    }

    public function inputs(): array
    {
        return [
            'number',
            'title',
            'classroomId',
            'content',
            'created_at'
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

    public function delete()
    {

        $this->created_at = date('Y-m-d H:i:s', time());

        // echo '<pre>';
        // var_dump($this->created_at);
        // echo '</pre>';
        // exit;


        $tableName = $this->tableName();
        $stmt = self::prepare("DELETE FROM $tableName WHERE id = :id;");

        $stmt->bindValue(":id", $this->id);

        $stmt->execute();
        return true;
    }

    public function save()
    {

        $this->created_at = date('Y-m-d H:i:s', time());

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
