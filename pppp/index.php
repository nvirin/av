<?php require_once('./config.php'); ?>

 <form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>
</form> 
<!-- <script src="https://checkout.stripe.com/checkout.js"></script>

<button id="customButton" style="
    visibility: hidden;
">Purchase</button>

<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_sRio2WGNLMuo8F8jskcdzLaE',
  image: 'logo.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Aventour.net',
    description: '2 widgets',
    zipCode: true,
    amount: 2000,
    currency: 'EUR'
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});

document.getElementById('customButton').click();
</script> -->