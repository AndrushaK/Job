<?php
  if(count($_POST)>0)
  {
    $corect=true;
    $login = trim($_POST['login']);
    $password1 =  trim($_POST['password1']);
    $password2 =  trim($_POST['password2']);
    $email =  trim($_POST['email']);

    $login = htmlentities($login);
    $password1 = htmlentities($password1);
    $password2 =  htmlentities($password2);
    $email =  htmlentities($email);

    ?>
    <form method="POST">
    <input type="text" placeholder="Логін" name="login" id="login" value="<?= $login
     ?>" >
      <?php 
        if($login == ''){
    $corect=true;
          echo '<label for="login">Логін не може бути порожнім</label>'; 
        }
        elseif(!preg_match("/^(\w|[\-|а-я|А-Я|І|Ї|і|ї|ы]){4,}$/",$login) ) {
    $corect=true;
          echo '<label for="login">більше 4 символів, може містити лише латинські та кириличні літери (великі та малі), цифри, нижнє підкреслення та дефіс </label>';
        }
      ?><br>
    <input type="password" placeholder="Пароль" name="password1" id="password1" value="<?= $password1
     ?>" >
      <?php 
        if($password1 == ''){
    $corect=true;
          echo '<label for="password1">Пароль не може бути порожнім.</label>';  
        }
        elseif(!preg_match("/^[a-z|A-Z|0-9|а-я|А-Я|І|Ї|і|ї|ы]{7,}$/",$password1) ) {
    $corect=true;
          echo '<label for="password1">більше 7 символів, може містити лише латинські та кириличні літери (великі та малі), цифри, нижнє підкреслення та дефіс </label>';
        }
      ?><br>
    <input type="password" placeholder="Повторіть пароль" name="password2" id="password2" value="<?= $password2
     ?>"  >
      <?php 
        if($password2 == ''){
    $corect=true;
          echo '<label for="password2">Повторіть будь ласка пароль.</label>';  
        }
        elseif($password1 != $password2) {
    $corect=true;
          echo '<label for="password2">Паролі не співпадають </label>';
        }
      ?><br>
    <input type="text" placeholder="Електронна пошта" name="email" id="email" value="<?= $email ?>"> 
      <?php 
        if($email == ''){
    $corect=true;
          echo '<label for="email">E-mail не може бути порожнім.</label>';  
        }
        elseif(!preg_match("/^\w+@[\w|\.]+$/",$email) ) {
    $corect=true;
          echo '<label for="email">може містити лише латинські та кириличні літери (великі та малі), цифри, нижнє підкреслення та дефіс </label>';
        }
      ?><br>
    <input type="submit" id="button_registration" value="Реєстрація">
    </form>
  <?php 
  if($corect){
    //$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
    $db = new PDO ( 'mysql:host = localhost;port=3303; dbname=mydbTest', 'root', '');
              $db -> exec("SET NAMES UTF8");                
                  $query = $db -> prepare("INSERT INTO user (login, password, email) VALUE(:login, :password, :email)");
                  $params = ['login' => $login, 'password' => $password1, 'email' => $email];
                  $query -> execute( $params );
                  $query->closeCursor();
  }
  }
  else  
  require_once('registration/form.php');
?>