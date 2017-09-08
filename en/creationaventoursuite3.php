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




if(isset($_POST['pasdegroupe'])){
$_SESSION['pasdegroupe']=$_POST['pasdegroupe'];
header('Location: creationaventoursuite2_3.php'); 
}elseif(isset($_POST['pasdeperssup'])){
	$_SESSION['pasdeperssup']=$_POST['pasdeperssup']; 
	header('Location: creationaventoursuite2_2.php'); 


}else{

header('Location: creationaventoursuite2.php'); 

}



//var_dump($_POST['datepicker']);



 ?>

   