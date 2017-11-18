
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
    <link rel="stylesheet" href="/media/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Easy English</title>
</head>

<style>
    
    .hvr-float {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px transparent;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.hvr-float:hover, .hvr-float:focus, .hvr-float:active {
  -webkit-transform: translateY(-8px);
  transform: translateY(-8px);
}
    
    </style>

<body>
           <?php if(isset($_SESSION['logged_user']) ) :?>
           
            <center><h1>
                
            Логин ==> <?php echo $_SESSION['logged_user']->login; ?>!<br />
            <a href="/logout.php">EXIT</a>
                
            </h1></center>
           
           <?php else : ?>
            <div class="container-fluid" style="position:relative; min-height: 100%;">
               
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4" style="margin-top:50px; text-align: center;">
                        <h1 style="font-size:50px; color: white;  border-top: 5px solid white; border-bottom: 5px solid white; padding-bottom: 7px; width:300px; margin: auto;"><b>Easy english</b></h1>
                        <br>
                        <h2 style="font-size:30px; color: white;">Сайт, который научит вас всем тонкостям английского языка.</h2>
                    </div>
                </div>
                
                <div class="row" style="margin-top: 50px; margin-left:10px;">
                    <div class="col-lg-6 col-lg-offset-3">
                        <center>
                            <a class="but-log hvr-outline-in" href="login.php">Войти</a>
                            <a type="button" class="but-reg hvr-outline-in" href="signup.php">Регистрация</a>
                        </center>
                    </div>
                </div>
                
                
                <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                    <div class="col-lg-6 col-lg-offset-3" style="color:white;">
                        <center><h3>Содержимое сайта</h3></center>
                        <center><h3><span class="glyphicon glyphicon-arrow-down"></span></h3></center>
                    </div>
                </div>
                
                <div class="row centered" style="color:white; padding-bottom:271px;">
                    <div class="col-lg-2 col-lg-offset-2">
                    <img src="/media/img/library.png" alt="Материалы" class="hvr-float">
                    <h3>Материалы</h3>
                    </div>
                    <div class="col-lg-2">
                    <img src="/media/img/ebook.png" alt="Видео уроки" class="hvr-float">
                    <h3>Видео уроки</h3>
                    </div>
                    <div class="col-lg-2">
                    <img src="/media/img/test.png" alt="Тесты" class="hvr-float">
                    <h3>Тесты</h3>
                    </div>
                    <div class="col-lg-2">
                    <img src="/media/img/help.png" alt="Помощь" class="hvr-float">
                    <h3>Помощь</h3>
                    </div>
                   </div>
                

            
            <div class="footer centered" style="background-color:#66baaa; color: white;">
                <div class="container">
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-lg-2 col-lg-offset-3"><h4>FAQ</h4></div>
                        <div class="col-lg-2"><h4>Связь</h4></div>
                        <div class="col-lg-2"><h4>Поддержка</h4></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-lg-offset-5" style="color:#e3e3e3;">
                            <h5>Easy english © 2017</h5>
                        </div>
                    </div>
                </div>
            </div> 
    </div>
          <?php endif; ?>
                <!-- Первая модалка-->
<!--
              <div class="modal fade" id="mReg" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content centered">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h1 class="modal-title" style="color: #6cd3bf;">Регистрация</h1>
                    </div>
                    <div class="modal-body">
                                         
                         <form action="#" method="POST">
                          <div class="form-group">
                              <label for="login" style="color: #6cd3bf;"><h3>Логин:</h3></label>
                              <input type="login" name="login" class="form-control" id="login" value="<?php echo @$data['login']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="login" style="color: #6cd3bf;"><h3>Почта:</h3></label>
                              <input type="login" name="email" class="form-control" id="login" value="<?php echo @$data['email']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="login" style="color: #6cd3bf;"><h3>Пароль:</h3></label>
                              <input type="login" name="password" class="form-control" id="login">
                          </div>
                          <div class="form-group">
                              <label for="login" style="color: #6cd3bf;"><h3>Подтверждение пароля:</h3></label>
                              <input type="login" name="password_2" class="form-control" id="login">
                          </div>
                          <button type="submit" name="do_signup" class="but-register" style="background-color:none;">Зарегестрироваться</button>
                         </form>
                  </div>
                </div>
              </div>
            </div>
-->
        <!-- Первая модалка-->
          
        <!-- Вторая модалка-->
<!--
              <div class="modal fade" id="mLog" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content centered">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h1 class="modal-title" style="color: #6cd3bf;">Авторизация</h1>
                    </div>
                    <div class="modal-body">
                        
                      
                        
                         <form action="#" method="POST">
                          <div class="form-group">
                              <label for="login" style="color: #6cd3bf;"><h3>Логин:</h3></label>
                              <input type="login" name="login" class="form-control" id="login" value="<?php echo @$data['login']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="login" style="color: #6cd3bf;"><h3>Пароль:</h3></label>
                              <input type="login" name="password" class="form-control" id="login">
                          </div>
                          <a href="#" type="button" name="do_signup" class="but-register">Авторизоваться</a>
                         </form>
                  </div>
                </div>
              </div>
            </div>
-->
        <!-- Вторая модалка-->     
</body>
</html>