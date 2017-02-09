<?php

Class Db
{
    
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php'; //получаем массив с параметрами
        $params = include($paramsPath);
        
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}"; //подключаемся
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");
        
        return $db;
    }
                     
}

