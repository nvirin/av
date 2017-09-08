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

$req = $bdd->prepare('SELECT voyage.paypaltitle,voyage.paypalprix,voyage.paypalfrais,voyage.paypaltoken,voyage.paypaltransactionid, voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE paypaltoken= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($_GET['token']));


while ($donnees = $req->fetch())
{
    $idtour=$donnees['idtour'];
     $paypaltitle=$donnees['paypaltitle'];
     $paypalprix=$donnees['paypalprix'];

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
	var_dump($response);
	$response['PAYMENTINFO_0_TRANSACTIONID'];

}else{
	var_dump($paypal->errors);
}
?>