<?php

Class Flood {

    public static function checkFlood() {
        $ip = $_SERVER['REMOTE_ADDR']; //получаем ip
        $db = Db::getConnection(); //ищем в бд записи с таким ip и регистрацией менее часа назад
        $sql = 'SELECT reg_date FROM users WHERE INET_NTOA(ip) = :ip AND reg_date >= DATE_SUB(NOW(),INTERVAL 1 HOUR)';
        $result = $db->prepare($sql);
        $result->bindParam(':ip', $ip, PDO::PARAM_INT);
        $result->execute();
        $regDate = $result->fetch();
        if ($regDate == NULL) {  //если записей нет возвращает false
            return false;
        }
        return true;
    }

}
