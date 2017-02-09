<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class='container'>
        <div class='row'>
            <?php if (!$flood): ?>   <!-- ЕСЛИ последня регистрация была БОЛЕЕ ЧАСА назад, то -->
                <div class='col-sm-4 col-sm-offset-4 padding-right'>

                    <?php if (isset($result)): ?>  <!-- если все валидно, то -->
                        <p>Вы были зарегистрированы! Теперь можете <a href = "/login">войти на сайт!</a> </p>
                    <?php else: ?> <!-- иначе здесь выводятся ошибки -->
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?> </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <h4>Регистрация на сайте</h4> <!-- форма для регистрации -->
                        <form role="form" action='#' method='post'>

                            <div class="form-group"> <!-- Имя -->
                                <input type='text' name='first_name' class="form-control" placeholder="Имя" value='<?php echo $name; ?>' />
                            </div>

                            <div class="form-group"> <!-- Фамилия -->
                                <input type='text' name='second_name' class="form-control" placeholder="Фамилия" value='<?php echo $name; ?>' />
                            </div>

                            <div class="form-group"> <!-- email -->
                                <input type='email' name='email' class="form-control" placeholder="Email" value='<?php echo $email; ?>' />
                            </div>

                            <div class="form-group"> <!-- пароль -->
                                <input type='password' id='pw' class="form-control" name='password' placeholder="Пароль" value='<?php echo $password; ?>' />
                            </div>

                            <div class="form-group"> <!-- подвтерждение пароля -->
                                <input type='password' id='pwConf' class="form-control" name='password_confirm' placeholder="Подтвердите пароль" value='<?php echo $password; ?>' />
                            </div>

                            <div class="form-group"> <!-- город -->
                                <input type='text' name='city' class="form-control" placeholder="Город" value='<?php echo $city; ?>' />
                            </div>

                            <div class="form-group">   <!-- дата рождения -->
                                <p>Дата рождения</p>
                                <div class="col-xs-4">
                                    <select name ="day" class="form-control">
                                        <option>Дата</option>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select name ="month" class="form-control">
                                        <option>Месяц</option>
                                        <?php
                                        $i = 0;
                                        $months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
                                        foreach ($months as $month) {
                                            $i++;
                                            echo "<option value=$i>$month</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select name ="year" class="form-control">
                                        <option>Год</option>
                                        <?php
                                        $datetime = getdate();
                                        $a = $datetime['year'];
                                        for ($i = 16; $i <= 100; $i++) {
                                            $b = $a - $i;
                                            echo "<option>$b</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> <!-- конец дата рождения -->

                            <div class="form-group"> <!-- пол -->
                                <input type="radio" name="sex" value="1" checked> мужской <br>
                                <input type="radio" name="sex" value="0" checked> женский <br>
                            </div>

                            <input type="checkbox" name="Agreement" id="checkAgr"> Я принимаю условия <a href="/agreement" target="_blank">пользовательского соглашения</a>... <br> <!-- соглашение -->

                            <input type='submit' name='submit' id='submit' class='btn btn-default disabled' value='Регистрация' /> <!-- отправить форму -->
                        </form> <!-- конец формы -->


                    <?php endif; ?> 
                    <br/>
                    <br/>
                </div>

            <?php else: ?>  <!-- ЕСЛИ последня регистрация была МЕНЕЕ ЧАСА назад, то -->
                <h2>Вы зарегестрировались менее часа назад. Попробуйте позже. </h2>
                <p>Вернуться на <a href="/">главную страницу</a></p>
            <?php endif; ?>
        </div>
    </div>
</section>




<script> 
var c = document.querySelector('#checkAgr');
c.onclick = function() {
 if (c.checked) { <!-- если чек есть -->
  $("#submit").removeClass("disabled"); <!-- кнопка становится активной -->
 } else {
  $("#submit").addClass("disabled"); // и наоборот 
 }
}
</script>


<?php include ROOT. '/views/layouts/footer.php'; ?>

