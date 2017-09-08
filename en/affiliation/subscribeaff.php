<?php
	require_once 'inc/MCAPI.class.php';
	require 'signinregister/PHPMailer/PHPMailerAutoload.php';
require_once('signinregister/PHPMailer/class.phpmailer.php');
	 $api = new MCAPI('dbdbd86e3868fca40973810da6dde76c-us12');
	 $merge_vars = array('FNAME'=>$_POST["fname"], 'LNAME'=>$_POST["lname"]);
	 $email=$_POST["email"];

	// // Submit subscriber data to MailChimp
	// // For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
	 $retval = $api->listSubscribe( 'b2d78cf2eb', $_POST["email"], $merge_vars, 'html', false, true );

	// if ($api->errorCode){
	// 	//var_dump($api->errorCode);
	// 	echo "<h4>Please try again.</h4>".$_POST["email"];
	// } else {
	 	//echo "<h4 style=\"text-align: center;\">Inscription newsletter: ".$_POST["email"]."</h4> <br> <h4  style=\"text-align: center;\">Bienvenue parmi nous! ;)</h4>";

require 'mailin/V2.0/Mailin.php'; 

$mailin = new Mailin("https://api.sendinblue.com/v2.0","7EOFHaXfdmpqJRBD");
    $data = array( "email" => $_POST["email"],"listid" => array(5));
    $mailin->create_update_user($data);
 
    // //var_dump($mailin->create_update_user($data));
    // var_dump($mailin->create_update_user($data)); 
    // die;	

define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'Couvou123?KmtilmB_2'); // GMail password
//$mailhex=$mail;
$mymessage2='<p>Salut !<br><br>


Tu trouveras en pièce jointe nos bons plans<br><br>

Nous travaillons actuellement sur l\'amélioration du site<br>
et la création d\'application pour Android et Iphone<br><br>

Tu peux nous suivre sur :<br><br>

Facebook : <a href="https://www.facebook.com/goaventour">https://www.facebook.com/goaventour</a>
<br>N\'oublies pas de liker notre page =P
<br>Nous détestons les spams, ne t\'inquiètes donc pas sur ce point.<br><br>

A bientôt,<br><br>

L\'Equipe Aventour
<br><a href="http://www.aventour.net" title="">http://www.aventour.net</a></p>';


$mymessage="<p;>Bienvenue parmi nous!<br><br> 

Tu viens de t'inscrire à notre newsletter.<br> 
Comme tu le vois Aventour.net est sous sa version bêta, on va bientôt le lancé!<br>
En attendant, nous sommes fière de te compter parmi nous pour cette grande aventure ;)<br><br>

L\'equipe Aventour.net<br>
<a href=\"http://www.aventour.net\">aventour.net</a>
</p>"; 
//$email="vnicolas054@gmail.com";
//$mymessage="<a href=\"http://aventour.io/\">Clique ici pour activer ton compte</a>";
//$mymessage=file_get_contents('mail.html'); 
smtpmailer($email, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Guide aventour.net decembre 2016', $mymessage2);
smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Nouvelle inscription newsletter : '.$email.'<br><br><br><br> '.$mymessage2);




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
  //$mail->AddAttachment('cadeau/aventour.net decembre 2016 semaine 1.pdf'); 
  if(!$mail->Send()) {
    $error = 'Mail error: '.$mail->ErrorInfo; 
    return false;
  } else {
    $error = 'Message sent!';
    return true;
  }

}
header('location: confirmation.html');
die("<h4 style=\"text-align: center;\">Inscription newsletter: ".$_POST["email"]."</h4> <br> <h4  style=\"text-align: center;\">Bienvenue parmi nous! ;)</h4>");

// }






	





	








 
//}
  //unset($_POST['submit']);
//$_POST['submit']=null;
//header("location: ../myindexdev.php");
//die("<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" /><h1 style=\"padding-top: 10%;text-align: center;\">Un mail de confirmation a été envoyé sur ta boite mail</h1>");



?>
