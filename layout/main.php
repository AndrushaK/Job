<div id="right">
     
    <?php
             if ($_SESSION["user_name"]!='admin') echo "<!--"?>
    <table id="table_phone" >
        <?php
            if ($_SESSION["user_name"]=='admin'){
            //$db = new PDO ( 'mysql:host =tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
            $db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
            $db -> exec("SET NAMES UTF8");
            $query = $db -> prepare("SELECT * FROM people");
            $query -> execute();
            $peoples = $query -> fetchALL(PDO::FETCH_ASSOC);
            foreach($peoples as $people){
                echo '<tr>';
                echo '<td>'.$people['first_name'].'</td>';
                echo '<td>'.$people['second_name'].'</td>';
                echo '<td>';
                $params = "SELECT * FROM phone WHERE id_people=".$people['id'];
                $query = $db -> prepare($params);
                $query -> execute();
                $phones = $query-> fetchALL(PDO::FETCH_ASSOC);
                foreach($phones as $phone){
                    echo $phone['phone'];
                    echo '<input type="image" src="images/delete_phone.png" id="'.$phone["id"].'" class="delete_phone" alt="Видалити номер">'; 
                    echo '<br>';
                }
                echo '<input type="image" src="images/add.png" id="'.$people["id"].'" alt="Додати номер телефону">';
                echo '<input type="text" placeholder="Номер телефону" name="'.$people["id"].'" class="add_phone">';
                echo '</td>';
                echo '<td> <a href="/job/edit.php?id='.$people["id"].'"><img src="images/edit.png" name="'.$people["id"].'" alt="редагувати"></a>';
                echo '<input type="image" src="images/delete.png" name="'.$people["id"].'" class="delete_people" alt="видалити">';
                echo '</td></tr>';
                
            }
        $query->closeCursor();
        }
    ?>
    </table>   

    <?php
             if ($_SESSION["user_name"]!='admin') echo "-->"?>         
    <?php
             if ($_SESSION["user_name"]=='admin') echo "<!--"?>
    <table id="table_phone1">
        <?php
        if ($_SESSION["user_name"]!='admin'){
            //$db = new PDO ( 'mysql:host =tcp:mysql.hostinger.ru; dbname=u299013823_job', 'u299013823_andru', 'K.,k._yfcn.ire');
            $db = new PDO ( 'mysql:host = localhost; port=3303; dbname=mydbTest', 'root', '');
            $db -> exec("SET NAMES UTF8");
            $query = $db -> prepare("SELECT * FROM people");
            $query -> execute();
            $peoples = $query -> fetchALL(PDO::FETCH_ASSOC);
            foreach($peoples as $people){
                echo '<tr>';
                echo '<td>'.$people['first_name'].'</td>';
                echo '<td>'.$people['second_name'].'</td>';
                echo '<td>';
                $params = "SELECT * FROM phone WHERE id_people=".$people['id'];
                $query = $db -> prepare($params);
                $query -> execute();
                $phones = $query-> fetchALL(PDO::FETCH_ASSOC);
                foreach($phones as $phone){
                    echo $phone['phone'].'<br>';
                }
                echo '</td></tr>';
                
            }
        $query->closeCursor();
    }
    ?>
     </table>   
    <?php
             if ($_SESSION["user_name"]=='admin') echo "-->"?>

</div>