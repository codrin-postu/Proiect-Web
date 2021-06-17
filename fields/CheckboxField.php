<?php

namespace fields;

use core\form\Field;
use core\Model;

class CheckboxField extends Field
{
    public function __construct(Model $model, $inputData = '', $value = '', $inputAttributes = '', $wrapperClass = '')
    {
        $this->value = $value;
        $this->fieldType = self::TYPE_CHECKBOX;
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

        if ($this->model->{$this->inputData} === "on") {
            $isChecked = 'checked';
        } else {
            $isChecked = '';
        }
        $output = $output . sprintf(
            '<input type="%s" name="%s" %s %s>
        <label>%s</label>',
            $this->fieldType,
            $this->inputData,
            $this->inputAttributes,
            $isChecked,
            $this->value
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
