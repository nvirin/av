<?php 
session_start();
if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');

      die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour réserver un tour =P <br><a href="http://www.aventour.net/signinregister/index.php">Se connecter</a></h1></div></html');


}elseif(false/*!((isset($_GET['mytrip'])&&file_exists('../users/'.$_GET['mytrip'])))*/){
 //header('Location: http://www.aventour.io/myindexdev.php');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(false/*!isset($_GET['mytour'])*/){
    //header('Location: http://www.aventour.io/myindexdev.php');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>2 d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}else{ 

    $mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }


    try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mapresentation FROM user WHERE mail= ?');

//$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa, user.mapresentation FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE mail= ?');
//
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($mailstring));



if (!( $req->rowCount() == 1 )) {
  // do something here
   // header('Location: http://www.aventour.io/myindexdev.php');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{


    while ($donnees = $req->fetch())
{
    //$idtour=$donnees['idtour'];
    if(false/*!($idtour===$_GET['mytour'])*/){
          die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, ce tour n\'existe pas =/ <br><a href="http://www.aventour.net/">Page d\'acceuil</a></h1></div></html');



    }else{

        //tout c'est bien passé!!!!!! good!!
       // echo "good!";
        //var_dump($donnees);

       
    $nomBD=$donnees['nom'];
$prenomBD=$donnees['prenom'];
$voteBD=$donnees['vote'];
$nombrevoteBD=$donnees['nombrevote'];
$nombrefbBD=$donnees['nombrefb'];
$lv1BD=$donnees['lv1'];
$lv2BD=$donnees['lv2'];
$lv3BD=$donnees['lv3'];
$mapresentationBD=$donnees['mapresentation'];


$couverturepresent=false;
$pathcouverture=$_SERVER['DOCUMENT_ROOT'].'/users/'.$mailhex.'/couverture.jpg';
$pathcouv='../users/'.$mailhex.'/couverture.jpg';
  if (file_exists($pathcouverture)) {
   // mkdir($path, 0777, true);
    $couverturepresent=true;
}

 
    }

    
    
}



}
  










}


 ?>




 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, Visites touristiques avec des particuliers">
<META NAME="KEYWORDS" CONTENT="visites touristiques, particuliers, aventures, découvertes, voyages">
<META NAME="ROBOTS" CONTENT="noindex,nofollow">
    <title>Aventour-Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
   <!--  <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Start Bootstrap</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >About</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav> --> 

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
                <a class="navbar-brand" href="http://aventour.net/">AvenTour.net</a>
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
                        <a href="http://aventour.net/creationaventoursuite.php">Créer tour</a>
                    </li>
                    <li style="
    margin-right: 10px;
    margin-top: 5px;
">
                        <?php include '../conectionoupas.php' ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <header id="top" class="header" style='<?php  if($couverturepresent){echo ' 
    background: url('.$pathcouv.') no-repeat center center scroll;
    webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;' 

    ;}else{
        echo ' 
    background: url(../images/001.jpg) no-repeat center center scroll;
    webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;' 

    ;


        }?>'
    "
    
"

>
        <div class="col-md-12 text-center" style="
    bottom: 50%;
    position: absolute;
">
            <h1><?php //echo $couverturepresent.' '.$pathcouv; ?></h1>
            <h3></h3>
            <br>
            <a style="
    position: absolute;
    right: 2%;
" class="hidden" ></a> 
        </div>

         <div class="col-lg-12" style="
    position: absolute;
    bottom: 0%;
    background-color: rgba(0, 0, 0, 0.25);
        padding-right: 36%;
">


<div class="col-md-12">
                         <img src='../users/<?php echo $mailhex; ?>/profile.jpg' alt="Scott Stevens" class="img-responsive img-circle" style="
    max-width: 25%;" />
                         </div>

                         <div class="col-md-12">

           <h1 style="
    color: white;
"><?php echo $prenomBD.' '.$nomBD[0].'.'; ?></h1>
</div>

<p style="
    color: white;
"> </p>
            <!-- <h3>Free Bootstrap Themes &amp; Templates</h3> -->
            <br>
            <a style="
    position: absolute;
    right: 2%;
"class="hidden"></a>
        </div>
    </header>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 style="font-style: italic;" class="section-heading"><?php echo $mapresentationBD; ?></h4> 
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 text-center"> 
                    <div class="service-box">
                        <i class="fa fa-4x fa-comments-o wow bounceIn text-primary"></i>
                        <h3>Je parle, me débrouille ou veux m'améliorer en:</h3>
                        <p class="text-muted">Français</p>
                        <p class="text-muted">Anglais</p>
                        <p class="text-muted">Allemand</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Détails</h3>
                        <p class="text-muted"><i class="fa fa-star fa-1x"></i>  <?php echo $voteBD; ?>/5 (<?php echo $nombrevoteBD; ?> votes)</p>
                        <p class="text-muted"><i class="fa fa-facebook-square fa-1x"></i>  <?php echo $nombrefbBD; ?> ami(e)s</p>
                        <!-- <p class="text-muted"><i class="fa fa-birthday-cake fa-1x"></i>  24 ans</p> -->
                        <!-- <p class="text-muted">You can use this theme as is, or you can make changes!</p> -->
                    </div>
                </div>
              <!--   <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- About -->
    <section >
        

       
    </section>

 <section>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-8">
           
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<!-- <div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div> -->

          

           

            <!-- <form id="defaultForm" method="post" class="form-horizontal" action="ajaxSubmit.php">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="username" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email address</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </form> -->
        </div>
    </div>
</div>
</section>
   


    <!-- Callout -->
   <!--  <aside class="callout">
        <div class="text-vertical-center">
            <h1>Vertically Centered Text</h1>
        </div>
    </aside> -->



    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <!-- <h2>Our Work</h2> -->
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="../images/bg/1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="../images/bg/3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="../images/bg/p1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="../images/bg/p2.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <!-- <a href="#" class="btn btn-dark">View More Items</a> -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
//     // Closes the sidebar menu
//     $("#menu-close").click(function(e) {
//         e.preventDefault();
//         $("#sidebar-wrapper").toggleClass("active");
//     });


//     // Opens the sidebar menu
//     $("#menu-toggle").click(function(e) {
//         e.preventDefault();
//         $("#sidebar-wrapper").toggleClass("active");
//     });

//     // Scrolls to the selected menu item on the page
//     $(function() {
//         $('a[href*=#]:not([href=#])').click(function() {
//             if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

//                 var target = $(this.hash);
//                 target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//                 if (target.length) {
//                     $('html,body').animate({
//                         scrollTop: target.offset().top
//                     }, 1000);
//                     return false;
//                 }
//             }
//         });
//     }




//     );
//     </script>


        <script>
//         var prix=parseInt('<?PHP echo $_prix?>');
//         var min=parseInt('<?PHP echo $_min?>');
//         var max=parseInt('<?PHP echo $_max?>');
//         var prixsupp=parseInt('<?PHP echo $_prixsupp?>');
//        alert("min: "+min+" max: "+max+" prixsupp: "+prixsupp+" prix: "+prix);



//         //alert(prix);
//         var total = 0;
//       var nombretouriste=parseInt($('#touriste').val());
//    if((min<=nombretouriste)&&(nombretouriste<=max)){


  
//             //total = nombretouriste*prix;
//             total = prix;
//             _total =  total;  

//              }else{
//                 total = 1*prix; 
//                 total=total +prixsupp*(nombretouriste-max);
//                 _total =  total;



//              }
//              total=Math.ceil(total*1.25);
//              frais=total-_total;
       
    
//     $('#Payment').val(total);
//      $('#total').val(total);
//      $('.total span').text(total);
//       $('.frais span').text(frais);
//    $('.prix span').text(nombretouriste+" Touriste(s): "+_total);

         
  
            

//         $('#touriste').on('change',function(){
//             //$('.total span').append(total);
  
//     var total = 0;
//       var nombretouriste=parseInt($('#touriste').val());
//    if((min<=nombretouriste)&&(nombretouriste<=max)){


  
//             //total = nombretouriste*prix;
//             total = prix;
//             _total =  total;  

//              }else{
//                 total = 1*prix;
//                 total=total +prixsupp*(nombretouriste-max);
//                 _total =  total;



//              }
//              total=Math.ceil(total*1.25);
//              frais=total-_total;
       
    
//     $('#Payment').val(total.toFixed(2));
//      $('#total').val(total.toFixed(2));
//      $('.total span').text(total);
//       $('.frais span').text(frais);
//       $('.prix span').text(nombretouriste+" Touriste(s): "+_total);
// });


                    </script> 

</body>

</html>
