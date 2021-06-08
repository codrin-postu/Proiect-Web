<?php

namespace core\form;

use core\Model;

class Field 
{
    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';
    public const TYPE_PASS = 'password';
    public const TYPE_TEL = 'tel';
    public const TYPE_DATE = 'date';
    public const TYPE_RANGE = 'range';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_RADIO = 'radio';
    public const TYPE_MONTH = 'month';
    public const TYPE_WEEK = 'week';
    public const TYPE_TIME = 'time';
    public const TYPE_BUTTON = 'button';
    public const TYPE_SUBMIT = 'submit';

    public string $fieldType;
    public Model $model;
    public string $inputType;

    public function __construct(Model $model, $inputType)
    {
        $this->fieldType = self::TYPE_TEXT;
        $this->model = $model;
        $this->inputType = $inputType;
    }

    public function __toString()
    {
            return sprintf('
            <div class="form-group">
                <input type="%s" name="%s" placeholder="%s" value="%s" >
                <div class="invalid-feedback"> 
                    <p>%s</p>
                </div>
            </div>
            ', 
            $this->fieldType,
            $this->inputType, 
            $this->inputType, 
            $this->model->{$this->inputType},
            $this->model->getFirstError($this->inputType),
    );
    }

    public function setField($fieldType)
    {
            $this->fieldType = $fieldType;

            // switch ($fieldType) {
            //     case 'text':
            //         $this->type = self::TYPE_TEXT;
            //         break;
            //     case 'email':
            //         $this->type = self::TYPE_EMAIL;
            //         break;
            //     case 'password':
            //         $this->type = self::TYPE_PASS;
            //         break;
            //     case 'checkbox':
            //         $this->type = self::TYPE_CHECKBOX;
            //         break;
            //     case 'radio':
            //         $this->type = self::TYPE_RADIO;
            //         break;
            //     case 'number':
            //         $this->type = self::TYPE_NUMBER;
            //         break;
            //     case 'tel':
            //         $this->type = self::TYPE_TEL;
            //         break;
            //     case 'range':
            //         $this->type = self::TYPE_RANGE;
            //         break;
            //     case 'date':
            //         $this->type = self::TYPE_DATE;
            //         break;
            //     default:
            //         echo "Not a valid type";
            //         break;
            // }
            
            return $this;
    }
}