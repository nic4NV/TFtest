<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div style = 'padding-top: 70px;' class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>
            Добро пожаловать на тестовый проект, выполненный человеком с id 1915550!
        </h3>
        <h5>
            Здесь Вы можете сделать две вещи:
            <h5>
                <ul> 
                     <?php if (!isset($_SESSION['user'])): ?>
                    <li><a href = "/login"> Войти </a></li>
                    <?php else: ?>
                    <li><a href = "/user/<?php echo $_SESSION['user']; ?>"> Вернуться в свой профиль </a></li>
                    <?php endif; ?>
                    <li><a href = "/registration">Зарегистрироваться </a></li>
                </ul> 
            </h5>
        </h5>
    </div>
</div>

    

