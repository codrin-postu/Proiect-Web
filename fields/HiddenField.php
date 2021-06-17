<?php

namespace fields;

use core\form\Field;
use core\Model;

class HiddenField extends Field
{
    public function __construct(Model $model, $inputData = '', $value = '', $inputAttributes = '', $wrapperClass = '')
    {
        $this->value = $value;
        $this->fieldType = self::TYPE_HIDDEN;
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
            '',
            $this->value,
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
