<?php

if($_POST!=NULL){
	//$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
  	$db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
            $db -> exec("SET NAMES UTF8");
            $id=trim($_POST['id']);
            $first_name=trim($_POST['first_name']);
            $second_name=trim($_POST['second_name']);
            $query = $db -> prepare("UPDATE people SET first_name='$first_name', second_name='$second_name' WHERE id=$id;");
            $query -> execute();
        $query->closeCursor();

            print "<script type=\"text/javascript\">";  
            print "postToUrl('/job/', {'login':'admin','password':'admin'}, 'POST');";
            print "</script>";  
    }
elseif($_GET['id']!=NULL){
	//$db = new PDO ( 'mysql:host = tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
  	$db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
            $db -> exec("SET NAMES UTF8");
            $id=trim($_GET['id']);
            $query = $db -> prepare("SELECT * FROM people WHERE id='$id';");
            $query -> execute();
            $peoples = $query -> fetchALL(PDO::FETCH_ASSOC);
            foreach($peoples as $people){
                echo '<form method="POST">';
                echo '<input type="hidden" name="id" value="'.$id.'">';
                echo '<table><tr>';
                echo '<td>Прізвище:<br><input type="text" placeholder="Прізвище" name="first_name" value="'.$people['first_name'].'"></td>';
                echo '<td>Ім\'я:<br><input type="text" placeholder="Прізвище" name="second_name" value="'.$people['second_name'].'"></td>';
                echo '</tr>';
                echo '</table>';
                echo '<input type="submit" id="button_edit" value="Змінити">';  
                echo '</form>';              
            }
        $query->closeCursor();
    }
?>
