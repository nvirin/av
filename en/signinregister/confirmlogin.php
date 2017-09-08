<?php 
session_start();
//verifier si n'est pas vide (pas encore fait)
// echo $_POST['email'];
// echo $_POST['password'];

// echo $_SESSION['login_user'];

// if (isset($_POST['login-submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$_SESSION['login_user_erreur']= "Username or Password is invalid";
header("location: ../signinregister/index.php");
// echo $_SESSION['login_user_erreur'];

}
// }
else{



$emailFORM=$_POST['email'];
$passwordFORM=$_POST['password'];

$nomBD="";
$prenomBD="";
$emailBD="";
$emailhexaBD="";
$passwordBD="";


try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT mail, mailhexa, password FROM user WHERE mail = ?');
$req->execute(array($emailFORM));

// $req1 = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
// $req1->execute(array($emailFORM));



while ($donnees = $req->fetch())
{
	$emailBD=$donnees['mail'];
	$passwordBD=$donnees['password'];
// 	$nomBD=$donnees['nom'];
// $prenomBD=$donnees['prenom'];
$emailhexaBD=$donnees['mailhexa'];
	
}
$req->closeCursor(); 


if(($emailBD === $emailFORM)&&($passwordBD===$passwordFORM)){
 

//if (($passwordBD===$passwordFORM)) {
	// echo "ca marche!";
	// $_SESSION['login_user_nom']= $nomBD;
	// $_SESSION['login_user_prenom']= $prenomBD;
	$_SESSION['myid']=$emailhexaBD;
	header("location: http://aventour.net");

	// echo $_SESSION['login_user_nom'];
	// echo $_SESSION['login_user_prenom'];
//}




} else{

	$_SESSION['login_user_erreur']= "Username or Password is invalid";



	header("location: ../signinregister/index.php");
}
}




 ?>