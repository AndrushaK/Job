<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Job</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script type="text/javascript" src="jquery-3.1.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="script.js" charset="utf-8"></script>
	
</head>

<body>
<div id="main">
<?php
  require_once('layout/header.php');?>
<div id="menu">
 <?php
 $hidden='style = "visibility: hidden;';
 $_SESSION["user_name"]=NULL;
  require_once('layout/menu.php');
  require_once('layout/login.php');
?>
</div>
<div id="main2">
<div id="left">
    <?php
    if ($_SESSION["user_name"]=='admin')
     require_once('layout/left_menu.php');
    ?>
</div>

 <?php
  require_once('layout/main.php');
  require_once('layout/futer.php');
?>            
</div>     
</div>
</body>
</html>											