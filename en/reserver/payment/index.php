<?php
session_start();
//var_dump($_POST);
$_nombretouriste='1';
$_nombretouriste=(int)$_POST['touriste'];
//var_dump($_SESSION);
require 'paypal.php';



try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//$req0 = $bdd->prepare('SELECT user.mail FROM user WHERE mail= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
//$req0->execute(array($_POST['mytour']));

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mail FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($_POST['mytour']));


while ($donnees = $req->fetch())
{
    $idtour=$donnees['idtour'];
   

        //tout c'est bien passé!!!!!! good!!
       // echo "good!";
    $mail=$donnees['mail'];
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

    //calcul prix
     if(($_min<=$_nombretouriste)&&($_nombretouriste<=$_max)){


  
            //total = nombretouriste*prix;
            $_total = $_prix;
           // $__total =  $_total; 
            $tax = ceil($_total*0.30); 

             }else{
                $_total = $_prix;
                $_total=$_total +$_prixsupp*($_nombretouriste-$_max);
               // $__total =  $_total;
                $tax = ceil($_total*0.30);



             }
             //$_total=round($_total*1.25,0,PHP_ROUND_HALF_UP);
             //$_frais=$_total-$__total;


    
    


//$_POST['Payment'];
$products = array(
	array(
		"name" => 'Frais de réservation: Aventour.net - x '.$_nombretouriste.' touriste(s), '.$title.', '.$lieu.', '.$date,
		"price"=> $tax,
		"priceTVA" => $tax,
		"count"=> 1
	),
	// array(
	// 	"name"=> "Hyperdrive T14", 
	// 	"price"=> 25.5,
	// 	"priceTVA" => 30.50,
	// 	"count"=> 2
	// )
);
$total = $_total; 
$totalttc = $_total;
$port = ceil($totalttc*0.30);  
$paypal = "#"; 
$paypal = new Paypal();
$params = array(
	'RETURNURL' => 'http://www.aventour.net/reserver/payment/process.php',
	'CANCELURL' => 'http://www.aventour.net/reserver/payment/cancel.php',

	'PAYMENTREQUEST_0_AMT' => $port,
	'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
	// 'PAYMENTREQUEST_0_TAXAMT' => $port,
	'PAYMENTREQUEST_0_ITEMAMT' =>  $port,
  'NOSHIPPING' =>'1',
  // 'CALLBACKVERSION  ' =>'61.0',
  // 'HDRIMG' =>url image',SOLUTIONTYPE LANDINGPAGE
  'LANDINGPAGE' =>'Billing',
  // 'SOLUTIONTYPE' =>'Sole',
  'EMAIL' => $mail,
  'BRANDNAME' => 'AvenTour.net: Activité touristique avec l\'habitant',
);
foreach($products as $k => $product){
	$params["L_PAYMENTREQUEST_0_NAME$k"] = $product['name'];
	$params["L_PAYMENTREQUEST_0_DESC$k"] = $title;
	$params["L_PAYMENTREQUEST_0_AMT$k"] = $product['priceTVA'];
	$params["L_PAYMENTREQUEST_0_QTY$k"] = $product['count']; 
}
$response = $paypal->request('SetExpressCheckout', $params);
if($response){
	// $paypal = 'https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $response['TOKEN'];
  $paypal = 'https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $response['TOKEN']; 
}else{
	var_dump($paypal->errors);
	die('Erreur ');
}

$req1 = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `paypaltitle`=:paypaltitle, `paypalprix`=:paypalprix,`paypalfrais`=:paypalfrais,`paypaltoken`=:paypaltoken,`paypaltransactionid`=:paypaltransactionid, `mailvoyageur`=:mailvoyageur, `nbretourist`=:nbretourist WHERE idtour=:idtour");
    $req1->execute(array(

      "paypaltitle" => $product['name'],  
            "paypalprix" => $totalttc,
            "paypalfrais" => $port,
            "idtour" => $idtour,
            // "password" => $password,
            "paypaltoken" => $response['TOKEN'],
             "paypaltransactionid" => $response['PAYMENTINFO_0_TRANSACTIONID'],
            //"actif" => 1,$mail
             "mailvoyageur" => $mail, 
             "nbretourist" => $_nombretouriste,  

           
            
            )); 

   
header("Location: $paypal"); 


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
    


        <div class="container-fluid main">

          <div class="row-fluid">
          	<div class="span12">
	          	<table class="table table-striped table-hover">
	               
	                <tbody>
	                	<?php foreach ( $products as $k => $product ): ?>
	                		<tr>
	                			<td><?= $product['name']; ?></td>
	                			<td><?= $product['count']; ?></td>
	                			<td><?= $product['price']; ?> €</td>
	                			<td><?= $product['price'] ; ?> €</td>
	                		</tr>
	                	<?php endforeach ?>
	                
	                </tbody>
	             </table>

	             <p>
	             	 <a href="<?= $paypal; ?>" class="btn btn-primary">Pay</a>
	             </p>
          	</div>
          </div>

        </div>

    </body>
</html> 
