<?php 

session_start();
if(!((isset($_SESSION['myid'])&&file_exists('../users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');

      die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour réserver un tour =P <br><a href="http://www.aventour.net/en/signinregister/index.php">Se connecter</a></h1></div></html');


}elseif(!((isset($_GET['mytrip'])&&file_exists('../users/'.$_GET['mytrip'])))){
 header('Location: http://www.aventour.net/en/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!isset($_GET['mytour'])){
    header('Location: http://www.aventour.net/en/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>2 d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}else{

	try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
//$tour = $bdd->quote($_GET['mytour']);
$tour = $_GET['mytour'];
$req->execute(array($tour));




if (!( $req->rowCount() == 1 )) {
  // do something here
	// var_dump($tour);
	// die();
    header('Location: http://www.aventour.net/en/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{

	//$sql = 'DELETE FROM voyage WHERE idtour = ?';
	$req1 = $bdd->prepare('DELETE FROM voyage WHERE idtour= ?');
	$req1->execute(array($tour));
	$donnees = $req->fetch(PDO::FETCH_ASSOC);



	require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password

$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }


$mymessagepourleguide='<p style="text-align:center";>Confirmation annulation de ton tour <br><br> Lieux: '.$donnees['lieu_voyage'].'<br> Titre: '.$donnees['title'].'<br> Date: '.$donnees['date_voyage'].'<br> Heure : '.$donnees['heure_voyage'].'<br> Durée : '.$donnees['duree_voyage'].'h<br> Tag 1 : '.$donnees['tag1'].'<br> Tag 2 : '.$donnees['tag2'].'<br> Tag 3 : '.$donnees['tag3'].'<br> Prix : '.$donnees['prix'].'groupe de '.$donnees['min_personne'].' à '.$donnees['max_personne'].' + '.$donnees['prixsupp'].' €/personne supplémentaire <br> Description du tour: '.$donnees['detail_voyage'].'<br><br>L\'équipe Aventour.net<br><a href="http://www.aventour.net" title="">aventour.net</a></p>';
smtpmailer( $mailstring, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour annulé sur aventour.net: '.$donnees['title'], $mymessagepourleguide); 
smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour annulé: '.$donnees['title'], $mymessagepourleguide); 



	header('Location: http://www.aventour.net/en/mestours/');
}

	}

	//header('Location: http://www.aventour.net/');

	function smtpmailer($to, $from, $from_name, $subject, $body) {  
  global $error;
  $mail = new PHPMailer();  // create a new object
  $mail->CharSet = 'UTF-8';
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true;  // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465; 
  $mail->Username = GUSER;  
  $mail->Password = GPWD;           
  $mail->SetFrom($from, $from_name);
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->MsgHTML($body);
  $mail->AddAddress($to);
  if(!$mail->Send()) {
    $error = 'Mail error: '.$mail->ErrorInfo; 
    return false;
  } else {
    $error = 'Message sent!';
    return true;
  }
  //echo "ligne97 ";
}


 ?>