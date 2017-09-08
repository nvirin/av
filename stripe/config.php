<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//require_once('vendor/autoload.php');
require_once 'Stripe.php';

// $stripe = array(
//   "secret_key"      => "sk_live_yuMj0xARVrk6sN88Z0UL1UO4",
//   "publishable_key" => "pk_live_dyWa1IWaGyWUsP8Dms1syTnI"
// );

$stripe = array(
  "secret_key"      => "sk_test_WRfFAPk1Ly1VQLeTCe9HwGuj",
  "publishable_key" => "pk_test_sRio2WGNLMuo8F8jskcdzLaE"
);



\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>