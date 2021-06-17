<?php

namespace fields;

use core\form\Field;
use core\Model;

class SelectField extends Field
{

    public string $optionOutput = '';

    public function __construct(Model $model, $inputData = '', $value = '', $inputAttributes = '', $wrapperClass = '')
    {
        $this->value = $value;
        $this->fieldType = self::TYPE_SELECT;
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
            '<select name="%s">',
            $this->inputData
        );
        $output = $output . $this->optionOutput;

        $output = $output . '</select>';

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

    public function setOptions($values, $names, $attributes = [])
    {
        $found = false;
        for ($i = 0; $i < count($values); $i++) {
            $attributes[$i] = str_replace("selected", "", $attributes[$i]);
            if ($this->model->{$this->inputData} === $values[$i]) {
                $attributes[$i] = $attributes[$i] . 'selected';
                $found = true;
            }
        }

        if (!$found) {
            $attributes[0] = $attributes[0] . 'selected';
        }

        $optionOutput = '';
        for ($i = 0; $i < count($values); $i++) {

            $optionOutput = $optionOutput . sprintf(
                '<option value="%s" %s>%s</option>',
                $values[$i],
                $attributes[$i],
                $names[$i],
            );
        }

        $this->optionOutput = $optionOutput;
    }
}
