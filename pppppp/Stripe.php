<?php

// Tested on PHP 5.2, 5.3

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Stripe needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Stripe needs the JSON PHP extension.');
}
if (!function_exists('mb_detect_encoding')) {
 

  try {
    $error = 'Always throw this error';
   throw new Exception('Stripe needs the Multibyte String PHP extension.');

    // Code following an exception is not executed.
    echo 'Never executed';

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}





}




// Stripe singleton
require(dirname(__FILE__) . '/lib/Stripe.php');

// Utilities
require(dirname(__FILE__) . '/lib/Util/Set.php'); 
require(dirname(__FILE__) . '/lib/JsonSerializable.php');
require(dirname(__FILE__) . '/lib/StripeObject.php');
require(dirname(__FILE__) . '/lib/ApiResource.php'); 
require(dirname(__FILE__) . '/lib/Collection.php');
require(dirname(__FILE__) . '/lib/Source.php');
require(dirname(__FILE__) . '/lib/Util/Util.php');

require(dirname(__FILE__) . '/lib/Util/RequestOptions.php'); 

// Errors
require(dirname(__FILE__) . '/lib/Error/Base.php');
require(dirname(__FILE__) . '/lib/Error/InvalidRequest.php');
require(dirname(__FILE__) . '/lib/Error/RateLimit.php');
require(dirname(__FILE__) . '/lib/Error/Permission.php');
;
require(dirname(__FILE__) . '/lib/Error/Card.php');

require(dirname(__FILE__) . '/lib/Error/Authentication.php');
require(dirname(__FILE__) . '/lib/Error/ApiConnection.php');
require(dirname(__FILE__) . '/lib/Error/Api.php');

require(dirname(__FILE__) . '/lib/HttpClient/ClientInterface.php');
require(dirname(__FILE__) . '/lib/HttpClient/CurlClient.php');




// Plumbing



require(dirname(__FILE__) . '/lib/ApiResponse.php');
require(dirname(__FILE__) . '/lib/ApiRequestor.php');

require(dirname(__FILE__) . '/lib/SingletonApiResource.php');
require(dirname(__FILE__) . '/lib/AttachedObject.php');
//require(dirname(__FILE__) . '/lib/List.php');

// Stripe API Resources
require(dirname(__FILE__) . '/lib/Account.php');
require(dirname(__FILE__) . '/lib/ExternalAccount.php');
require(dirname(__FILE__) . '/lib/Card.php');
require(dirname(__FILE__) . '/lib/Balance.php');
require(dirname(__FILE__) . '/lib/BalanceTransaction.php');
require(dirname(__FILE__) . '/lib/Charge.php');
require(dirname(__FILE__) . '/lib/Customer.php');
require(dirname(__FILE__) . '/lib/Invoice.php');
require(dirname(__FILE__) . '/lib/InvoiceItem.php');
require(dirname(__FILE__) . '/lib/Plan.php');
require(dirname(__FILE__) . '/lib/Subscription.php');
require(dirname(__FILE__) . '/lib/Token.php');
require(dirname(__FILE__) . '/lib/Coupon.php');
require(dirname(__FILE__) . '/lib/Event.php');
require(dirname(__FILE__) . '/lib/Transfer.php');
require(dirname(__FILE__) . '/lib/Recipient.php');
require(dirname(__FILE__) . '/lib/ApplicationFee.php');
