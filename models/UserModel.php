<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class UserModel extends DatabaseModel
{
    public string $firstName = '';
    public string $lastName = '';
    public string $middleName = ' ';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public string $accountType = ''; //"student" "academic" <- professor
    public string $agreeTOS = '';
    // public string $testRadio = '';  //just for test purposes

    public function tableName() : string
    {
        return 'users';
    }

    public function columnsToInput() : array
    {
        return ['firstname', 'middlename', 'lastname', 'email', 'type', 'password'];
    }

    public function inputs() : array
    {
            return ['firstName', 'middleName', 'lastName', 'email', 'accountType', 'password'];
    }

    public function register()
    {
        $this->save();
    }

    public function rules() : array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'matchAttribute' => 'password']],
            'agreeTOS' => [self::RULE_REQUIRED]
        ];
    }
}