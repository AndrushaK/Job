        
        <div align="right">
            <?php if ($_SESSION["user_name"]!=NULL && $corect) echo "Ви ввішли як ".$_SESSION['user_name']."<br><a href='/job/'>(вихід)</a>"?>
            </div>    
        <?php
        if($_POST!=NULL){
            $user_name = trim($_POST['login']);
            $user_name = htmlentities($user_name);
            $password = trim($_POST['password']);
            $password = htmlentities($password); 
            $corect=false;
            if($user_name=='admin' && $password=='admin'){
            $corect=true;
            $_SESSION["user_name"]=$user_name;
            }
            //$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
            $db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
            $db -> exec("SET NAMES UTF8");
            $query = $db -> prepare("SELECT * FROM user WHERE login='".$user_name."' AND password='".$password."';");
            $query -> execute();
            $user = $query -> fetchALL(PDO::FETCH_ASSOC);
            if($user!=NULL) {               
            $corect=true;
            $_SESSION["user_name"]=$user_name;
            }
         if (!$corect) {
            print "<script type=\"text/javascript\">";  
            print ' swal({
                            title: "Повторіть ввід!",
                            text: "Пароль або логін не правильний",
                            type: "warning",
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Добре!",
                            });';
            print "</script>";  
            }}?> 
            <?php if ($_SESSION["user_name"]!=NULL && $corect) echo "Ви ввішли як ".$_SESSION['user_name']."<br><a href='/job/'>(вихід)</a>"?> 
            <div id="Log_in" <?php
             if ($_SESSION["user_name"]!=NULL && $corect) echo $hidden?>>
             <form action="index.php" method="post">
            <input type="text" placeholder="Логін" name="login" id="login">
            <input type="password" placeholder="Пароль" name="password" id="password" >
            <input type="submit" id="button_login" value="Вхід"><br>
            <input type="hidden" name="PHPSESSID" value="00196c1c1a02e4c37ac04f921f4a5eec" />
            </form>
            <div align="right"><a href="/job/registration.php">Реєстрація</a></div>
            </div>
