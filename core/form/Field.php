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
    public const TYPE_HIDDEN = 'hidden';
    public const TYPE_TEXTAREA = 'textarea';

    public const TYPE_SELECT = 'select';
    public const TYPE_SELECT_END = 'select_end';
    public const TYPE_SELECT_OPT = 'option';

    public string $fieldType;
    public Model $model;
    public string $inputType;
    public string $value;
    public string $attributes;

    public function __construct(Model $model, $inputType = '', $value = '', $attributes = '')
    {
        $this->value = $value;
        $this->fieldType = self::TYPE_TEXT;
        $this->model = $model;
        $this->inputType = $inputType;
        $this->attributes = $attributes;
    }

    public function __toString()
    {
        $output = '<div class="form-group">';
        switch ($this->fieldType) {
            case self::TYPE_HIDDEN:
                $output = $output . sprintf(
                    '<input type="%s" name="%s" placeholder="%s" value="%s" %s>',
                    $this->fieldType,
                    $this->inputType,
                    '',
                    $this->value,
                    $this->attributes
                );
                break;
            case self::TYPE_CHECKBOX:
                if ($this->model->{$this->inputType} === "on") {
                    $isChecked = 'checked';
                } else {
                    $isChecked = '';
                }
                $output = $output . sprintf(
                    '<input type="%s" name="%s" %s %s>
                <label>%s</label>',
                    $this->fieldType,
                    $this->inputType,
                    $this->attributes,
                    $isChecked,
                    $this->value
                );
                break;
            case self::TYPE_TEXTAREA:
                $output = $output . sprintf(
                    '<textarea name="%s" placeholder="%s" %s>%s</textarea>',
                    $this->inputType,
                    $this->value,
                    $this->attributes,
                    $this->model->{$this->inputType}
                );
                break;
            default:
                $output = $output . sprintf(
                    '<input type="%s" name="%s" placeholder="%s" value="%s" %s>',
                    $this->fieldType,
                    $this->inputType,
                    $this->value,
                    $this->model->{$this->inputType},
                    $this->attributes
                );
                break;
        }

        return $output . sprintf(
            '
                <div class="invalid-feedback"> 
                    <p>%s</p>
                </div>
            </div>
            ',
            $this->model->getFirstError($this->inputType)
        );
    }

    public function setField($fieldType)
    {
        $this->fieldType = $fieldType;
        return $this;
    }
}
