<?php
session_start();



try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$req = $bdd->prepare('SELECT voyage.paypaltitle,voyage.paypalprix,voyage.paypalfrais,voyage.paypaltoken,voyage.paypaltransactionid, voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.phonenumber, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mail FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE paypaltoken= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($_GET['token']));


while ($donnees = $req->fetch())
{ 
    $idtour=$donnees['idtour'];
     $paypaltitle=$donnees['paypaltitle'];
     $paypalprix=$donnees['paypalprix'];
     $_phonenumberGuide=$donnees['phonenumber'];
     $_mailGuide=$donnees['id_mail'];

     $_mailVoyageur=$donnees['id_mail'];
     $title=$donnees['title'];

      $paypalfrais=$donnees['paypalfrais'];
     $paypaltoken=$donnees['paypaltoken'];
     $paypaltransactionid=$donnees['paypaltransactionid'];

    }
$products = array(
	array(
		"name" =>  $paypaltitle,
		"price"=> $paypalfrais,
		"priceTVA" => $paypalfrais,
		"count"=> 1
	),
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
	//var_dump($paypal->errors);
	die('Paiement non effectué');
}



$params = array(
	'TOKEN' => $_GET['token'],
	'PAYERID'=> $_GET['PayerID'],
	'PAYMENTACTION' => 'Sale',

	'PAYMENTREQUEST_0_AMT' => $paypalfrais,
	'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
	// 'PAYMENTREQUEST_0_SHIPPINGAMT' => $port,
	'PAYMENTREQUEST_0_ITEMAMT' => $paypalfrais, 
);
foreach($products as $k => $product){
	$params["L_PAYMENTREQUEST_0_NAME$k"] = $product['name'];
	$params["L_PAYMENTREQUEST_0_DESC$k"] = '';
	$params["L_PAYMENTREQUEST_0_AMT$k"] = $product['priceTVA'];
	$params["L_PAYMENTREQUEST_0_QTY$k"] = $product['count'];
}
$response = $paypal->request('DoExpressCheckoutPayment',$params);
if($response){
	//var_dump($response);
	$response['PAYMENTINFO_0_TRANSACTIONID'];


    $req1 = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `complet`=:complet WHERE idtour=:idtour");
    $req1->execute(array(
    	"complet" => 1, 
      "idtour" => $idtour, 
          
            )); 

 $req00 = $bdd->prepare('SELECT voyage.title, voyage.locationDeparture, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, voyage.nbretourist, user.nom, user.prenom, user.phonenumber, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mail, user.mailpaypal FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req00->execute(array($idtour));


while ($donnees = $req00->fetch())
{
    //$idtour=$donnees['idtour'];
    $_mailpaypal=$donnees['mailpaypal'];

     $locationDeparture=$donnees['locationDeparture'];
     $nbretourist=$donnees['nbretourist'];

    $_mail=$donnees['mail'];
    $_phonenumber=$donnees['phonenumber'];
    $date=$donnees['date_voyage'];
    $lieu=$donnees['lieu_voyage'];
$title=$donnees['title'];
        $passwordBD=$donnees['password'];
    $nomGuide=$donnees['nom'];
$prenomGuide=$donnees['prenom'];
$_prix=(int)$donnees['prix'];
$_min=(int)$donnees['min_personne'];
$_max=(int)$donnees['max_personne'];
$_prixsupp=(int)$donnees['prixsupp'];


    }


    require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'Couvou123?KmtilmB_2'); // GMail password

$mailHexVoyageur=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailStringVoyageur .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }


     //$req00u = $bdd->prepare('SELECT voyage.title, voyage.locationDeparture, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.phonenumber, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mail, user.mailpaypal FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
     $req00u = $bdd->prepare('SELECT nom, prenom, phonenumber, vote, nombrevote, nombrefb, lv1, lv2, lv3, mailhexa, mail, mailpaypal FROM user WHERE mailhexa = ?');
     //nom, prenom, phonenumber, vote, nombrevote, nombrefb, lv1, lv2, lv3, mailhexa, mail, mailpaypal
$req00u->execute(array($_SESSION['myid']));


while ($donnees = $req00u->fetch())
{
    //$idtour=$donnees['idtour'];
    $_mailpaypal=$donnees['mailpaypal'];

    $_mailVoyageurConected=$donnees['mail'];
    $_phonenumberVoyageurConected=$donnees['phonenumber'];
   
    
    $nomVoyageurConected=$donnees['nom'];
$prenomVoyageurConected=$donnees['prenom'];



    }

    //lsee enseignement sur le touriste s sont à faire


    $mymessagepourleguide='Une Reservation pour '.$nbretourist.' personne(s) vient de s\'effectuer. <br> Rdv le '.$date.' à '.$locationDeparture.' <br> Avec '.$prenomVoyageurConected.': <br>'.$_mailVoyageurConected.' <br>'.$_phonenumberVoyageurConected.'<br><br>Nombre de voyageur: '.$nbretourist.' <br>Vous recevrez '.$paypalprix.' € sur place avec le(s) voyageur(s)';
smtpmailer($_mail, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour Reservé: '.$title.' ref. '.$idtour, $mymessagepourleguide); 

 $mymessagepourlevoyageur='Une Reservation pour '.$nbretourist.' personne(s) vient de s\'effectuer. <br> Rdv le '.$date.' à '.$locationDeparture.' <br> Avec '.$prenomGuide.': <br>'.$_mail.' <br>'.$_phonenumber.' <br><br>Reste à payer sur place avec le Guide: '.$paypalprix.' €';
smtpmailer($_mailVoyageurConected, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour Reservé: '.$title.' ref. '.$idtour, $mymessagepourlevoyageur); 


smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Tour Reservé: '.$title.' ref. '.$idtour, 'message recu par le guide:<br>'.$mymessagepourleguide.'<br><br>message recu par le voyageur;'.$mymessagepourlevoyageur.'<br><br><br> Guide: '.$nomGuide.' '.$prenomGuide.' mail: '.$_mail.' MailPaypal: '.$_mailpaypal.' Phone: '.$_phonenumber.'<br><br>Voyageur: '.$nomVoyageurConected.' '.$prenomVoyageurConected.' mail: '.$_mailVoyageurConected.' Phone: '. $_phonenumberVoyageurConected); 
//'<br>Voyageur: '.$nomVoyageurConected.' '.$prenomVoyageurConected.' mail: '.$_mailVoyageurConected.' Phone: '. $_phonenumberVoyageurConected


if(!empty($_phonenumberVoyageurConected)){
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
  $_phonenumberGuide, // Text this number Rdv le '.$date.' à '.$locationDeparture.' <br> Avec '.$prenomGuide.': <br>'.$_mail.' <br>'.$_phonenumber
  'Aventour.net: '.$title.' - réservation effectuée pour '.$nbretourist.' personne(s): Rdv le '.$date.' à '.$locationDeparture.' Avec '.$prenomVoyageurConected.': '.$_phonenumberVoyageurConected.' '.$_mailVoyageurConected.' - A recevoir sur place: '.$paypalprix.' €'
);



$messagepourvoyageur = $client->account->messages->sendMessage(
  '+33644609005', // From a valid Twilio number
  //+15005550006 //+33975184687
  $_phonenumberVoyageurConected, // Text this number Rdv le '.$date.' à '.$locationDeparture.' <br> Avec '.$prenomGuide.': <br>'.$_mail.' <br>'.$_phonenumber
  'Aventour.net: '.$title.' - réservation effectuée pour '.$nbretourist.' personne(s): Rdv le '.$date.' à '.$locationDeparture.' Avec '.$prenomGuide.': '.$_phonenumber.' '.$_mail.' Reste à payer sur place avec le Guide: '.$paypalprix.' €'
);

  } 
  }




















 header('Location: //www.aventour.net/reservationconfirmed.html'); 

}else{
	//var_dump($paypal->errors);
  header('Location: //www.aventour.net/noreservationconfirmed.html');
	die();
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nicolas VIRIN">
    <title></title>
   <link rel="stylesheet" href="http://www.aventour.net/landing/css/bootstrap.min.css">
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet"> -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
 <!--    <link rel="shortcut icon" href="images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    
    <section id="services">
        <div class="container">
          <div class="box center" style="padding-top:20%;">
            <div class="items2">

                 <h3 style="
    text-align: center;
">Nous t'avons envoyé un mail <?php echo $_mailVoyageurConected ?><br>


<?php  echo 'Réservation effectué: Rdv le '.$date.' à '.$locationDeparture.' <br> Avec '.$prenomGuide.': <br>'.$_mail.' <br>'.$_phonenumber;; ?>
<br> </h2><br><br><br><hr> 

<!-- die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h3 style="text-align:center"><br><br>Parfait, nous viendrons vers toi au plus vite :) <br><a href="index.php">Home</a></h3></div></html'); 
 -->
                 <!-- <a href="index.html"><h4>Home </h3></a>
                 <a href="blog.html"><h3>Formations</h3></a> --> 
                 <p class="lead"></p>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-md-12">
             <a class = "btn btn-info btn-lg btn-block" href="index.php"><h3>Home</h3></a>
          

              </div><!-- col-md-12 -->
           <!--  <div class="col-md-6">
             <a class = "btn btn-info btn-lg btn-block" href="blog.html"><h3>Formations</h3></a>
          

              </div><!-- col-md-12 --> 
              </div><!-- row -->
              </div> <!-- container -->


            
            </div><!--/.center-->                <!--/.col-md-4-->            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <!-- <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates"></a>. All Rights Reserved.
                </div> -->
                 <!-- <div class="col-sm-6">
                    <img class="pull-right" src="images/shapebootstrap.png" alt="ShapeBootstrap" title="ShapeBootstrap">
                </div> -->
            </div>
        </div>
    </footer><!--/#footer-->

     <!-- <script src="js/jquery.js"></script>
    // <script src="js/bootstrap.min.js"></script> -->
     <!-- <script src="js/jquery.isotope.min.js"></script>
    // <script src="js/jquery.prettyPhoto.js"></script> 
    // <script src="js/main.js"></script> -->
</body>
</html>




