<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'actionType'  => 'PAY',
    'currencyCode'  => 'EUR',
    'feesPayer'  => 'EACHRECEIVER',
    'memo'  => 'Order number #123',

    'cancelUrl' => 'cancel.php',
    'returnUrl' => 'success.php',

    'receiverList' => array(
      'receiver' => array(
        array(
          'amount'  => '100.00', 
          'email'  => 'nicolassan-5@aventour.net',
          'primary'  => 'true', 
        ),
        array(
          'amount'  => '90.00',
          'email'  => 'nicolassan-3@aventour.net',
        ),
        // array(
        //   'amount'  => '10.00',
        //   'email'  => 'nicolassan-4@aventour.net', 
        // ),
      ),
    ),
  ), 'Pay'
);

if ($result['responseEnvelope']['ack'] == 'Success') {
  $_SESSION['payKey'] = $result["payKey"];
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure';
  var_dump($result);
}
