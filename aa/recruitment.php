<?php
// $_FILES['icone']['name']     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
// $_FILES['icone']['type']     //Le type du fichier. Par exemple, cela peut être « image/png ».
// $_FILES['icone']['size']     //La taille du fichier en octets.
// $_FILES['icone']['tmp_name'] //L'adresse vers le fichier uploadé dans le répertoire temporaire.
// $_FILES['icone']['error']    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
// var_dump($_POST);echo '<br>';
 //var_dump($_FILES);
if(empty($_POST['memail'])||empty($_POST['nom'])||empty($_POST['prenom'])||empty($_FILES['mon_fichier'])){
	die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Upload: Echec <br> Fichier (PDF | max. 1 Mo)<br> <br> <a href="becomeanaventourer.php">Réessayer</a></h1><br><br><h3>Si tu rencontres des problèmes envoi directement ton CV sur nicolas@aventour.net</h3></div></html');


}
$mail=$_POST['memail'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
//$mail=$_POST['memail'];
$description=$_POST['description'];



$path=$_SERVER['DOCUMENT_ROOT'].'/userstemp/cv/'.$mail;
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
}



function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement

//@move_uploaded_file($_FILES['profpic']['tmp_name'], $target_path) 
     //return move_uploaded_file($_FILES[$index]['tmp_name'],$destination.'/cv.jpg'); 
      file_put_contents($destination.'/cv.'.$ext, file_get_contents($_FILES[$index]['tmp_name']));
      return true;
}
 
//EXEMPLES
   
  $upload1 = upload('mon_fichier',$path,1048576, array('pdf'));
  //$upload2 = upload('mon_fichier','uploads/file112',1048576, FALSE );
 
  if (!$upload1){ 

  	die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Upload: Echec <br> Fichier (PDF | max. 1 Mo)<br> <br> <a href="becomeanaventourer.php">Réessayer</a></h1><br><br><h3>Si tu rencontres des problèmes envoi directement ton CV sur nicolas@aventour.net</h3></div></html');
};
  //if ($upload2) "Upload du fichier réussi!<br />";

require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password




smtpmailer('vnicolas060@gmail.com', 'nicolas@aventour.net', 'AVENTOUR.NET', 'Candidature: '.$mail. ' '.$prenom.' '.$nom, '<br> Prenom: '.$prenom.'<br>Nom: '.$nom.'<br>Mail: '.$mail.'<br><br>Qui es tu: <br>'.$description);

die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h3 style="text-align:center"><br><br>Parfait, nous viendrons vers toi au plus vite :) <br><a href="index.php">Home</a></h3></div></html');


 function smtpmailer($to, $from, $from_name, $subject, $body) {  
  global $error;
  $mail1 = new PHPMailer();  // create a new object
  $mail1->CharSet = 'UTF-8';
  $mail1->IsSMTP(); // enable SMTP
  $mail1->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail1->SMTPAuth = true;  // authentication enabled
  $mail1->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail1->Host = 'smtp.gmail.com';
  $mail1->Port = 465; 
  $mail1->Username = GUSER;  
  $mail1->Password = GPWD;           
  $mail1->SetFrom($from, $from_name);
  $mail1->Subject = $subject;
  $mail1->Body = $body;
  $mail1->MsgHTML($body);
  $mail1->AddAddress($to); 
  $mail1->AddAttachment('userstemp/cv/'.$_POST['memail'].'/cv.pdf');

  //$mail1->AddAttachment('users/cv/'.$mail.'/cv.jpg');file_get_contents($_FILES[$index]['tmp_name'])
  if(!$mail1->Send()) {
    $error = 'Mail error: '.$mail1->ErrorInfo; 
    return false;
  } else {
    $error = 'Message sent!';

    if(!empty($_POST['memail'])){

    unlink ('userstemp/cv/'.$_POST['memail'].'/cv.pdf');
    
    unlink ('userstemp/cv/'.$_POST['memail']);  
}
    return true;
  }
  //echo "ligne97 ";
}

