<?php

function my_autoloader($class_name) {
    $array_path = [
        '/models/',
        '/components/'
    ];

    foreach ($array_path as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once  $path;
        }
    }
}

spl_autoload_register('my_autoloader');