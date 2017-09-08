<?php 
session_start();
//var_dump($_SESSION);die();


// $_SESSION['login_user']= "coucou";
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';
if(!((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid'])))){
    header('Location: signinregister/index.php');

}elseif(!isset($_SESSION['title'])){
 header('Location: creationaventoursuite.php');
}
//echo "post : ";var_dump($_POST); echo "<br> session : ";var_dump($_SESSION);
$duree=$_SESSION['duree'];
$minimum=$_SESSION['minimum'];
$maximum=$_SESSION['maximum'];
$mini=1;
$maxi=1;
$prix= (($maxi+$mini)/2)*$duree*12*2.5;
$prix= (int)$prix +1;
//echo $prix;

if($prix>100){
    //$prix=100;


}



if(false/*isset($_POST['go-submit'])*/){

    $_POST['go-submit']="";
   // echo "hello";

//     echo $_SESSION['location'];
// echo $_SESSION['title'];
// echo $_SESSION['datepicker'];
// echo $_SESSION['time'];
// echo $_SESSION['duree'];
// echo $_SESSION['tag1'];
// echo $_SESSION['tag2'];
// echo $_SESSION['tag3'];
// echo $_SESSION['minimum'];
// echo $_SESSION['maximum'];

$prix=$_POST['prix'];

// echo $_POST['prix'];
// echo $_POST['details'];

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



$req = $bdd->prepare("INSERT INTO `ma_base`.`voyage` (`date_voyage`, `heure_voyage`, `lieu_voyage`, `locationDeparture`, `duree_voyage`, `tag1`, `tag2`, `tag3`, `prix`, `min_personne`, `max_personne`, `detail_voyage`, `done`, `id_mail`) VALUES (:date_voyage, :heure_voyage, :lieu_voyage, :locationDeparture, :duree_voyage, :tag1, :tag2, :tag3, :prix, :min_personne, :max_personne, :detail_voyage, :done, :id_mail)");
    $req->execute(array(
            "date_voyage" => $_SESSION['datepicker'], 
            "heure_voyage" => $_SESSION['time'],
            "lieu_voyage" => $_SESSION['location'],
            "locationDeparture" => $_SESSION['locationDeparture'],
            "duree_voyage" => $_SESSION['duree'],
         

            "tag1" => $_SESSION['tag1'], 
            "tag2" => $_SESSION['tag2'],
            "tag3" => $_SESSION['tag3'],
            "prix" => $_POST['prix'],

            "min_personne" => $_SESSION['minimum'],
            "max_personne" => $_SESSION['maximum'],
            "detail_voyage" => $_POST['details'],
            "done" => '0',
            "id_mail" => $_SESSION['mail'],
            
            ));
$req->closeCursor(); 

// $_SESSION['location']="";
// $_SESSION['title']="";
// $_SESSION['datepicker']="";
// $_SESSION['time']="";
// $_SESSION['duree']="";
// $_SESSION['tag1']="";
// $_SESSION['tag2']="";
// $_SESSION['tag3']="";
// $_SESSION['minimum']="";
// $_SESSION['maximum']="";



// $_POST['prix']="";
// $_POST['details']="";

echo "Tour créé";

sleep(5);
header("location: index.php");


}else{

//     $_SESSION['location']=$_POST['location'];
// $_SESSION['title']=$_POST['title'];
// $_SESSION['datepicker']=$_POST['datepicker'];
// $_SESSION['time']=$_POST['time'];
// $_SESSION['duree']=$_POST['duree'];
// $_SESSION['tag1']=$_POST['tag1'];
// $_SESSION['tag2']=$_POST['tag2'];
// $_SESSION['tag3']=$_POST['tag3'];
// $_SESSION['minimum']=$_POST['minimum'];
// $_SESSION['maximum']=$_POST['maximum'];
// echo $_SESSION['location'];
// echo $_SESSION['title'];
// echo $_SESSION['datepicker'];
// echo $_SESSION['time'];
// echo $_SESSION['duree'];
// echo $_SESSION['tag1'];
// echo $_SESSION['tag2'];
// echo $_SESSION['tag3'];
// echo $_SESSION['minimum'];
// echo $_SESSION['maximum'];




// $duree=$_SESSION['duree'];
// $minimum=$_SESSION['minimum'];
// $maximum=$_SESSION['maximum'];
// if($duree<3){
//   $k=10;  
// }elseif($duree<6){
//   $k=7,5;  
// }elseif($duree<7){
//   $k=7;  
// }elseif($duree<8){
//   $k=6,5;  
// }elseif($duree<9){
//   $k=6;  
// }elseif($duree<10){
//   $k=5,5;  
// }elseif($duree<11){
//   $k=5;  
// }elseif($duree<13){
//   $k=5;  
// }

// $prix= (($maximum+$minimum)/2)*$duree*12;
// $prix= (int)$prix +1;
// echo $prix;

if($prix>100){
   // $prix=100;


}


}



//$_SESSION['prix']=$prix;


?>






<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Etape 2 creation activité touristique - AvenTour</title>

    <META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, Visites touristiques avec des particuliers">
<META NAME="KEYWORDS" CONTENT="visites touristiques, particuliers, aventures, découvertes, voyages">
<META NAME="ROBOTS" CONTENT="noindex,nofollow">
<META NAME="REVISIT-AFTER" CONTENT="15">


    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/icone.png">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>


    

    

    

<!-- <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> 

<?php 

// require_once __DIR__ . '/lib/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
// $fb = new Facebook\Facebook([
//   'app_id' => '{731663666968594}',
//   'app_secret' => '{d72fd809c3d15380514316bc81080bb1}',
//   'default_graph_version' => 'v2.5',
//   ]);
?>
<!-- Web Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<!-- Bootstrap Form Helpers -->
    <link href="signinregister/dist/css/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">
     <script src="js/simple-slider.js"></script>

  <link href="css/simple-slider.css" rel="stylesheet" type="text/css" />
  <link href="css/simple-slider-volume.css" rel="stylesheet" type="text/css" />  


<!-- Font Awesome CSS -->
<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">



<!-- Plugins -->
<link href="css/animations.css" rel="stylesheet">

<!-- Worthy core CSS file -->
<link href="css/style.css" rel="stylesheet">





<!-- Custom css --> 
<link href="css/custom.css" rel="stylesheet">



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
    color: #666;
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



  [class^=slider] { display: inline-block; margin-bottom: 30px; }
  .output { color: #888; font-size: 14px; padding-top: 1px; margin-left: 5px; vertical-align: top;color: black;font-size: xx-large;}
  h1 { font-size: 20px; }
  h2 { clear: both; margin: 0; margin-bottom: 5px; font-size: 16px; }
  p { font-size: 15px; margin-bottom: 30px; }
  h2:first-of-type { margin-top: 0; }
  </style>







</head>

<body class="no-trans" id="mybody">

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top" style="
    background-color: rgb(0, 0, 0);
">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://aventour.net/en/">AvenTour.net</a>
            </div> 

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <!--  <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li> -->
                    <li> 
                        <a href="http://aventour.net/en/creationaventoursuite.php">Créer tour</a>
                    </li>
                    <li style="
    margin-right: 10px;
    margin-top: 5px;
">
                        <?php //include 'conectionoupas.php' ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>




    <section class="bg-primary" style="background-color: #EDEFED; padding-top: 2%;">
        <div class="container" id="mySign">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>ETAPE 2</h3>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="creationconfirmation.php" method="post" role="form" style="display: block;">


                                    <div class="form-group" > 
                                    <!-- <h4>Prix minimal conseillé: <?php //echo $prix." €" ?></h4> -->
                                    <!-- <br><h5>Ce prix a été calculé en fonction des valeurs que vous avez entrée.</h5> -->
                                    <br><h5>N'hésiter pas à le Réajuster!</h5>

                                    
                                        <!-- <input type="number"  step="1" value=<?php //echo "\"".$prix."\"" ?> min="5" max="100" name="prix" id="title" tabindex="1" class="form-control" placeholder=""> -->
                                        <div class="jumbotron">
                                          <h3>Prix pour un groupe de <?php echo $minimum; ?> à <?php echo $maximum; ?> touristes</h3>
                                           <h5>Dont 29% de commission</h5>
                                       <input type="text" name="prix" id="title" class="form-control" tabindex="1" data-slider="true" value=<?php echo "\"".$prix."\"" ?> data-slider-highlight="true" data-slider-theme="volume" data-slider-range="5,1000">
                                        </div>
                                         <div class="col-md-12">
                                         <h6 style="font-size: 5em;">+</h6>
                                         </div>
                                        <div class="jumbotron">
                                        <h3>Prix par personne supplémentaire</h3>
                                         <h5>Dont 29% de commission</h5>
                                       <input type="text" name="sup" id="title" class="form-control" tabindex="1" data-slider="true" value="5" data-slider-highlight="true" data-slider-theme="volume" data-slider-range="0,300">
                                       <br>

                                       <h4><input type="checkbox" name="pasdeperssup"> Pas de personne(s) supplémentaire(s)</h4> 
                                       </div>
                                       <script>
  $("[data-slider]")
    .each(function () {
      var input = $(this);
      $("<span>")
        .addClass("output")
        .addClass("col-md-12")
        .insertAfter($(this));
    })
    .bind("slider:ready slider:changed", function (event, data) {
      $(this)
        .nextAll(".output:first")
          .html(data.value.toFixed(0)+" \u20AC");
    });
  </script>


                                    </div>

                                    


                               

       
          


                                    <!-- <div class="form-group col-md-12 col-xs-12" > 
                                    <h5>Détails:</h5>  
                                                                 
                                        

                                        <textarea type="text" rows="5" name="details" id="title" tabindex="1" class="form-control" placeholder="Ballade" value=""></textarea>
                                        
                                       
                                                                      
                                    </div> -->

                                    

                                   
                                   

                                    



        

  

  

                                    


                                     
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="go-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Continuer">
                                            </div>
                                        </div>
                                    </div>



                                   <!--  <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </form>








                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>





</body>
        
                            


                        

        <!-- JavaScript files placed at the end of the document so the pages load faster
        ================================================== -->

        

        
        
        <!-- Jquery and Bootstap core js files -->
        
        <script type="text/javascript" src="plugins/jquery.min.js"></script>
         <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 

         <!-- Bootstrap Form Helpers -->
    <link href="signinregister/dist/js/bootstrap-form-helpers.min.js" rel="stylesheet" media="screen">


       



       
        
        

        <!-- Load jQuery JS -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!-- Load jQuery UI Main JS  -->
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>  
        <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

    

        
        
        
        <script type="text/javascript">
        $('input').slider();
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>

<script src="js/jquery.datetimepicker.full.js"></script>

 





    </body>
    </html>
