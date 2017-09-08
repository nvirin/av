<?php 
session_start();
if(isset($_SESSION['myid'])){
	$_SESSION = array();

unset($_SESSION['myid']);
//unset($_SESSION['myid']);
}

if(!isset($_SESSION['myid'])){
	header("location: index.php");

}

//echo "coucou";
 ?>

