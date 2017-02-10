<?php

class User {
    public static function register($firstName,$secondName, $email, $password, $city, $sex, $birthDate) {   //РЕГИСТРАЦИЯ
        $db=Db::getConnection();
        $hashPass = password_hash($password, PASSWORD_DEFAULT); // хэшируем пароль
        $ip = $_SERVER['REMOTE_ADDR']; //получаем ip
        $sql = 'INSERT INTO users (first_name, second_name, email, password, city, sex, ip, birth_date) '
                . 'VALUES (:firstName, :secondName, :email, :password, :city, :sex, INET_ATON(:ip), :birthDate)'; //ip -> integer
        
        $result = $db->prepare($sql);
        $result->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $result->bindParam(':secondName', $secondName, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hashPass, PDO::PARAM_STR);
        $result->bindParam(':city', $city, PDO::PARAM_STR);
        $result->bindParam(':sex', $sex, PDO::PARAM_STR);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR); 
        $result->bindParam(':birthDate', $birthDate, PDO::PARAM_STR); 
        
        return $result->execute();
    }
    
    public static function checkUserData($email, $password) // получаем id пользователя, с указанными email и паролем
    {
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM users WHERE email = :email';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();
        
        $user = $result->fetch(); //получаем массив с данными о пользователе
        if ($user AND password_verify($password, $user['password'])) { //если такой пользователь есть и пароль верный...
            return $user['id']; //...возвращает id пользователя
        }
        
        return false; //если не ок
    }
    
    public static function auth($userId)
    {
        
        $_SESSION['user'] = $userId;
    }
    
    public static function checkLogged()
    {
        //если в сессии есть запись, возвращает id пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
    }

    //ВАЛИДАЦИЯ!!!

    public static function checkName($name) {   //валидация имени и фамилии
        if (preg_match('#[A-ZА-ЯЁa-zа-яё\-]{2,20}$#u', $name))  { 
            return true;
        }
        return false; 
    }

    public static function checkPassword($password) {  //валидация пароля
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkPasswordConfirm($password, $passwordConf) {  //валидация пароля
        if ($password == $passwordConf) {
            return true;
        }
        return false;
    }
    
    public static function checkEmail($email) {   // валидация почты
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    public static function checkCity($city) {   //валидация названия города
        if (preg_match('#[A-ZА-ЯЁa-zа-яё\-]{2,30}$#u', $city))  { 
            return true;
        }
        return false; 
    }
    
    public static function checkDate($birthDate) {   //валидация даты рождения
        if (preg_match('#[0-9]{4}-([1-9]|1[012])-([1-9]|1[0-9]|2[0-9]|3[01])#', $birthDate))  { 
            return true;
        }
        return false; 
    }
    
    public static function checkEmailExists($email) {   // проверяет, есть ли уже пользователь с этим емейлом
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
    
    public static function getUserById($id)   //получаем массив с данными пользователя по id
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE id = :id';
            
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            
            return $result->fetch();
        }
    }
}

