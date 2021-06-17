<?php

namespace fields;

use core\form\Field;
use core\Model;

class TextareaField extends Field
{
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
            '<textarea name="%s" placeholder="%s" %s>%s</textarea>',
            $this->inputData,
            $this->value,
            $this->inputAttributes,
            $this->model->{$this->inputData}
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
