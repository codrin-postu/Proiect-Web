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
    public const TYPE_DATETIME = 'datetime-local';
    public const TYPE_FILE = 'file';

    public const TYPE_SELECT = 'select';
    public const TYPE_SELECT_OPT = 'option';

    public string $fieldType;
    public Model $model;
    public string $inputData;
    public string $value;
    public string $inputAttributes;
    public string $wrapperClass = '';

    public function __construct(Model $model, $inputData = '', $value = '', $inputAttributes = '', $wrapperClass = '')
    {
        $this->value = $value;
        $this->fieldType = self::TYPE_TEXT;
        $this->model = $model;
        $this->inputData = $inputData;
        $this->inputAttributes = $inputAttributes;
        $this->wrapperClass = $wrapperClass;
    }

    public function __toString()
    {
        $output = sprintf(
            '<div class="form-group %s">',
            $this->wrapperClass
        );

        $output = $output . sprintf(
            '<input type="%s" name="%s" placeholder="%s" value="%s" %s>',
            $this->fieldType,
            $this->inputData,
            $this->value,
            $this->model->{$this->inputData},
            $this->inputAttributes
        );

        return $output . sprintf(
            '
                <div class="invalid-feedback"> 
                    <p>%s</p>
                </div>
            </div>
            ',
            $this->model->getFirstError($this->inputData)
        );
    }
}
