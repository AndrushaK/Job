<?php
		header('Content-type: text/html; charset=utf-8');
  	//$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
  	$db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
		$db -> exec("SET NAMES UTF8");
 			$id = trim($_POST['id_phone']);
     		$query = $db -> prepare("DELETE FROM phone WHERE id=$id;");
     		$query->execute();
     		$query->closeCursor();
?>