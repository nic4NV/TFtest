<?php
//в задании было сказано реализовать отдельный класс, так я и сделал. Но, пожалуй,
//это в моем случае органичнее бы смотрелось в качестве метода модели User

Class FloodControl {

    public static function checkFlood($timeOut) {
        $ip = $_SERVER['REMOTE_ADDR']; //получаем ip
        $db = Db::getConnection(); //ищем в бд записи с таким ip и регистрацией менее часа назад
        $sql = "SELECT reg_date FROM users WHERE INET_NTOA(ip) = :ip AND reg_date >= DATE_SUB(NOW(),INTERVAL $timeOut)";
        $result = $db->prepare($sql);
        $result->bindParam(':ip', $ip, PDO::PARAM_INT);
        $result->execute();
        $regDate = $result->fetch();
        if ($regDate == NULL) {  //если записей нет возвращает false, флуда нет
            return false;
        }
        return true;
    }

}
