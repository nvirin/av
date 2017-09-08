<?php 
session_start();
if(!((isset($_SESSION['myid'])&&file_exists('../users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');

      die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour réserver un tour =P <br><a href="http://www.aventour.net/signinregister/index.php">Se connecter</a></h1></div></html');


}elseif(!((isset($_GET['mytrip'])&&file_exists('../users/'.$_GET['mytrip'])))){
 header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!isset($_GET['mytour'])){
    header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>2 d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}else{ 


    try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248 
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($_GET['mytour']));



if (!( $req->rowCount() == 1 )) {
  // do something here
    header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{


    while ($donnees = $req->fetch())
{
    $idtour=$donnees['idtour'];
    if(!($idtour===$_GET['mytour'])){
          die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, ce tour n\'existe pas =/ <br><a href="http://www.aventour.net/">Page d\'acceuil</a></h1></div></html');



    }else{

        //tout c'est bien passé!!!!!! good!!
        //echo "good!";

        $passwordBD=$donnees['password'];
    $nomBD=$donnees['nom'];
$prenomBD=$donnees['prenom'];
$_prix=$donnees['prix'];
$_min=$donnees['min_personne'];
$_max=$donnees['max_personne'];
$_prixsupp=$donnees['prixsupp'];


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
    <title>Aventour-Reservation</title>

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

    <!-- Header -->
    <header id="top" class="header">
        <div class="col-md-12 text-center" style="
    bottom: 50%;
    position: absolute;
">
            <h1></h1>
            <h3></h3>
            <br>
            <a style="
    position: absolute;
    right: 2%;
" class="hidden" ></a>
        </div>

         <div class="col-lg-4 col-lg-offset-8" style="
    position: absolute;
    bottom: 0%;
    background-color: rgba(0, 0, 0, 0.25);
">
           <h1 style="
    color: white;
"><?php echo $_prix; ?> €</h1><p style="
    color: white;
">Groupe de <?php echo $_min; ?>-<?php echo $_max; ?> personne(s) + <?php echo $_prixsupp; ?> € /personnes supplémentaires</p>
            <!-- <h3>Free Bootstrap Themes &amp; Templates</h3> -->
            <br>
            <a style="
    position: absolute;
    right: 2%;
"class="hidden"></a>
        </div>
    </header>

    <!-- About -->
    <section ></section>

 <section>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-8">
           
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<!-- <div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div> -->

          

            <form class="well form-horizontal" method="post"  id="defaultForm" action="http://www.aventour.net/reserver/payment/index.php">
<fieldset>

<!-- Form Name -->
<legend><?php echo $_prix; ?> € /groupe de <?php echo $_min; ?> à <?php echo $_max; ?> personnes</legend><br>
<h5>+ <?php echo $_prixsupp; ?> € /personne supplémentaire</h5>
<h5 id="total"></h5>
<div class="prix"><p><span></span> €</p></div>
<div class="frais"><p>Frais: <span></span> €</p></div>
<div class="total"><p>TOTAL: <span></span> €</p></div>

<!-- Text input-->

<div class="form-group">
<div class="col-xs-12">
                                <h3>Nombre de personnes</h3>
                            </div>
  <label class="col-md-4 control-label"></label>  
    <div class="col-md-5 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select id="touriste" name="touriste" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option selected="selected" value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>                      

                    </select> 
                    <input type="text" class="hidden" id="Payment" name="Payment" value="0" readonly />
                     <input type="text" class="hidden" id="Payment" name="mytour" value=<?php echo "\"".$_GET['mytour']."\"" ;?> readonly />
                      <input type="text" class="hidden" id="Payment" name="mytrip" value=<?php echo "\"".$_GET['mytrip']."\"" ;?> readonly />
                      

                  
    </div>
  </div>
</div> 
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="submit" class="btn btn-warning" >Reserver <br>(Paypal or Visa via Paypal) <span class="glyphicon glyphicon-send"></span></button>
   
  </div>
</div>

</fieldset>
</form>

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

    <!-- Call to Action -->
  <!--   <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside> -->

   
    <!-- Footer -->
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });


    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    }


 

    );
    </script>


        <script>
        var prix=parseInt('<?PHP echo $_prix?>');
        var min=parseInt('<?PHP echo $_min?>');
        var max=parseInt('<?PHP echo $_max?>');
        var prixsupp=parseInt('<?PHP echo $_prixsupp?>');
      // alert("min: "+min+" max: "+max+" prixsupp: "+prixsupp+" prix: "+prix);



        //alert(prix);
        var total = 0;
      var nombretouriste=parseInt($('#touriste').val());
   if((min<=nombretouriste)&&(nombretouriste<=max)){


  
            //total = nombretouriste*prix;
            total = prix;
            _total =  total;  

             }else{
                total = 1*prix; 
                total=total +prixsupp*(nombretouriste-max);
                _total =  total;



             }
             total=Math.ceil(total*1.25);
             frais=total-_total;
       
    
    $('#Payment').val(total);
     $('#total').val(total);
     $('.total span').text(total);
      $('.frais span').text(frais);
   $('.prix span').text(nombretouriste+" Touriste(s): "+_total);

         
  
            

        $('#touriste').on('change',function(){
            //$('.total span').append(total);
  
    var total = 0;
      var nombretouriste=parseInt($('#touriste').val());
   if((min<=nombretouriste)&&(nombretouriste<=max)){


  
            //total = nombretouriste*prix;
            total = prix;
            _total =  total;  

             }else{
                total = 1*prix;
                total=total +prixsupp*(nombretouriste-max);
                _total =  total;



             }
             total=Math.ceil(total*1.25);
             frais=total-_total;
       
    
    $('#Payment').val(total.toFixed(2));
     $('#total').val(total.toFixed(2));
     $('.total span').text(total);
      $('.frais span').text(frais);
      $('.prix span').text(nombretouriste+" Touriste(s): "+_total);
});


                    </script> 

</body>

</html>
