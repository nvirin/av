<?php

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.paypaltitle,voyage.paypalprix,voyage.paypalfrais,voyage.paypaltoken,voyage.paypaltransactionid, voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.phonenumber, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE paypaltoken= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($_GET['token']));


while ($donnees = $req->fetch())
{
    $idtour=$donnees['idtour'];
     $paypaltitle=$donnees['paypaltitle'];
     $paypalprix=$donnees['paypalprix'];
     $_phonenumberGuide=$donnees['phonenumber'];

      $paypalfrais=$donnees['paypalfrais'];
     $paypaltoken=$donnees['paypaltoken'];
     $paypaltransactionid=$donnees['paypaltransactionid'];

   

        //tout c'est bien passé!!!!!! good!!
       // echo "good!";
//     $date=$donnees['date_voyage'];
//     $lieu=$donnees['lieu_voyage'];
// $title=$donnees['title'];
//         $passwordBD=$donnees['password'];
//     $nomBD=$donnees['nom'];
// $prenomBD=$donnees['prenom'];
// $_prix=(int)$donnees['prix'];
// $_min=(int)$donnees['min_personne'];
// $_max=(int)$donnees['max_personne'];
// $_prixsupp=(int)$donnees['prixsupp'];


    }
$products = array(
	array(
		"name" =>  $paypaltitle,
		"price"=> $paypalprix,
		"priceTVA" => $paypalprix,
		"count"=> 1
	),
	// array(
	// 	"name"=> "Hyperdrive T14",
	// 	"price"=> 25.5,
	// 	"priceTVA" => 30.50,
	// 	"count"=> 2
	// )
);
$total = $paypalprix;
$totalttc = $paypalprix;
$port = $paypalfrais; 



require 'paypal.php';
$paypal = new Paypal();
$response = $paypal->request('GetExpressCheckoutDetails', array(
	'TOKEN' => $_GET['token']
));
if($response){
	if($response['CHECKOUTSTATUS'] == 'PaymentActionCompleted'){
		die('Ce paiement a déjà été validé');
	}
}else{
	var_dump($paypal->errors);
	die();
}



$params = array(
	'TOKEN' => $_GET['token'],
	'PAYERID'=> $_GET['PayerID'],
	'PAYMENTACTION' => 'Sale',

	'PAYMENTREQUEST_0_AMT' => $totalttc + $port,
	'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
	'PAYMENTREQUEST_0_TAXAMT' => $port,
	'PAYMENTREQUEST_0_ITEMAMT' => $totalttc,
);
foreach($products as $k => $product){
	$params["L_PAYMENTREQUEST_0_NAME$k"] = $product['name'];
	$params["L_PAYMENTREQUEST_0_DESC$k"] = 'coucou';
	$params["L_PAYMENTREQUEST_0_AMT$k"] = $product['priceTVA'];
	$params["L_PAYMENTREQUEST_0_QTY$k"] = $product['count'];
}
$response = $paypal->request('DoExpressCheckoutPayment',$params);
if($response){
	//var_dump($response);
	$response['PAYMENTINFO_0_TRANSACTIONID'];
// 	try{
// $bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// // $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
// }
// catch (Exception $e)
// { echo "ERRREUR";
//         die('Erreur : ' . $e->getMessage()); 
// }

$req1 = $bdd->prepare("UPDATE `ma_base`.`user` SET `complet`=:complet FROM voyage WHERE idtour=:idtour");
    $req1->execute(array(
      "complet" => 1, 
      "idtour" => $idtour,         
            ));
    $req00 = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.phonenumber, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mail, user.mailpaypal FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req00->execute(array($idtour));


while ($donnees = $req->fetch())
{
    $idtour=$donnees['idtour'];
    $_mailpaypal=$donnees['mailpaypal'];
   

        //tout c'est bien passé!!!!!! good!!
       // echo "good!";
    $_mail=$donnees['mail'];
    $_phonenumber=$donnees['phonenumber'];
    $date=$donnees['date_voyage'];
    $lieu=$donnees['lieu_voyage'];
$title=$donnees['title'];
        $passwordBD=$donnees['password'];
    $nomBD=$donnees['nom'];
$prenomBD=$donnees['prenom'];
$_prix=(int)$donnees['prix'];
$_min=(int)$donnees['min_personne'];
$_max=(int)$donnees['max_personne'];
$_prixsupp=(int)$donnees['prixsupp'];


    }
     require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password

$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }


$mymessagepourleguide='Une Reservation vient de s\'effectuer. <br> Voici ses coordonées: <br> Mail: '.$mailstring.'<br> Numéro de Téléphone: '.$_phonenumber;
smtpmailer($_mail, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour Reservé', $mymessagepourleguide); 
smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour Reservé', $mymessagepourleguide.' Guide:'.$_mail.' MailPaypal '.$_mailpaypal); 

if(!empty($_phonenumberGuide)){
if(!empty($_phonenumber)){

require($_SERVER['DOCUMENT_ROOT'].'/signinregister/twilio/Services/Twilio.php'); 

$sid = "AC08ac53e3016de434a9dcf0c9571cbff9"; // Your Account SID from www.twilio.com/user/account
$token = "be8274c24501fbc142bba4a9ff4ac3f4"; // Your Auth Token from www.twilio.com/user/account

// $sid = "AC6d3b52cca1770e74fd4865038353a8d9"; // TEST ...Your Account SID from www.twilio.com/user/account
// $token = "27f6f7f15d0fc7702dce2d1b1103c5aa"; // TEST ...Your Auth Token from www.twilio.com/user/account

$client = new Services_Twilio($sid, $token);
$message = $client->account->messages->sendMessage(
  '+33644609005', // From a valid Twilio number
  //+15005550006 //+33975184687
  $_phonenumberGuide, // Text this number
  "getge ".$_phonenumber
);

  }
  }


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
    


}else{
	//var_dump($paypal->errors);
}
?>