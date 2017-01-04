<?php
          		header('Content-type: text/html; charset=utf-8');
            	//$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
            	$db = new PDO ( 'mysql:host = localhost;port=3303; dbname=mydbTest', 'root', '');
              $db -> exec("SET NAMES UTF8");
           			$first_name = trim($_POST['first_name']);
            		$second_name = trim($_POST['second_name']);
            		$phone = trim($_POST['phone']);
            		$first_name = htmlentities($first_name);
            		$second_name = htmlentities($second_name);
            		$phone = htmlentities($phone);
            		if($first_name == ''){
              		echo 'поле "Ім\'я" не може бути порожнім.';
              		exit;
            		}
            		elseif($second_name == ''){
              		echo 'Поле "Прізвище" не може бути порожнім.';
              		exit;
            		}
             		elseif(!is_numeric($phone)){
               		echo 'В полі "Номер Телефону" тільки цифри!';
              		exit;
              	}
             		elseif($phone<380000000000 || $phone> 380999999999){
                	echo 'Будь ласка введіть номер у форматі: +380XXXXXXXXX';
              		exit;
              	}
             		else{
               		$query = $db -> prepare("INSERT INTO people (first_name, second_name) VALUE(:first_name, :second_name)");
                	$params = ['first_name' => $first_name, 'second_name' => $second_name];
               		$query -> execute( $params );
               		$query =$db -> prepare("SELECT max(id) FROM people"); 
               		$query->execute();
               		$pid = $query -> fetchALL(PDO::FETCH_ASSOC);
               		$query = $db -> prepare("INSERT INTO phone (phone, id_people) VALUE(:phone, :id_people)");
               		$params = ['phone' => $phone, 'id_people' => $pid[0]['max(id)']];
               		$query->execute($params);
                  $query->closeCursor();
               		echo 'Дані збережені. Дякуємо, що довіряєте нам!';
               		}
?>