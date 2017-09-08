<?php 
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('./config.php');
//\Stripe\Stripe::setApiKey(PLATFORM_SECRET_KEY);
\Stripe\Account::create(array(
  "country" => "FR",
  "managed" => false,
  "email" => "nicolas@aventour.net"
));


 ?>