<?php

namespace core\form;

use core\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form;
    }

    public static function end()
    {
        echo '</form>';
    }

    public static function selectBegin($name)
    {
        echo sprintf('<select name="%s">', $name);
    }

    public static function selectEnd()
    {
        echo '</select>';
    }
}
