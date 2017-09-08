<?php 

// $_SESSION['login_user']= "coucou";
// unset($_POST['submit']);
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';
//$_POST['submit']=null;
//var_export($_POST);

//if(isset($_POST['submit'])){
if (empty($_POST['email'])) {
$_SESSION['login_user_erreur']= "Form registration invalid";
header("location: ../signinregister/");
//echo $_SESSION['login_user_erreur'];

}else{

    //echo "ligne22 ";


// $nom=$_POST['first_name'];
// $prenom=$_POST['last_name'];
$emailFORM=$_POST['email'];
$emailBD="";
// $password=$_POST['password'];
// $phonenumber=$_POST['phone'];




try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

//Mettre ses valeur récupérés à la $ligne de video_

$req = $bdd->prepare('SELECT password, mail FROM user WHERE mail = ?');
$req->execute(array($emailFORM));
while ($donnees = $req->fetch())
{
    $passwordBD=$donnees['password'];
    $mailBD=$donnees['mail'];
    
    
}
//$req->closeCursor(); 
if ( !$req->rowCount() > 0 ) {
  // do something here
    //$valid = false;
}else{

require '../signinregister/PHPMailer/PHPMailerAutoload.php';
require_once('../signinregister/PHPMailer/class.phpmailer.php');
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password
//$mailhex=$mail;
//echo "ligne62 ";
// $mailhex='';
//     for ($i=0; $i < strlen($mail); $i++)
//     {
//         $mailhex .= dechex(ord($mail[$i]));
//     }
$mymessage="Mot de passe: ".$passwordBD;
//$mymessage="<a href=\"http://aventour.io/\">Clique ici pour activer ton compte</a>";
//$mymessage=file_get_contents('mail.html'); 
smtpmailer($mailBD, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Mot de passe aventour', $mymessage);
//smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Nouvelle inscription : '.$mail, 'Nom: '.$nom." prénom: ".$prenom." mail: ".$mail." password: ".$password." phone: ".$phonenumber);

}

}





  echo"\r\n   \r\n";
  var_export($_POST);
//}
  //unset($_POST['submit']);
//$_POST['submit']=null;
//header("location: ../myindexdev.php");
//die("<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" /><h1 style=\"padding-top: 10%;text-align: center;\">Un mail de confirmation a été envoyé sur ta boite mail</h1>");


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