<?

require 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome-min.css">
    <link rel="stylesheet" href="/media/css/signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Регистрация</title>
</head>
<body>
    <div class="container centered">
         <div class="row">
             <div class="col-lg-6 col-lg-offset-3">
                <h1>Регистрация</h1>
                <br>
                  <?php              
                        $data = $_POST;
                        if( isset($data['do_signup']))
                        {
                            //здесь регистрируем
                            $errors = array();
                            if( trim($data['login']) == '')
                            {
                                $errors[] = '<h3>Введите логин</h3>';
                            }

                            if( trim($data['email']) == '')
                            {
                                $errors[] = '<h3>Введите почту</h3>';
                            }

                            if( $data['password'] == '')
                            {
                                $errors[] = '<h3>Введите пароль</h3>';
                            }

                            if( $data['password_2'] != $data['password'])
                            {
                                $errors[] = '<h3>Пароли не совпадают</h3>';
                            }

                            if( R::count('users',"login = ?", array($data['login'])) > 0 )
                            {
                                $errors[] = '<h3>Такой логин уже зарегестрирован!</h3>';
                            }

                            if (R::count ('users', "email = ?", array($data['email'])) > 0)
                            {
                                $errors[] = '<h3>Такая почта уже зарегестрирована!</h3>';
                            }

                            if( empty($errors) )
                            {
                                //Всё хорошо регистрируем
                                $user = R::dispense('users');
                                $user->login = $data['login'];
                                $user->email = $data['email'];
                                $user->password = $data['password'];
                                $user->adm = 0;
                                $user->teacher = 0;
                                R::store($user);

                                echo '<center><div style="color: green;"><h3>Вы зарегистрированы!</br>Возвращайтесь на <a href="/index.php">главную страничку</a>.</h3></div></center><hr>';
                            }
                            else
                            {
                                echo '<center><div style="color: red;" class="error">'.array_shift($errors).'</div></center><hr>';
                            }
                        }
                ?>
                
                <form action="/signup.php" method="POST">
                        <div class="form-group">
                            <label for="login"><h3>Логин:</h3></label>
                            <input type="text" name="login" class="form-control" value="<?php echo @$data['login']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><h3>Почта:</h3></label>
                            <input type="text" name="email" class="form-control" value="<?php echo @$data['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password"><h3>Пароль:</h3></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password"><h3>Подтверждение пароля:</h3></label>
                            <input type="password" name="password_2" class="form-control">
                        </div>
                        <button type="submit" name="do_signup" class="but-register" >Зарегестрироваться</button> <a href="index.php" class="but-register" >Назад</a>
                </form>
             </div>
         </div>
    </div>
</body>
</html>