<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class UserUpdateModel extends DatabaseModel
{
    public string $id = '0';
    public string $firstName = '';
    public string $lastName = '';
    public string $middleName = '';
    public string $email = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function clause()
    {
        return 'id=:id';
    }

    public function columnsToInput(): array
    {
        return ['firstName', 'middleName', 'lastName'];
    }

    public function inputs(): array
    {
        return ['firstName', 'middleName', 'lastName'];
    }

    public function update()
    {
        return parent::update();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED, self::RULE_TEXT],
            'lastName' => [self::RULE_REQUIRED, self::RULE_TEXT],
            'middleName' => [self::RULE_TEXT],
        ];
    }


    /**
     * Must use the database column names NOT the variables that have been set up above, 
     * if they are different.
     */
}
