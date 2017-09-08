<?php 
session_start();

// echo "post : ";var_dump($_POST); echo "<br> session : ";var_dump($_SESSION);
    $_SESSION['location']=$_POST['location'];
$_SESSION['title']=$_POST['title'];
$_SESSION['datepicker']=$_POST['datepicker'];
$_SESSION['time']=$_POST['time'];
$_SESSION['duree']=$_POST['duree'];
$_SESSION['tag1']=$_POST['tag1'];
$_SESSION['tag2']=$_POST['tag2'];
$_SESSION['tag3']=$_POST['tag3'];
$_SESSION['minimum']=$_POST['minimum']; 
$_SESSION['maximum']=$_POST['maximum'];
$_SESSION['locationDeparture']=$_POST['locationDeparture'];

$idtour = $_POST['mytour'];
$idtrip = $_POST['mytrip'];

header('Location: editertoursuite2.php?mytrip='.$idtrip.'&mytour='.$idtour);//

 ?>

   