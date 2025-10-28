<?php

namespace NsAppBlog;

class Utility
{

    //using print_r($class_name, true) to return the array as a string

    public static function fVarDump($var, $parameter = '')
    {
        if ($parameter === 'a') {
            foreach ($var as $v) {
                echo '<pre>';
                var_dump($v);
                echo '</pre>';
            }
        } else {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    }
}
