<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class='container'>
        <div class='row'>

            <div class='col-sm-4 col-sm-offset-4 padding-right'>


                <?php if (isset($errors) && is_array($errors)): ?> <!-- здесь выводятся ошибки, если есть -->
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?> </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <h4>Вход</h4> <!-- форма для входа на сайт -->
                <form role="form" action='#' method='post'>
                    <div class="form-group"> <!-- email -->
                        <input type='email' name='email' class="form-control" placeholder="Email" value='<?php echo $email; ?>' />
                    </div>
                    <div class="form-group"> <!-- пароль -->
                        <input type='password' class="form-control" name='password' placeholder="Пароль" value='<?php echo $password; ?>' />
                    </div>
                    <input type='submit' name='submit' class='btn btn-default' value='Войти' />
                </form> <!-- конец формы -->
                
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT. '/views/layouts/footer.php'; ?>

