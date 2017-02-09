<?php

function __autoload($class_name) //автоматически подключаем модели и компоненты
{
    $array_paths = array(
        '/models/',
        '/components/',
    );
    
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}

