<?php

namespace core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_NUMBER = 'number';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_CHECKED = 'checked';
    public const RULE_PASS = 'password';
    public const RULE_TEXT = 'text';
    public const RULE_UNIQUE = 'unique';

    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $input => $rules) {
            $value = $this->{$input};
            foreach ($rules as $rule) {
                if (!is_string($rule)) {
                    $ruleType = $rule[0];
                } else {
                    $ruleType = $rule;
                }

                if ($ruleType === self::RULE_REQUIRED && !$value) {
                    $this->addErrorRule($input, self::RULE_REQUIRED);
                }

                if ($ruleType === self::RULE_NUMBER && !preg_match('/^\d{6}$/', $value)) {
                    $this->addErrorRule($input, self::RULE_NUMBER);
                }

                if ($ruleType === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorRule($input, self::RULE_EMAIL);
                }

                if ($ruleType === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorRule($input, self::RULE_MIN, $rule);
                }

                if ($ruleType === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorRule($input, self::RULE_MAX, $rule);
                }

                if ($ruleType === self::RULE_MATCH && $value !== $this->{$rule['matchAttribute']}) {
                    $this->addErrorRule($input, self::RULE_MATCH, $rule);
                }

                if ($ruleType === self::RULE_PASS && !preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $value)) {
                    var_dump($value);
                    $this->addErrorRule($input, self::RULE_PASS);
                }

                if ($ruleType === self::RULE_TEXT && (!ctype_alpha($value) && strlen($value) > 0)) {
                    $this->addErrorRule($input, self::RULE_TEXT);
                }

                if ($ruleType === self::RULE_UNIQUE) {
                    $className = $rule['table'];
                    $uniqueInput = $rule['input'] ?? $input;
                    $tableName = $className::tableName();

                    $stmt = Application::$application->database->prepare("SELECT * FROM $tableName 
                        WHERE $uniqueInput = :$input;");
                    $stmt->bindValue(":$input", $value);
                    $stmt->execute();

                    $matches = $stmt->fetchObject();
                    if ($matches) {
                        $this->addErrorRule($input, self::RULE_UNIQUE, ['inputType' => $input]);
                    }
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $input, string $data)
    {
        $this->errors[$input][] = $data;
    }

    private function addErrorRule(string $input, string $rule, array $data = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($data as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$input][] = $message;
    }

    public function hasError($input)
    {
        return $this->errors[$input] ?? false;
    }

    public function getFirstError($input)
    {
        return $this->errors[$input][0] ?? false;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'It must be a valid email address',
            self::RULE_MIN => 'Password must be at least {min} characters',
            self::RULE_MAX => 'Password can not be longer than {max} characters',
            self::RULE_MATCH => 'The two password fields must match',
            self::RULE_PASS => 'Password must contain at least a letter and a number',
            self::RULE_TEXT => 'This field can only contain letters',
            self::RULE_UNIQUE => 'An account with this {inputType} already exists',
            self::RULE_NUMBER => 'The field can only contain digits'
        ];
    }
}
