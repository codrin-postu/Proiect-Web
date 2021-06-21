<?php

namespace core\form;

use core\Model;

class Form
{
    public static function begin($action, $method, $attributes = '')
    {
        echo sprintf('<form action="%s" method="%s" %s>', $action, $method, $attributes);
        return new Form;
    }

    public static function end()
    {
        echo '</form>';
    }
}
