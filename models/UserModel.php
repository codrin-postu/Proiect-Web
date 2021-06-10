<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class UserModel extends DatabaseModel
{
    const STATUS_OFFLINE = 0; //default
    const STATUS_ONLINE = 1;
    const STATUS_DELETED = 2;

    public string $firstName = '';
    public string $lastName = '';
    public string $middleName = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public string $accountType = ''; //"student" "academic" <- professor
    public string $agreeTOS = '';
    public int $userStatus = self::STATUS_OFFLINE;

    public function tableName() : string
    {
        return 'users';
    }

    public function columnsToInput() : array
    {
        return ['firstname', 'middlename', 'lastname', 'email', 'type', 'password', 'status'];
    }

    public function inputs() : array
    {
            return ['firstName', 'middleName', 'lastName', 'email', 'accountType', 'password', 'userStatus'];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function rules() : array
    {
        return [
            'firstName' => [self::RULE_REQUIRED, self::RULE_TEXT],
            'lastName' => [self::RULE_REQUIRED, self::RULE_TEXT],
            'middleName' => [self::RULE_TEXT],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64], self::RULE_PASS],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'matchAttribute' => 'password']],
            'agreeTOS' => [self::RULE_REQUIRED]
        ];
    }
}