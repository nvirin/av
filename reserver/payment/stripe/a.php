<?php 
$url = 'http://www.aventour.net/reserver/payment/stripe/processstripe.php';
$params = array(
   "idtour" => 'tfd',
   "stripeToken" =>'tfd',
   "stripeid" => 'tfd'
);

echo httpPost("http://www.aventour.net/reserver/payment/stripe/a1m.php",$params);
die();


  function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
curl_setopt($ch,CURLOPT_MAXREDIRS,2);//only 2 redirects  
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}