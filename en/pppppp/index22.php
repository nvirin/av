<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// require_once('./config.php'); ?>



<!--  <form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
          data-key="<?php //echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"   
          data-amount="5000"
          data-locale="auto"></script>
</form>  -->
<script src="https://checkout.stripe.com/checkout.js"></script>

<button id="customButton" style="
    visibility: hidden;
">Purchase</button>

<script>
function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
var handler = StripeCheckout.configure({
  // key: 'pk_test_sRio2WGNLMuo8F8jskcdzLaE',
  key: 'pk_live_dyWa1IWaGyWUsP8Dms1syTnI',
  image: 'logo.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
   // console.log(token.id); 
   post('http://www.aventour.net/reserver/payment/stripe/process.php', {stripeToken: token.id, idtour:"<?php echo $_POST['idtour'];?>", prixreservation: "<?php echo $_POST['amount'];?>" });  
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Aventour.net',
    description: "<?php echo $_POST['description'];?>",
    zipCode: true,
    amount: "<?php echo $_POST['amount'];?>",
    currency: 'EUR',
    bilingAddress: true
    // metadata: array(
    //   "idtour" => "<?php echo $_POST['idtour'];?>",
    //   "totalttc" => "<?php echo $_POST['totalttc'];?>",
    //    "prixreservation" => "<?php echo $_POST['prixreservation'];?>",
    //     // "mailvoyageur" => "<?php echo $_POST['mailvoyageur'];?>",
    //     // "nbretourist" => "<?php echo $_POST['nbretourist'];?>",

    //      "nomBD" => "<?php echo $_POST['nomBD'];?>",
    //      "prenomBD" => "<?php echo $_POST['prenomBD'];?>"
      
    //                 )
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
// window.addEventListener('popstate', function() { 
//   handler.close();
// });  

document.getElementById('customButton').click();
</script>