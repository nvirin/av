<style type="text/css">
	
	html,
body {
  height: 100%;
}

body {
  display: flex;
  align-content: center;
  justify-content: center;
  align-items: center;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script src="https://js.braintreegateway.com/web/3.3.0/js/client.min.js"></script>


<script src="https://js.braintreegateway.com/web/3.3.0/js/paypal.min.js"></script>

<a href="" class="button" id="id-for-your-paypal-button">Paye</a>

 <script type="text/javascript">

// Fetch the button you are using to initiate the PayPal flow
var paypalButton = document.getElementById('id-for-your-paypal-button');

// Create a Client component
braintree.client.create({
  authorization: 'TOKEN'
}, function (clientErr, clientInstance) {
  // Create PayPal component
  braintree.paypal.create({
    client: clientInstance
  }, function (err, paypalInstance) {
    paypalButton.addEventListener('click', function () {
      // Tokenize here!
      paypalInstance.tokenize({
        flow: 'checkout', // Required
        amount: 10.00, // Required
        currency: 'EUR', // Required
        locale: 'fr_FR',
        enableShippingAddress: false,
        shippingAddressEditable: false,
        shippingAddressOverride: {
          recipientName: 'Scruff McGruff',
          line1: '1234 Main St.',
          line2: 'Unit 1',
          city: 'Chicago',
          countryCode: 'US',
          postalCode: '60652',
          state: 'IL',
          phone: '123.456.7890'
        }
      }, function (err, tokenizationPayload) {
        // Tokenization complete
        // Send tokenizationPayload.nonce to server
      });
    });
  });
});
 </script>

</body>
</html>

