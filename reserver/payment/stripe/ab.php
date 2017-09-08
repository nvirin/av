<?php 
  # Our new data
$data = array(
    'election' => 1,
    'name' => 'Test'
);
# Create a connection
$url = 'http://www.aventour.net/reserver/payment/stripe/api/index.php';
$ch = curl_init($url);
# Form data string
$postString = http_build_query($data, '', '&');
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
curl_setopt($ch,CURLOPT_MAXREDIRS,2);//only 2 redirects
# Get the response
$response = curl_exec($ch); 
var_dump($response );
curl_close($ch);
//header("Location: http://www.aventour.net/reserver/payment/stripe/api/");  


?>