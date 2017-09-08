<?php 
//var_dump($_POST);  
// session_start();
// $_SESSION['email_inscription_affiliation']=$_POST['email'];
// $_SESSION['website_inscription_affiliation']=$_POST['website'];
// $_SESSION['fname_inscription_affiliation']=$_POST['fname'];
// $_SESSION['lname_inscription_affiliation']=$_POST['lname'];
// $_SESSION['support_inscription_affiliation']=$_POST['support']; 
 
    require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'Couvou123?KmtilmB_2'); // GMail password  

smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'Nicolas d\'aventour.net', 'PréAffiliation: '.$_POST['email'].'  '.$_POST['website'], '<u>email</u>: <b>'.$_POST['email'].'</b><br><br><u>website</u>: <b>'.$_POST['website'].'</b><br><br><u>prenom & nom</u>: <b>'.$_POST["fname"].' '.$_POST["lname"].'</b><br><br><u>autres support</u>:<br><b>'.$_POST["support"].'</b>'); 
//header("Location: https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_A1uX6VZKdg0FbPI41ECr28FF1ExhEv8M&scope=read_write&stripe_user[email]=$_POST[email]&stripe_user[url]=$_POST[website]&stripe_user[first_name]=$_POST[fname]&stripe_user[last_name]=$_POST[lname]");

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

  <!-- <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_A1uX6VZKdg0FbPI41ECr28FF1ExhEv8M&scope=read_write" class="stripe-connect"><span>Connect with Stripe</span></a> -->
             <!-- //$_POST[website]&stripe_user[first_name]");
 -->