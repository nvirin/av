<?php
// Install the library via PEAR or download the .zip file to your project folder.
// This line loads the library
//require('/path/to/twilio-php/Services/Twilio.php');
// require($_SERVER['DOCUMENT_ROOT'].'/signinregister/twilio/Services/Twilio.php'); 

// $sid = "AC08ac53e3016de434a9dcf0c9571cbff9"; // Your Account SID from www.twilio.com/user/account
// $token = "be8274c24501fbc142bba4a9ff4ac3f4"; // Your Auth Token from www.twilio.com/user/account

// $sid = "AC6d3b52cca1770e74fd4865038353a8d9"; // TEST ...Your Account SID from www.twilio.com/user/account
// $token = "27f6f7f15d0fc7702dce2d1b1103c5aa"; // TEST ...Your Auth Token from www.twilio.com/user/account

//$client = new Services_Twilio($sid, $token);
// $message = $client->account->messages->sendMessage(
//   '+33644609005', // From a valid Twilio number
//   //+15005550006 //+33975184687
//   '+33768752176', // Text this number
//   "Hello monkey! fdgdrg"
// 
$mphonenumber='+33613110064,ck,6151';

  $n = $mphonenumber;
$p = "/[+()]?\d{3,}[-.()]*\d{3,}[-.()]*\d{4}/";

preg_match($p,$n,$m);
if($mphonenumber!=$m[0]){

  echo 'not good';
}else{

	echo 'good';
}

//var_dump($m);
//print $message->sid;