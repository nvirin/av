<?php 
session_start();
//var_dump($_SESSION);die();


// $_SESSION['login_user']= "coucou";
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';
if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    header('Location: http://www.aventour.net/en/signinregister/index.php');
    // header('Location: http://www.aventour.net/connectetoi.html');

}elseif(/*!isset($_SESSION['title'])*/false){
 header('Location: creationaventoursuite.php');
}elseif(!((isset($_GET['mytrip'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_GET['mytrip'])))){
 header('Location: http://www.aventour.net/en/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!isset($_GET['mytour'])){
    header('Location: http://www.aventour.net/en/'); 
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>2 d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}else{

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1])); 
    }

        $req0 = $bdd->prepare('SELECT * FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
//$tour = $bdd->quote($_GET['mytour']);
$tour = $_GET['mytour'];
$req0->execute(array($tour));

if (!( $req0->rowCount() == 1 )) {
  // do something here
  // var_dump($tour);
  // die();
    header('Location: http://www.aventour.net/en/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{


 //$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage,voyage.locationDeparture, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
$req = $bdd->prepare('SELECT voyage.prix, voyage.prixsupp, voyage.pasdeperssup FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');

 $req->execute(array($tour));
$result = $req->fetch(PDO::FETCH_ASSOC);

$prix=$result['prix'];
$prixsupp=$result['prixsupp'];
$pasdeperssup=$result['pasdeperssup'];
//print_r($result);
// $title=$result['title'];
// $lieu_voyage=$result['lieu_voyage'];
// $locationDeparture=$result['locationDeparture'];
// $date_voyage=$result['date_voyage'];
// $heure_voyage=$result['heure_voyage'];
// $duree_voyage=$result['duree_voyage'];
// $min_personne=$result['min_personne'];
// $max_personne=$result['max_personne'];

// $tag1=$result['tag1'];
// $tag2=$result['tag2'];
// $tag3=$result['tag3'];

// $lv1=$result['lv1'];
// $lv2=$result['lv2'];
// $lv3=$result['lv3'];
// $phonenumber=$result['phonenumber'];
// $mapresentation=$result['mapresentation'];








}












}
//echo "post : ";var_dump($_POST); echo "<br> session : ";var_dump($_SESSION);
// $duree=$_SESSION['duree'];
// $minimum=$_SESSION['minimum'];
// $maximum=$_SESSION['maximum'];
// $prix= (($maximum+$minimum)/2)*$duree*12;
// $prix= (int)$prix +1;
//echo $prix;

if($prix>100){
    //$prix=100;


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
    <link rel="shortcut icon" href="http://www.aventour.net/images/icone.png">
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
<link href="http://www.aventour.net/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Bootstrap -->
    <link href="http://www.aventour.net/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<!-- Bootstrap Form Helpers -->
    <link href="http://www.aventour.net/signinregister/dist/css/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">
     <script src="http://www.aventour.net/js/simple-slider.js"></script>

  <link href="http://www.aventour.net/css/simple-slider.css" rel="stylesheet" type="text/css" />
  <link href="http://www.aventour.net/css/simple-slider-volume.css" rel="stylesheet" type="text/css" />  


<!-- Font Awesome CSS -->
<link href="http://www.aventour.net/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">



<!-- Plugins -->
<link href="http://www.aventour.net/css/animations.css" rel="stylesheet">

<!-- Worthy core CSS file -->
<link href="http://www.aventour.net/css/style.css" rel="stylesheet">





<!-- Custom css --> 
<link href="http://www.aventour.net/css/custom.css" rel="stylesheet">



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





    <section class="bg-primary" style="background-color: #EDEFED; padding-top: 2%;">
        <div class="container" id="mySign">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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
                                <form id="login-form" action="editerconfirmation.php" method="post" role="form" style="display: block;">


                                    <div class="form-group col-md-12 col-xs-12" > 
                                    <!-- <h4>Prix minimal conseillé: <?php //echo $prix." €" ?></h4> -->
                                    <!-- <br><h5>Ce prix a été calculé en fonction des valeurs que vous avez entrée.</h5> -->
                                    <br><h5>N'hésiter pas à le Réajuster!</h5>

                                    
                                        <!-- <input type="number"  step="1" value=<?php //echo "\"".$prix."\"" ?> min="5" max="100" name="prix" id="title" tabindex="1" class="form-control" placeholder=""> -->
                                        <div class="col-md-12 jumbotron">
                                          <h3>Prix pour un groupe de <?php echo $minimum; ?> à <?php echo $maximum; ?> touristes</h3>
                                           <h5>Dont 15% de commission</h5>
                                       <input type="text" name="prix" id="title" class="form-control" tabindex="1" data-slider="true" value=<?php echo "\"".$prix."\"" ?> data-slider-highlight="true" data-slider-theme="volume" data-slider-range="5,1000">
                                        </div>
                                         <div class="col-md-12">
                                         <h6 style="font-size: 5em;">+</h6>
                                         </div>
                                        <div class="col-md-12 jumbotron">
                                        <h3>Prix par personne supplémentaire</h3>
                                         <h5>Dont 15% de commission</h5>
                                       <input type="text" name="sup" id="title" class="form-control" tabindex="1" data-slider="true" value=<?php echo "\"".$prixsupp."\"" ?> data-slider-highlight="true" data-slider-theme="volume" data-slider-range="0,300">
                                       <br>  

                                       <h4><input type="checkbox" name="pasdeperssup" <?php if($pasdeperssup=='on'){echo 'checked';}else{echo '';} ?>> Pas de personne(s) supplémentaire(s)</h4> 
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

 


                                     
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="go-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Continuer">
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
    </section>





</body>
        
                            


                        

       

        
        
 





    </body>
    </html>
