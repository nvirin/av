<?php
$products = array(
	array(
		"name" => "Générateur d'énergie quantique",
		"price"=> 10.0,
		"priceTVA" => 12.0,
		"count"=> 1
	),
	array(
		"name"=> "Hyperdrive T14",
		"price"=> 25.5,
		"priceTVA" => 30.50,
		"count"=> 2
	)
);
$total = 61.0;
$totalttc = 73.0;
$port = 10.0;



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
	'PAYMENTREQUEST_0_SHIPPINGAMT' => $port,
	'PAYMENTREQUEST_0_ITEMAMT' => $totalttc,
);
foreach($products as $k => $product){
	$params["L_PAYMENTREQUEST_0_NAME$k"] = $product['name'];
	$params["L_PAYMENTREQUEST_0_DESC$k"] = '';
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