<?php 
session_start();
//$_SESSION['cadeau']=true;


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Erreur connection</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="robots" content="noindex, nofollow">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/bootstrap.min.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800,400italic">
    <!-- Stroke 7 font by Pixeden (http://www.pixeden.com/icon-fonts/stroke-7-icon-font-set)-->
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/helper.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/style.default.css" id="theme-stylesheet">
    <!-- owl carousel-->
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/owl.carousel.css">
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/owl.theme.css">
    <!-- plugins-->
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/simpletextrotator">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="http://www.aventour.net/landing/css/custom.css">
    <link rel="stylesheet" href="http://www.aventour.net/css/footer-distributed-with-address-and-phones.css">
    <!-- Font Awesome CSS -->
<link href="http://www.aventour.net/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="http://www.aventour.net/landing/img/logo.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <!-- Custom css --> 
<!-- <link href="css/custom.css" rel="stylesheet">  -->

<style type="text/css">
  

  #videoReunion, #videoReunion0{
    /*padding-left: 9vw;*/
       /*z-index: 30;*/
  }

  #videoReunion0{
    /*padding-left: 9vw;*/
       /*z-index: 30;*/
  }
  

 

  #videoReunion, #videoReunion0{
    /*padding-left: 9vw;*/
        width: 93vw;
    height: 52vw;
  }
}

  #videoReunion{
    /*padding-left: 155px;*/
        width: 62vw;
    height: 36vw;
  }

  #mSiteName{ display:none;}
  #logo{ display:none;}
}

/* tablets/desktops and up ----------- */
@media (min-width: 992px) and (max-width: 1199px) {
  #videoReunion, #videoReunion0{
    width: 36vw;
    height: 20vw;
  
 }

 #videoParis{
    padding-left: 75px;
  }
}
/* large desktops and up ----------- */
@media screen and (min-width: 1200px) {
  #videoReunion, #videoReunion0{
    width: 36vw;
    height: 20vw;
  
 }

 #videoParis{
    padding-left: 75px;
  }

}






 



  #monsectionAvis {
  background-color: #EDEFED;
padding-top: 100px;
padding-bottom: 10px;
  

  }

  #monsectionQuoi {
  background-color: rgba(0, 2, 21, 0.94);
padding-top: 100px;
padding-bottom: 0px;
  

  }

  #monsectionVideo {
  background-color: #EDEFED;
padding-top: 50px;
padding-bottom: 75px;
  

  }

  #videoReunion1{
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    object-fit: cover;
  }



  .zindexzero{
    z-index: -100;
  }

  .zindexdeux{
    z-index: 2;
  } 

  .stripe-connect {
  display: inline-block;
  margin-bottom: 1px;

  background-image: -webkit-linear-gradient(#28A0E5, #015E94);
  background-image: -moz-linear-gradient(#28A0E5, #015E94);
  background-image: -ms-linear-gradient(#28A0E5, #015E94);
  background-image: linear-gradient(#28A0E5, #015E94);

  -webkit-font-smoothing: antialiased;
  border: 0;
  padding: 1px;
  height: 30px;
  text-decoration: none;

  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;

  -moz-box-shadow: 0 1px 0 rgba(0,0,0,0.2);
  -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);

  cursor: pointer;

  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.stripe-connect span {
  display: block;
  position: relative;
  padding: 0 12px 0 44px;
  height: 30px;

  background: #1275FF;
  background-image: -webkit-linear-gradient(#7DC5EE, #008CDD 85%, #30A2E4);
  background-image: -moz-linear-gradient(#7DC5EE, #008CDD 85%, #30A2E4);
  background-image: -ms-linear-gradient(#7DC5EE, #008CDD 85%, #30A2E4);
  background-image: linear-gradient(#7DC5EE, #008CDD 85%, #30A2E4);

  font-size: 14px;
  line-height: 30px;
  color: white;
  font-weight: bold;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);

  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);

  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}

.stripe-connect span:before {
  content: '';
  display: block;
  position: absolute;
  left: 11px;
  top: 50%;
  width: 23px;
  height: 24px;
  margin-top: -12px;
  background-repeat: no-repeat;
  background-size: 23px 24px;
}

.stripe-connect:active {
  background: #005D93;
}

.stripe-connect:active span {
  color: #EEE;

  background: #008CDD;
  background-image: -webkit-linear-gradient(#008CDD, #008CDD 85%, #239ADF);
  background-image: -moz-linear-gradient(#008CDD, #008CDD 85%, #239ADF);
  background-image: -ms-linear-gradient(#008CDD, #008CDD 85%, #239ADF);
  background-image: linear-gradient(#008CDD, #008CDD 85%, #239ADF);

  -moz-box-shadow: inset 0 1px 0 rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.1);
}

.stripe-connect:active span:before {

}

.stripe-connect.light-blue {
  background: #b5c3d8;
  background-image: -webkit-linear-gradient(#b5c3d8, #9cabc2);
  background-image: -moz-linear-gradient(#b5c3d8, #9cabc2);
  background-image: -ms-linear-gradient(#b5c3d8, #9cabc2);
  background-image: linear-gradient(#b5c3d8, #9cabc2);
  
  -moz-box-shadow: 0 1px 0 rgba(0,0,0,0.1);
  -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

.stripe-connect.light-blue span {
  color: #556F88;
  text-shadow: 0 1px rgba(255, 255, 255, 0.8);

  background: #f0f5fa;
  background-image: -webkit-linear-gradient(#f0f5fa, #e4ecf5 85%, #e7eef6);
  background-image: -moz-linear-gradient(#f0f5fa, #e4ecf5 85%, #e7eef6);
  background-image: -ms-linear-gradient(#f0f5fa, #e4ecf5 85%, #e7eef6);
  background-image: linear-gradient(#f0f5fa, #e4ecf5 85%, #e7eef6);
    
  -moz-box-shadow: inset 0 1px 0 #fff;
  -webkit-box-shadow: inset 0 1px 0 #fff;
  box-shadow: inset 0 1px 0 #fff;
}

.stripe-connect.light-blue:active {
    background: #9babc2;
}

.stripe-connect.light-blue:active span {
  color: #556F88;
  text-shadow: 0 1px rgba(255, 255, 255, 0.8);

  background: #d7dee8;
  background-image: -webkit-linear-gradient(#d7dee8, #e7eef6);
  background-image: -moz-linear-gradient(#d7dee8, #e7eef6);
  background-image: -ms-linear-gradient(#d7dee8, #e7eef6);
  background-image: linear-gradient(#d7dee8, #e7eef6);
    
  -moz-box-shadow: inset 0 1px 0 rgba(0,0,0,0.05);
  -webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,0.05);
  box-shadow: inset 0 1px 0 rgba(0,0,0,0.05);
}

.stripe-connect.dark {
  background: #252525;
  background: rgba(0,0,0,0.5) !important;
}

/* Images*/

.stripe-connect span:before, .stripe-connect.blue span:before {
  background-image: url("data:image/png;base64,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");
}

.stripe-connect.light-blue span:before {
  background-image: url("data:image/png;base64,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");
}

/* Retina support */
@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
       only screen and (min--moz-device-pixel-ratio: 1.5),
       only screen and (min-device-pixel-ratio: 1.5) {

  .stripe-connect span:before, .stripe-connect.blue span:before {
    background-image: url("data:image/png;base64,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");
  }

  .stripe-connect.light-blue span:before {
    background-image: url("data:image/png;base64,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");
  }
}


  

</style>

    
  </head>
  <body data-spy="scroll" data-target="#navigation" data-offset="120">
    <div id="all">
      <!-- navbar-->
      <header class="header navbar navbar-default navbar-fixed-top">
       <!--  <div role="navigation" class="navbar navbar-default navbar-fixed-top">
          <div class="container"> -->
            <!-- <div class="navbar-header"> -->
            <!-- <a href="index.php" class="navbar-brand"><img src="landing/img/logo.png" alt="logo" class="hidden-xs hidden-sm"><img src="landing/img/logo-small.png" alt="logo" class="visible-xs visible-sm"><span class="sr-only"></span></a> -->
            <!--   <div class="navbar-buttons">
                <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn"><i class="pe-7s-menu"></i></button>
              </div> -->
           <!--  </div> -->
            <!-- <div id="navigation" class="collapse navbar-collapse navbar-right"> -->
              <ul class="nav navbar-nav">
                <!-- <li><a href="#features" class="scroll-to">Features</a></li>
                <li><a href="#text" class="scroll-to">Text </a></li>
                <li><a href="#integrations" class="scroll-to">Integrations</a></li>
                <li><a href="#testimonials" class="scroll-to">Testimonials</a></li> -->
               <!--  <li><a href="#features" class="scroll-to">C'est quoi aventour.net?</a></li> -->
              </ul>
              <a style="margin-left: 1em;" href="/" class="btn navbar-btn btn-ghost"><span class="lead">Aller sur la page d'acceuil </span></a>
            <!-- </div> -->
         <!--  </div>
        </div> -->
      </header>
      <!-- *** SIGNUP MODAL ***_________________________________________________________
      -->
   <!--    <div id="get-started" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
              <h4 class="modal-title text-center">Get started</h4>
            </div>
            <div class="modal-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input id="email_modal" type="text" placeholder="name@company.com" class="form-control">
                </div>
                <p class="text-center">
                  <button class="btn btn-primary"><i class="pe-7s-magic-wand"></i> Sign up</button>
                </p>
              </form>
              <p class="text-center text-muted">Effects present letters inquiry no an removed or friends. Desire behind latter me though in.</p>
            </div>
          </div>
        </div>
      </div> -->
      <!-- *** SIGNUP MODAL END ***-->
      <section id="intro" class="text-intro">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1><?php echo $_GET['error_description'];  ?></h1>
              <h3>Essayons encore une fois? </h3>
             <!--  Les "trucs et astuces" pour prévenir un dégât des eaux
Dites moi seulement à quelle adresse je dois vous l'envoyer ! -->
              <!-- <h3 class="weight-300"> AvenTour.net: Activité touristique avec l'habitant</h3> -->
                
              <!-- <h1> <span class="rotate">La Reunion - L'ile Intense, Paris et ses secrets , Une autre manière de voir cette ville, Pars à l'aventure</span> </h1> -->
              <!-- <h3 class="weight-300">It is SEO friendly, responsive and free.</h3> -->
              <!-- <h3 class="weight-300"> Dites moi seulement à quelle adresse je dois vous l'envoyer !!</h3> -->
               <!-- <h3 class="weight-300">Guide en cours de rédaction- Décembre 2016</h3> -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4"> 
              
              <!-- <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_A1uX6VZKdg0FbPI41ECr28FF1ExhEv8M&scope=read_write" class="stripe-connect"><span>Connect with Stripe</span></a> -->
              <?php //include 'maillanding1.php' ?>
           <form role="form" action="access.php" method="post">
           	
    
      <div class="form-group col-md-6">
 <input type="text" class="form-control" id="" name="fname" placeholder="Prenom*" value="<?php echo $_SESSION['fname_inscription_affiliation'];?>" required>
    </div>
      <div class="form-group col-md-6">
 <input type="text" class="form-control" id="" name="lname" placeholder="Nom*" value="<?php echo $_SESSION['lname_inscription_affiliation']; ?>" required>
    </div>
     <div class="form-group"> 
    
        <input type="email" class="form-control" id="" name="email" placeholder="Email*" value="<?php echo $_SESSION['email_inscription_affiliation']; ?>" required>
    </div>
    <div class="form-group">
 <input type="text" class="form-control" id="" name="website" placeholder="Site web*" value="<?php echo $_SESSION['website_inscription_affiliation'];?>" required>
    </div>

     <div class="form-group">
        <label for="inputPassword">Autres supports</label> 
  
           <textarea class="form-control" rows="5" id="comment" name="support" placeholder="facebook, twitter,..."><?php echo $_SESSION['support_inscription_affiliation']; ?></textarea>
    </div>
  
    <div class="form-group col-md-12">
    	 <label> </label>
    <button type="submit" class="btn btn-lg btn-block btn-primary">Creer compte affiliation (Stripe)</button>
       <!-- <input type="submit" name="submit" id="login-submit" tabindex="4" class="btn btn-lg btn-block btn-primary" value="Continuer"> -->
                                            
        
    </div>
</form>
            </div>
          <!--   <div class="col-md-12 col-lg-8 col-lg-offset-2">
              <p class="margin-bottom--zero"><img alt="" src="landing/img/features3.png" class="img-responsive"></p>
              <p class="margin-bottom--zero">       <a href="index.php" class="btn btn-primary">Page d'acceuil</a></p>
       
            </div> -->
         
      </section>
      


      <!-- <footer class="footer">
        <div class="footer__copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>&copy;2016 Best company</p>
              </div>
              <div class="col-md-6">
                <p class="credit pull-right">Template by <a href="http://bootstrapious.com/landing-pages" class="external">Bootstrapious</a></p>
               </div>
            </div>
          </div>
        </div>
      </footer> -->

    <!--   <footer class="footer-distributed" id="end">

		<?php //include 'footer.php' ?>

		</footer> -->
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="landing/js/bootstrap.min.js"> </script>
    <script src="landing/js/jquery.cookie.js"> </script>
    <script src="landing/js/ekko-lightbox.js"></script>
     <script src="landing/js/jquery.simple-text-rotator.min.js"></script>
    <script src="landing/js/jquery.scrollTo.min.js"></script>
    <script src="landing/js/owl.carousel.min.js"></script>
    <script src="landing/js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6&appId=731663666968594";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
     <script>
    //   (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    //   function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    //   e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    //   e.src='//www.google-analytics.com/analytics.js';
    //   r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));


    //   ga('create','UA-XXXXX-X');ga('send','pageview');

    function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});


    // </script>
  </body>
</html>