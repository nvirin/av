<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  require_once('./config.php');

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => $_POST['stripeToken'].'customer@example.com',
      'source'  => $token,

  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 50000000,
      'currency' => 'EUR', 
       'metadata' =>array(
       "idtour" => $_POST['stripeToken'],
       "totalttc" => $_POST['stripeToken'],
       "prixreservation" => $_POST['stripeToken'],
     "mailvoyageur" => $_POST['stripeToken'],
   "nbretourist" => $_POST['stripeToken'],

   "nomBD" => $_POST['stripeToken'],
    "prenomBD" => $_POST['stripeToken']
      
                    ) 
  ));
  


  echo '<h1>Successfully charged $50.00!</h1>';

   // 'metadata' =>array(
   //     "idtour" => "<?php echo $_POST['stripeToken'];?>",
   <!-- //     "totalttc" => "<?php echo $_POST['stripeToken'];?>",
   //     "prixreservation" => "<?php echo $_POST['stripeToken'];?>",
   //   "mailvoyageur" => "<?php echo $_POST['stripeToken'];?>",
   // "nbretourist" => "<?php echo $_POST['stripeToken'];?>",

   // "nomBD" => "<?php echo $_POST['stripeToken'];?>",
   //  "prenomBD" => "<?php echo $_POST['stripeToken'];?>"
      
   //                  )  -->


      
?>

