<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div style = 'padding-top: 70px;' class='container' id="inform">

        <div class='col-sm-4 col-sm-offset-4 padding-right'>

            <?php if (isset($errors) && is_array($errors)): ?> <!-- здесь выводятся ошибки, если есть -->
                <div class="panel panel-danger">
                    <div class="panel-heading">Что-то заполнено неверно:</div>
                    <div class="panel-body" id="errors">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> <?php echo $error; ?> </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <div class="panel panel-default"> <!-- форма для регистрации -->
                <div class="panel-heading">Вход на сайт</div>
                <div class="panel-body">
                    <form role="form" id="logForm" action="javascript:void(null);" onsubmit="call()" method='post'>
                        <div class="form-group"> <!-- email -->
                            <label for="email">Email</label>
                            <input type='email' name='email' class="form-control" placeholder="Email" value='<?php echo $email; ?>' />
                            <p class="help-block">например, jbond@mail.com</p>
                        </div>
                        <div class="form-group"> <!-- пароль -->
                            <label for="password">Пароль</label>
                            <input type='password' class="form-control" name='password' placeholder="Пароль" value='' />
                        </div>
                        <input type='submit' name='submit' id='submit' class='btn btn-default' value='Войти' />
                    </form> <!-- конец формы -->

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</section>

    <script type="text/javascript" language="javascript"> 
     	function call() { <!-- отправляем форму асинхронно -->
     	  var msg   = $('#logForm').serialize();
            $.ajax({
              type: 'POST',
              url: '/login',
              data: msg,
              success: function(data) {
                  $('#inform').html(data);
              },
              error:  function(xhr, str){
    	    alert('Возникла ошибка: ' + xhr.responseCode);
              }
            });
        }
    </script>
    <!-- редирект на личную страницу пользователя -->
    <script type="text/javascript" language="javascript">  
        var user = <?php echo $_SESSION['user'] ?>; 
        window.location.href = "/user/"+user;
    </script>
