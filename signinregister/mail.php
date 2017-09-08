<?php 




require '../signinregister/PHPMailer/PHPMailerAutoload.php';
require_once('../signinregister/PHPMailer/class.phpmailer.php');
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password

$mymessage='<iframe src="https://embed.spotify.com/?uri=spotify%3Auser%3Acalamar64%3Aplaylist%3A49xhfDWLxOxvw5DsW084rh" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>';
//$mymessage="<a href=\"http://aventour.io/\">Clique ici pour activer ton compte</a>";
//$mymessage=file_get_contents('mail.html'); 
smtpmailer('p.boristhenes@hotmail.fr', 'p.boristhenes@hotmail.fr', 'Félipé', 'kwa fé la', $mymessage);
//smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Nouvelle inscription : '.$mail, 'Nom: '.$nom." prénom: ".$prenom." mail: ".$mail." password: ".$password." phone: ".$phonenumber);



  

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
  
  } 
  echo "ligne97 ";

 ?>