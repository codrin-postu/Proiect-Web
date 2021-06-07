<?php

namespace core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    // public const RULE_UNIQUE = 'unique';

    public array $errors = [];

    public function loadData($data)  
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules() : array;

    public function validate()
    {
        foreach ($this->rules() as $inputType => $rules) {
            $value = $this->{$inputType};
            foreach ($rules as $rule) {
                if (!is_string($rule)) {
                    $ruleType = $rule[0];
                } else {
                    $ruleType = $rule;
                }

                if ($ruleType === self::RULE_REQUIRED && !$value) {
                    $this->addError($inputType, self::RULE_REQUIRED);
                }
                
                // echo '<pre>';
                // var_dump($ruleType);
                // var_dump($value);
                // echo '</pre>';
                
                if ($ruleType === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) 
                {
                    $this->addError($inputType, self::RULE_EMAIL);
                }

                if ($ruleType === self::RULE_MIN && strlen($value) < $rule['min']) 
                {
                    $this->addError($inputType, self::RULE_MIN, $rule);
                }

                if ($ruleType === self::RULE_MAX && strlen($value) > $rule['max']) 
                {
                    $this->addError($inputType, self::RULE_MAX, $rule);
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $inputType, string $rule, $data)
    {
        // foreach ($data as $key => $value) {
            
        // }
        $this->errors[$inputType][] = $this->errorMessages()[$rule] ?? ''; 
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'It must be a valid email address',
            self::RULE_MIN => 'Password must be at least {min} characters',
            self::RULE_MAX => 'Password can not be longer than {max} characters',
            self::RULE_MATCH => 'The two password fields must match'
        ];
    }
}