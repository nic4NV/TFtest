<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="row"> <!-- приветствие -->
    <div class="col-md-8 col-md-offset-2">
        <h4 class="text-center">Здравствуй, <?php echo $userItem['first_name']; ?>! </h4>
    </div>
</div> <!-- конец приветствия -->

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <p>Это профиль пользователя на сайте. Пока что отсюда только один путь: <a href="/user/logout">Выйти</a> </p>
    </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>