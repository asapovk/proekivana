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
    <title>Вход</title>
</head>
<body>
    <div class="container centered">
         <div class="row">
             <div class="col-lg-6 col-lg-offset-3">
                <h1>Регистрация</h1>
                <br>
                
                	<?
                        $data = $_POST;

                        if(isset($data['do_login']))
                        {
                            $errors = array();
                            $user = R::findOne('users', 'login = ?', array ($data['login']));
                            if ( $user )
                            {
                                $userpas = R::findOne('users', 'password = ?', array ($data['password']));
                                if( $userpas )
                                {


                                $_SESSION['logged_user'] = $user;
                                echo '<center><div style="color: green;"><h3>Вы авторизованы!</br>Возвращайтесь на <a href="/index.php">главную страничку</a>.</h3></div></center><hr>';
                            }

                                else{
                                    $errors[] = '<h3>Неправильный пароль!</h3>';
                                }

                            }else
                            {
                                $errors[] = '<h3>Такого пользователя не существует!</h3>';
                            }

                        if( ! empty($errors) )
                            {
                                echo '<div style="color: red;" class="error">'.array_shift($errors).'</div><hr>';
                            }

                        }


                    ?>
                
                <form action="/login.php" method="POST">
                        <div class="form-group">
                            <label for="login"><h3>Логин:</h3></label>
                            <input type="text" name="login" class="form-control" value="<?php echo @$data['login']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password"><h3>Пароль:</h3></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="do_login" class="but-register" >Войти</button> <a href="index.php" class="but-register" >Назад</a>
                </form>
             </div>
         </div>
    </div>
</body>
</html>