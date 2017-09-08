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






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nicolas VIRIN">
    <title>Aventour - secure payment</title>
  <!--  <link rel="stylesheet" href="landing/css/bootstrap.min.css">  -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
   <!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>  -->
<!-- <script src="//cdn.jsdelivr.net/mobile-detect.js/1.3.5/mobile-detect.min.js"></script>  -->

 
</head>


<body >
     
    <section id="services">
        <div class=""><!-- container -->
          <div class="box center"><!-- box center -->
            <div class="items2">
             <div class="col-md-12">
            </div>

                 <h3 style="text-align: center;"><br></h2><br><br><br><hr>
                 <!-- <a href="index.html"><h4>Home </h3></a>
                 <a href="blog.html"><h3>Formations</h3></a> -->
                 <p class="lead"></p> 
            </div>
            <div class=""><!-- container --> 
            <div class="row">
           
            <div class="col-md-offset-5 col-md-2 col-md-offset-5 col-xs-111">
             <!-- <a class = "btn btn-info btn-lg btn-block" href="/"><h3>Aller sur la page d'acceuil</h3></a> -->
             <button class="btn btn-info btn-lg btn-block" id="customButton" >Continuer</button>

          

              </div><!-- col-md-12 -->
          
              </div><!-- row -->
              </div> <!-- container -->


            
            </div><!--/.center-->                <!--/.col-md-4-->            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
    <footer id="footer">
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </footer><!--/#footer-->
    <script src="https://checkout.stripe.com/checkout.js"></script>

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
   key: 'pk_test_sRio2WGNLMuo8F8jskcdzLaE',
 // key: 'pk_live_dyWa1IWaGyWUsP8Dms1syTnI',
  image: 'logo.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
   // console.log(token.id); 
   post('charge.php', {stripeToken: token.id, prixreservation: "100000" });   
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Aventour.net',
    description: "test",
    zipCode: true,
    amount: "100000",
    currency: 'EUR',
    bitcoin: true,

    //billingAddress: true,
    //email: 'am@d.fd',
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



</script>

<script type="text/javascript">


//  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { 
//  // some code..
// }else{
//    document.getElementById('customButton').click();


// }
  document.getElementById('customButton').click();

</script>

   
</body>
</html>




