<?php
	require_once 'inc/MCAPI.class.php';
	require 'signinregister/PHPMailer/PHPMailerAutoload.php';
require_once('signinregister/PHPMailer/class.phpmailer.php');
	 $api = new MCAPI('dbdbd86e3868fca40973810da6dde76c-us12');
	 $merge_vars = array('FNAME'=>$_POST["fname"], 'LNAME'=>$_POST["lname"]);
	 $email=$_POST["email"];

	// // Submit subscriber data to MailChimp
	// // For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
	 $retval = $api->listSubscribe( 'd403335c23', $_POST["email"], $merge_vars, 'html', false, true );

	// if ($api->errorCode){
	// 	//var_dump($api->errorCode);
	// 	echo "<h4>Please try again.</h4>".$_POST["email"];
	// } else {
	 	//echo "<h4 style=\"text-align: center;\">Inscription newsletter: ".$_POST["email"]."</h4> <br> <h4  style=\"text-align: center;\">Bienvenue parmi nous! ;)</h4>";


	

define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password
//$mailhex=$mail;



$mymessage='<p;>Welcome among us!<br><br> 

You just sign up with our newletters.<br> 
We are proud to see in this adventure ;)<br>
If you have questions, suggetions or just want to chat with us<br>
You can do it sending mails on nicolas@aventour.net or just responding this one ;)<br><br>

We currently work on improvments of the website<br>
and the Android and Iphone applications.<br><br>

To finish, you can follow us on:<br><br>

Facebook : <a href="https://www.facebook.com/goaventour">https://www.facebook.com/goaventour</a><br>
Twitter : <a href="https://twitter.com/nicolasvirin">https://twitter.com/nicolasvirin</a><br><br>

Can I ask you what are you waiting for aventour.net et what improvments you thoing are good?<br><br>

See you,<br><br>

The Aventour.net Team<br>
<a href=\"http://www.aventour.net/en/\">aventour.net</a>
</p>'; 

// Je m\'appelle Nicolas Fondateur d\'aventour.net <br>
// Je te souhaite la Bienvenue! ^^<br><br>

// Si tu as des questions, des suggestions ou juste envie de chatter<br>
// tu peux le faire sur nicolas@aventour.net<br>
// ou juste en répondant à ce mail <br><br>

// Nous travaillons actuellement sur l\'amélioration du site<br>
// et la création d\'application pour Android et Iphone<br><br>

// Pour en finir, tu peux nous suivre sur :<br><br>

// Facebook : <a href="https://www.facebook.com/goaventour">https://www.facebook.com/goaventour</a><br>
// Twitter : <a href="https://twitter.com/nicolasvirin">https://twitter.com/nicolasvirin</a><br><br>

// Je peux me permettre de te demander ce que t\'attends d\'aventour.net et comment améliorerais-tu ce dernier?<br><br>

// A bientôt,<br><br>

// Nicolas<br>
// Fondateur d\'aventour.net
//$email="vnicolas054@gmail.com";
//$mymessage="<a href=\"http://aventour.io/\">Clique ici pour activer ton compte</a>";
//$mymessage=file_get_contents('mail.html'); 
smtpmailer($email, 'nicolas@aventour.net', 'TEAM AVENTOUR.NET', 'Newsletter: Welcome among us', $mymessage);
//smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Nouvelle inscription : '.$mail, 'Nom: '.$nom." prénom: ".$prenom." mail: ".$mail." password: ".$password." phone: ".$phonenumber);




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

}

die("<h4 style=\"text-align: center;\">Newsletter: ".$_POST["email"]."</h4> <br> <h4  style=\"text-align: center;\">Welcome among us! ;)</h4>");

// }






	





	








 
//}
  //unset($_POST['submit']);
//$_POST['submit']=null;
//header("location: ../myindexdev.php");
//die("<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" /><h1 style=\"padding-top: 10%;text-align: center;\">Un mail de confirmation a été envoyé sur ta boite mail</h1>");



?>
