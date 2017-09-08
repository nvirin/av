<?php 
require '../signinregister/PHPMailer/PHPMailerAutoload.php';
require_once('../signinregister/PHPMailer/class.phpmailer.php');
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password
echo "coucou";

// for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++)
// {
    //smtpmailer('vnicolas060@gmail.com', 'nicolas@test.net', 'L\'EQUIPE AVENTOUR', 'Confirmation mail', 'Hello World!');
// }
$mailhex="coucou";

$m='<p>Salut tout le <u>monde</u>,
voici un mail en <b>HTML</b></p>';
$mymessage=file_get_contents('mail.html');  
//$mymessage="<a href=\"http://aventour.io/\">Clique ici pour activer ton compte</a>";
$mymessage="<a href=\"http://aventour.io/activateuser/activation.php?dataa=".$mailhex."\">Clique ici pour activer ton compte</a>";

smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'Test', 'test', $mymessage);

//smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'yourName', 'test mail message', 'Hello World!');

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
  echo $error;
  var_export($mail);
} ?>