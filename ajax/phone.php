<?php
		header('Content-type: text/html; charset=utf-8');
  	//$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
  	$db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
		$db -> exec("SET NAMES UTF8");
 			$id_people = trim($_POST['id_people']);
 			$phone = trim($_POST['phone']);
     		$query = $db -> prepare("INSERT INTO phone (phone, id_people) VALUE(:phone, :id_people)");
     		$params = ['phone' => $phone, 'id_people' => $id_people];
     		$query->execute($params);
     		echo 'Номер телефону додано!';
     		$query->closeCursor();
?>