<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class ClassroomModel extends DatabaseModel
{
    public string $id = '0';
    public string $name = '';
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

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
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
}
