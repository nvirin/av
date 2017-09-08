<?php
require 'paypal.php';
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
$paypal = "#";
$paypal = new Paypal();
$params = array(
	'RETURNURL' => 'http://www.aventour.net/reserver/payment/process.php',
	'CANCELURL' => 'http://www.aventour.net/reserver/payment/cancel.php', 

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
$response = $paypal->request('SetExpressCheckout', $params);
if($response){
	$paypal = 'https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $response['TOKEN'];
}else{
	var_dump($paypal->errors);
	die('Erreur ');
}


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
        <div class="navbar navbar-fixed">
          <div class="navbar-inner">
            <div class="container">
              <a class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand" href="#">Paypal Express checkout</a>
            </div>
          </div>
        </div>


        <div class="container-fluid main">

          <div class="row-fluid">
          	<div class="span12">
	          	<table class="table table-striped table-hover">
	                <thead>
	                  <tr>
	                    <th>Produit</th>
	                    <th>Quantité</th>
	                    <th>Prix HT</th>
	                    <th>Prix TTC</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ( $products as $k => $product ): ?>
	                		<tr>
	                			<td><?= $product['name']; ?></td>
	                			<td><?= $product['count']; ?></td>
	                			<td><?= $product['price']; ?> €</td>
	                			<td><?= $product['price'] * 1.196; ?> €</td>
	                		</tr>
	                	<?php endforeach ?>
	                	<tr>
	                		<td colspan="2"></td>
	                		<td><strong>Total</strong></td>
	                		<td><?= $total; ?> €</td>
	                	</tr>
	                </tbody>
	             </table>

	             <p>
	             	<a href="<?= $paypal; ?>" class="btn btn-primary">Payer</a>
	             </p>
          	</div>
          </div>

        </div>

    </body>
</html>
