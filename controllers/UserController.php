<?php

class UserController 


{
    
        public function actionRegister() //страница регистрации
    {
        $firstName = ''; //инициализируем переменные
        $secondName = '';
        $email = '';
        $password = '';
        $passwordConf = '';
        $city = '';
        $sex = '';
        $birthDate = '';
        
        $flood = FloodControl::checkFlood("1 HOUR"); // аргумент - время между попытками регистрации с одного ip. SQL
        
        if (isset($_POST['submit'])) {   //если форма отправлена
            $firstName = $_POST['first_name'];
            $secondName = $_POST['second_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConf = $_POST['password_confirm'];
            $city = $_POST['city'];
            $sex = $_POST['sex'];
            
            $birthDate  = "YYYY-MM-DD"; //собираем год, мес и день в дату рождения
            $original = array("YYYY", "MM", "DD");
            $replace = array($_POST['year'], $_POST['month'], $_POST['day']);
            $birthDate = str_replace($original, $replace, $birthDate);
            
            $errors = false;
            
            if (!User::checkName($firstName)) {   //заполняем массив $errors
                $errors[] = 'Имя должно иметь от двух до двадцати букв!';
            }
            if (!User::checkName($secondName)) {   
                $errors[] = 'Фамилия должна иметь от двух до двадцати букв!';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный Email!';
            }
            if (!User::checkPasswordConfirm($password, $passwordConf)) {
                $errors[] = 'Пароль не совпал!';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче шести символов!';
            }
            if (!User::checkDate($birthDate)) {   
                $errors[] = 'Пожалуйста, укажите Вашу дату рождения!';
            }
            if (!User::checkCity($city)) {   
                $errors[] = 'Название города должно иметь от двух до тридцати букв!';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Данный Email уже зарегестрирован';
            }
            if ($flood == true) {
                $errors[] = 'Вы совешили регистрацию совсем недавно, попробуйте позже'; //пользователь это вообще не увидит. Но пусть будет еще одна блокировка, на всякий случай
            }
            if ($errors == false) {   //и если нет ошибок
                $result = User::register($firstName,$secondName, $email, $password, $city, $sex, $birthDate);   //посылаем данные на сервер
            }
            
        }
        require_once(ROOT . '/views/user/register.php');
        return true;
        }
                
        
        public function actionLogin() //страница входа на сайт
    {
        $email = ''; //инициализируем переменные
        $password = '';
        
        if (isset($_POST['submit'])) { //если форма отправлена
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            //текст ошибок валидации
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный Email!';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен состоять хотя бы из шести символов!';
            }
            
            $userId = User::checkUserData($email, $password); //проверяем данные формы
            
            if ($userId == false) { //текст ошибки, если нет такого пользователя
                $errors[] = 'Неверно введен email или пароль!';
            } else {
                User::auth($userId);
                //иначе (если есть такой пользователь) попадаем на страницу пользователя
                header("Location: /user/$userId");
            }
        }
        
        require_once(ROOT . '/views/user/login.php');
        
        return true;
    }
    
    
    public function actionLogged($id) //страница пользователя
    {
        $userId = User::checkLogged();  // получаем id из сессии
        $userItem = User::getUserById($userId); //получаем массив с данными о пользователе
        
        require_once(ROOT . '/views/user/index.php');
        
        return true;
    }
    
    
    public function actionLogout() //выход со страницы пользователя, переход на стартовую
        {
            unset($_SESSION['user']); //стирает данные сессии
            header('Location: /');
        }
}

