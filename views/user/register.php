<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div style = 'padding-top: 70px;' class='container'>
        <div class='row'>
            <?php if (!$flood): ?>   <!-- ЕСЛИ последня регистрация была БОЛЕЕ ЧАСА назад, то -->
                <div class='col-sm-4 col-sm-offset-4 padding-right'>

                    <?php if (isset($result)): ?>  <!-- если все валидно, то -->
                        <p>Вы были зарегистрированы! Теперь можете <a href = "/login">войти на сайт!</a> </p>
                    <?php else: ?> <!-- иначе здесь выводятся ошибки -->
                        <?php if (isset($errors) && is_array($errors)): ?>

                            <div class="panel panel-danger">
                                <div class="panel-heading">Некоторые поля заполнены неверно:</div>
                                <div class="panel-body">
                                    <ul> 
                                        <?php foreach ($errors as $error): ?>
                                            <li> <?php echo $error; ?> </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="panel panel-default"> <!-- форма для регистрации -->
                            <div class="panel-heading">Регистрация на сайте</div>
                            <div class="panel-body">

                                <form role="form" id='regForm' action='#' method='post'>

                                    <div class="form-group"> <!-- Имя -->
                                        <label for="first_name">Ваше имя</label>
                                        <input type='text' name='first_name' class="form-control" placeholder="Имя" value='<?php echo $firstName; ?>' />
                                    </div>

                                    <div class="form-group"> <!-- Фамилия -->
                                        <label for="second_name">Ваша фамилия</label>
                                        <input type='text' name='second_name' class="form-control" placeholder="Фамилия" value='<?php echo $secondName; ?>' />
                                    </div>

                                    <div class="form-group"> <!-- email -->
                                        <label for="email">Email</label>
                                        <input type='email' name='email' class="form-control" placeholder="Email" value='<?php echo $email; ?>' />
                                        <p class="help-block">например, jbond@mail.com</p>
                                    </div>

                                    <div class="form-group"> <!-- пароль -->
                                        <label for="password">Пароль</label>
                                        <input type='password' id='pw' class="form-control" name='password' placeholder="Пароль" value='' />
                                    </div>

                                    <div class="form-group"> <!-- подвтерждение пароля -->
                                        <label for="password_confirm">Подтвердите пароль</label>
                                        <input type='password' id='pwConf' class="form-control" name='password_confirm' placeholder="Подтвердите пароль" value='' />
                                    </div>

                                    <div class="form-group"> <!-- город -->
                                        <label for="city">Город</label>
                                        <input type='text' name='city' class="form-control" placeholder="Город" value='<?php echo $city; ?>' />
                                        <p class="help-block">например, Санкт-Петербург</p>
                                    </div>
                                    <label for="birth_date">Дата Вашего рождения</label>
                                    <div class="form-group">   <!-- дата рождения -->
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
                                                <option>Мес</option>
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
                                    <label for="sex"><br>Пол</label>
                                    <div class="form-group" > <!-- пол -->
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="1" checked> мужской <br>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="0" checked> женский <br>
                                        </label>
                                    </div>

                                    <input type="checkbox" name="Agreement" id="checkAgr"> Я принимаю условия <a href="/agreement" target="_blank">пользовательского соглашения</a>...<br> <br> <!-- соглашение -->

                                    <input type='submit' name='submit' id='submit' class='btn btn-default disabled' value='Регистрация' /> <!-- отправить форму -->
                                </form> <!-- конец формы -->
                            </div>

                        <?php endif; ?> 
                        <br/>
                        <br/>
                    </div>

                <?php else: ?>  <!-- ЕСЛИ последня регистрация была МЕНЕЕ ЧАСА назад, то -->
                    <h2>Вы зарегистрировались менее часа назад. Попробуйте позже. </h2>
                    <p>Вернуться на <a href="/">главную страницу</a></p>
                <?php endif; ?>
            </div>
        </div>
</section>



<script>
    var c = document.querySelector('#checkAgr');
    c.onclick = function () {
        if (c.checked) {<!-- если чек есть -->
            $("#submit").removeClass("disabled");<!-- кнопка становится активной -->
        } else {
            $("#submit").addClass("disabled"); // и наоборот 
        }
    }
</script>




        
