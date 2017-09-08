<?php  

require '../signinregister/PHPMailer/PHPMailerAutoload.php';
require_once('../signinregister/PHPMailer/class.phpmailer.php');
 define('GUSER', 'testmoi97422@gmail.com'); // 1and1 username
 define('GPWD', 'testmoi974221'); // 1and1 password 


// $mymessage='Blablabla '.$_POST['name'].' Blablabla '.$_POST['surname'].' Blablabla '.$_POST['email'].' Blablabla '.$_POST['message'];
$mymessage='Blablabla';
 
// smtpmailer('testmoi97422@gmail.com', 'testmoi97422@gmail.com', $_POST['name'].' '.$_POST['surname'], 'objet du mail', $mymessage);

smtpmailer('testmoi97422@gmail.com', 'testmoi97422@gmail.com', 'seff', 'objet du mail', $mymessage);

function smtpmailer($to, $from, $from_name, $subject, $body) { 
  global $error;
  $mail = new PHPMailer();  // create a new object
  $mail->CharSet = 'UTF-8';
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true;  // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->Host = 'smtp.gmail.com';
   //$mail->Host = 'auth.smtp.1and1.fr'
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

 
}

?> 