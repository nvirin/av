<?php 
session_start();
if(!((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');

      die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');


}elseif(!((isset($_GET['mytrip'])&&file_exists('users/'.$_GET['mytrip'])))){
 header('Location: myindexdev.php');
	//die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!isset($_GET['mytour'])){
	header('Location: myindexdev.php');
	//die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>2 d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}else{


	try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($_GET['mytour']));



if (!( $req->rowCount() == 1 )) {
  // do something here
	header('Location: myindexdev.php');
	//die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{


	while ($donnees = $req->fetch())
{
	$idtour=$donnees['idtour'];
	if(!($idtour===$_GET['mytour'])){
		  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, ce tour n\'existe pas =/ <br><a href="index.php">Page d\'acceuil</a></h1></div></html');



	}else{

		//tout c'est bien passé!!!!!! good!!
		echo "good!";

		$passwordBD=$donnees['password'];
	$nomBD=$donnees['nom'];
$prenomBD=$donnees['prenom'];


	}

	
	
}



}
  










}


 ?>




 