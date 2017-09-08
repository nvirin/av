<?php 



require 'test/facebook/src/Facebook-fixed/autoload.php';
session_start();

$fb = new Facebook\Facebook([
  'app_id' => '731663666968594',
  'app_secret' => 'd72fd809c3d15380514316bc81080bb1',
  'default_graph_version' => 'v2.5',
  'allowSignedRequest' => false 
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = array(
  'email','user_friends' 
);
$loginUrl = $helper->getReRequestUrl('http://www.aventour.net/signinregister/test/facebook/fb-callback.php', $permissions);
//echo "coucou";
// var_export($_SESSION);

$_SESSION['login_user']= "coucou1";
// echo $_SESSION['login_user'];

// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

$_SESSION['login_user_erreur']='';

//require_once __DIR__ . 'facebook-php-sdk-v4/src/Facebook/autoload.php';

?>

<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Se connecter sur aventour: Visite touristique avec un particulier Paris, Ile de La Réunion,... - AvenTour</title>

    <META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, Visites touristiques avec des particuliers">
<META NAME="KEYWORDS" CONTENT="visites touristiques, particuliers, aventures, découvertes, voyages">
<META NAME="ROBOTS" CONTENT="noindex,nofollow">
<META NAME="REVISIT-AFTER" CONTENT="15">


    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/icone.png">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    

    

    

<!-- <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> 

<?php 

// require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
// $fb = new Facebook\Facebook([
//   'app_id' => '{731663666968594}',
//   'app_secret' => '{d72fd809c3d15380514316bc81080bb1}',
//   'default_graph_version' => 'v2.5',
//   ]);
?>
<!-- Web Fonts -->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
 -->
<!-- Bootstrap core CSS -->
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">


<!-- Font Awesome CSS -->
<link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet">



<!-- Plugins -->
<link href="css/animations.css" rel="stylesheet">

<!-- Worthy core CSS file -->
<link href="../css/style.css" rel="stylesheet">





<!-- Custom css --> 
<link href="../css/custom.css" rel="stylesheet">

<script type="text/javascript">

    

    $(function() {

//     $('#login-form-link').click(function(e) {
//         $("#login-form").delay(100).fadeIn(100);
//         $("#mc-embedded-subscribe-form").fadeOut(100);
//         $('#register-form-link').removeClass('active');
//         $(this).addClass('active');
//         e.preventDefault();
//     });
//     $('#register-form-link').click(function(e) {
//         $("#mc-embedded-subscribe-form").delay(100).fadeIn(100);
//         $("#login-form").fadeOut(100);
//         $('#login-form-link').removeClass('active');
//         $(this).addClass('active');
//         e.preventDefault();
//     });

// });

</script>

<style type="text/css">

#mybody{
    /*padding-top: 90px;*/
    background-color: #EDEFED;
    }
    
        #login-form-link, #register-form-link  {

    /*padding-top: 90px;*/
    background-color: rgba(255, 255, 255, 0);
}

.panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    /*color: #666;*/
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    color: #029f5b;
    font-size: 18px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus { 
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}
.btn-login {
    background-color: #59B2E0;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
    color: #fff;
    background-color: #53A3CD;
    border-color: #53A3CD;
}
.forgot-password {
    text-decoration: underline;
    color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
    text-decoration: underline;
    color: #666;
}

.btn-register {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
    color: #fff;
    background-color: #1CA347;
    border-color: #1CA347;
}

 a#myFb{
border-color: #2d5073;
    background-color: #3b5998;
    background-image: url(http://icons.iconarchive.com/icons/danleech/simple/512/facebook-icon.png);
    background-size: auto 100%;
    background-position: left center;
    background-repeat: no-repeat;
}

/*Facebook Connect Button Hover*/
a:hover#myFb{
/*background:#dd0000;  background color of the Facebook Connect Button when you hover over it */
}

 
</style>






</head>

<body class="no-trans" id="mybody">




    <section class="bg-primary" style="background-color: #EDEFED; padding-top: 10%;">
        <div class="container" id="mySign">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                        <hr>
                            
                            <div class="col-xs-12">
                           <!--  <div class="social-wrap a">
    <button id="facebook">Sign in with Facebook</button>
  
</div>  -->
                                <!-- <span class="input-group-addon"><i class="fa fa-facebook-square"></span> -->
                                <!-- <div class="social-wrap a"> -->
                                <a id="myFb" href=<?php echo '"' . $loginUrl . '"'; ?> id=""></i>Continuer avec Facebook</a>
                                <!-- </div>  -->

                            </div>
                        </div>
                       
                    </div>

            
                    <div class="panel-body">
                        <div class="row"> 
                        <div class="col-lg-12">
                                <h3 href="#" class="active" id="login-form-link">OU</h3>
                               <hr class="primary">
                            </div>
                            
                            <div class="col-lg-12"> 
                                <form id="login-form" action="../signinregister/confirmlogin.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
                                    </div>
                                    <!-- <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label> 
                                    </div> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="mdp.php" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
                                                </div>
                                                <hr class="primary">

                                                <div class="col-lg-12">
                                                <div class="text-right">
                                                    <!-- <a href="../signinregister/registme.php" tabindex="5" class="forgot-password">S'enregistrer</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    
                                                    <p style="color: #888888;">En continuant j'approuve avoir lu et accepte les conditions générales de services: <a href="../cgs"  target = "_blank" tabindex="5" class="forgot-password">CGS</a></p>
                                                </div>
                                                <hr class="primary">

                                                <div class="col-lg-12">
                                                <div class="text-right">
                                                    <!-- <a href="../signinregister/registme.php" tabindex="5" class="forgot-password">S'enregistrer</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                                </div>








                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    </section>





</body>
        
                            


                        

        <!-- JavaScript files placed at the end of the document so the pages load faster
        ================================================== -->

        

        
        
        <!-- Jquery and Bootstap core js files -->
        
        <script type="text/javascript" src="../plugins/jquery.min.js"></script>
         <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> 

       



       
        
        

        <!-- Load jQuery JS -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!-- Load jQuery UI Main JS  -->
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>





    </body>
    </html>
