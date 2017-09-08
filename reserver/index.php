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

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');
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

$pasdeperssup=$donnees['pasdeperssup'];

$_prixsuppTotzl=ceil($_prixsupp);

$_prixTotzl=ceil($_prix);


    }

    
    
}



}
  










}


 ?>




 

<!DOCTYPE html>
<html lang="fr">

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

    <!-- Worthy core CSS file -->
<link href="css/style.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/cust1.css" rel="stylesheet">

</head> 

<body>
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
                        <?php //include '../conectionoupas.php' ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
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

         <div class="col-lg-12" style="
    position: absolute;
    bottom: 0%;
    background-color: rgba(0, 0, 0, 0.25);
">
           <h1 style="
    color: white;
"><?php echo $_prixTotzl ?> €</h1><p style="
    color: white;
">Groupe de <?php echo $_min; ?>-<?php echo $_max; ?> personne(s)  <?php if($pasdeperssup){echo ' - Pas de personnes supplémentaires';}else{echo '+ '.$_prixsuppTotzl.' € /personnes supplémentaires';} ?> </p> 
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
        <div class="col-lg-12">
           
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<!-- <div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div> -->

          
 <!-- <form class="well form-horizontal text-center" method="post"  id="defaultForm" action="http://www.aventour.net/reserver/payment/paypal/index.php"> -->
            <form class="well form-horizontal text-center" method="post"  id="defaultForm" action="http://www.aventour.net/reserver/payment/stripe/index.php">
<fieldset>

<!-- Form Name -->
<legend><?php echo $_prixTotzl ?> € /groupe de <?php echo $_min; ?> à <?php echo $_max; ?> personnes<p> <?php if($pasdeperssup){echo 'Pas de personnes supplémentaires';}else{echo '+ '.$_prixsuppTotzl.' € /personnes supplémentaires';} ?></p></legend>

<h5 id="total"></h5>
<div class="prix"><p><span></span> €</p></div>
<hr>
<div class="frais"><p>Frais de réservation: <span></span> €</p></div>
<div class="totalsansfrais"><p>Reste à payer sur place: <span></span> €</p></div>
<!-- <div class="total"><p>TOTAL: <span></span> €</p></div> -->

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

    <?php if(!$pasdeperssup){echo ' 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option selected="selected" value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>   

                        ';}else{

                            for ($i=$_min; $i<$_max+1; $i++) {
    echo '<option value="'.$i.'">'.$i.'</option>';
}

                        ;} ?>                   

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
    <button type="submit" name="submit" class="btn btn-warning btn-block btn-lg" >Reserver - <div class="frais">Frais de réservation: <span></span> €</div></button>
   
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

<section>

<?php 



$locationFORM='paris';
$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }
try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.locationDeparture, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage,voyage.prerequis, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC, voyage.heure_voyage ASC, voyage.prix ASC');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
//$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.prerequis, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.birthday, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE lieu_voyage= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC, voyage.heure_voyage ASC, voyage.prix ASC');

$req->execute(array($_GET['mytour']));

// $req1 = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
// $req1->execute(array($emailFORM)); 
/*if($pasdegroupe){
         $_prixsuppTotzl=''; //ceil($donnees['prixsupp']).' €/personnes'

$Prix_=ceil($donnees['prixsupp']).' €/personnes';
  $groupe='';

       }*/

echo"<div class=\"\">
                <div class=\"\">
                   
                    
               ";
               echo " <ul class=\"\" id=\"contact-list\">";

                



while ($donnees = $req->fetch())
{
    


    $pathimage='../users/'.$donnees['mailhexa'].'/profile.jpg';
    //var_dump($pathimage);
    //die();
     if (!file_exists($pathimage)||isset($donnees['mailhexa'])) {
        //$pathimage='users/profile.jpg';
        //echo 'coucou';
    //mkdir($path, 0777, true);
}
$myDateTime = DateTime::createFromFormat('Y-m-d',$donnees['date_voyage'])->format('d/m/Y');
$myTime = DateTime::createFromFormat('H:i:s',$donnees['heure_voyage'])->format('H:i');


// $myDateTime = DateTime::createFromFormat('Y-m-d',$donnees['date_voyage'])->format('d/m/Y');

$AncienDateString = $myDateTime;
$idtour=$donnees['idtour'];

if($donnees['complet']==='0'){
    $myBoutonEtat='monBoutonPasComplet';
   $groupe=' /Groupe';
    //$Prix_=$donnees['prix'].' €';detail_voyage voyage.detail_voyage,
    $mdescription=$donnees['detail_voyage'];
    $mprerequis=$donnees['prerequis'];
    $pasdeperssup=$donnees['pasdeperssup'];
    if($pasdeperssup){
        $_prixsuppTotzl='Pas de personne supplémentaire';

    }else {
         $_prixsuppTotzl='+ '.ceil($donnees['prixsupp']).' €/pers supplémentaire';

    }


$Prix_=ceil($donnees['prix']).' €';


    $reserver=true; 
}else
{
    $myBoutonEtat='monBoutonComplet';
    $Prix_='Complet';
    $reserver=false;
    $groupe='';
   $mdescription='';
   $mprerequis='';
   $_prixsuppTotzl='';


}

$mbirthday='';
$birthday=$donnees['birthday'];
if(empty($birthday)){
    $mbirthday='';

}else{
    $myDatYeareTime = DateTime::createFromFormat('m/d/Y',$birthday);
$newYearBirhday = (int)$myDatYeareTime->format('Y');
$newYearBirhday=$year-$newYearBirhday;
if(empty($newYearBirhday)){
    $mbirthday='';

}else{
    $mbirthday='('.$newYearBirhday.')';

}
}

//var_dump($donnees);
    

echo" 


                                                        <!-- debut-->

                <li class=\"list-group-item\" style=\"padding: 1px;\">
                   <div data-toggle=\"\" data-target=\"#".$idtour."\" type=\"button\" id=\"".$myBoutonEtat."\" class=\"\">
                    
                        

                                                        <div class=\"col-md-12 text-center\" >
 <h4 class=\"modal-title\" id=\"project-10-label\" style=\"color: #6F6F6F;\"> ".$donnees['title']."</h4><hr>
                                       

                        <div class=\"col-md-2\">
                         <div class=\"col-md-12\">
                         <img src=\"".$pathimage."\" alt=\"\" class=\"img-responsive img-responsive1 img-circle center-block\" />
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\">".$donnees['prenom']." ".$donnees['nom'][0].".  $mbirthday</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-star fa-1x\"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-facebook-square fa-1x\"></i> ".$donnees['nombrefb']." ami(e)s</span><br/></span> 
                         </div>

                         <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-globe fa-1x\"></i> ".$donnees['lv1']." ".$donnees['lv2']." ".$donnees['lv3']."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class=\"col-md-7\">
                           
                            
                            <!-- <span class=\"name\"><i class=\"fa fa-tags fa-1x\"></i> </span><br/> -->
                             <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-calendar fa-lg\"></i> ".$myDateTime."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                             <div class=\"col-xm-12 col-md-10\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> ".strtoupper($donnees['lieu_voyage'])." à ".$myTime." (Durée: ~".$donnees['duree_voyage']."h)</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>

                              <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> Départ vers: ".strtoupper($donnees['locationDeparture'])."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>


                            
                            <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-tags fa-1x\"></i> ".$donnees['tag1'].", ".$donnees['tag2'].", ".$donnees['tag3']."</span><br/></span>                                                        
                            </div>

                        </div>
                        <div class=\"col-md-3\">
                           
                            <div class=\"col-md-12\">
                            <span class=\"name\">".$Prix_."</span> <span class=\"text-muted\">".$groupe."</span><br/>
                                                                                    
                            </div>
                            
                            <div class=\"col-md-12 text-center\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['min_personne']." à ".$donnees['max_personne']." Personne(s)</span><br/></span>                                                        
                            </div>

                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> <span class=\"text-muted\">".$_prixsuppTotzl."</span><br/></span>                                                        
                            </div>


                            
                        </div>
                         ";
                                        if($reserver&&!empty($mdescription)){echo "

                                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> 

                            <h3 class=\"text-muted\">Description</h3>
                            <span class=\"text-muted\">".$mdescription."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                            ";} 

                                            if($reserver&&!empty($mprerequis)){echo "

                                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> 

                            <h3 class=\"text-muted\">Prerequis</h3>
                            <span class=\"text-muted\">".$mprerequis."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                            ";} echo"
                        <div class=\"clearfix\"></div>
                       

                          <!-- fin -->
                                                        </div>
                                                      
                    </div></li>

                                                      
 

<!-- Modal -->
                            <div class=\"modal fade\" id=\"".$idtour."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"".$idtour."-label\" aria-hidden=\"true\">
                                <div class=\"modal-dialog modal-lg\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\" style=\"background-color: whitesmoke;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\" style=\"color: black;\">&times;</span><span class=\"sr-only\">Close</span></button>
                                            <h4 class=\"modal-title\" id=\"project-10-label\" style=\"color: #6F6F6F;\"> ".$donnees['title']."</h4>
                                        </div>
                                        <div class=\"modal-body\" style=\"background-color: rgb(245, 245, 245);\">
                                            <h3></h3>

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    
                                                    <section class=\"bg-primary\" style=\"background-color: rgb(245, 245, 245);\">

                                                    <div class=\"container\"  id=\"mail\">
                                                      <div class=\"row\">
                                                        <div class=\"col-md-12 text-center\" style=\"padding-top: 5px;\" padding-bottom: \"50px;\">

                                                        <!-- debut-->

                                                        <div id=\"monBoutonPasComplet\">
                    
                        <div class=\"col-md-2\">
                         <div class=\"col-md-12\">
                         <img src=\"".$pathimage."\" alt=\"Scott Stevens\" class=\"img-responsive img-circle center-block\" />
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\">".$donnees['prenom']." ".$donnees['nom'][0].".  $mbirthday</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-star fa-1x\"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-facebook-square fa-1x\"></i> ".$donnees['nombrefb']." ami(e)s</span><br/></span> 
                         </div>

                         <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-globe fa-1x\"></i> ".$donnees['lv1']." ".$donnees['lv2']." ".$donnees['lv3']."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class=\"col-md-7\">
                           
                            
                            <!-- <span class=\"name\"><i class=\"fa fa-tags fa-1x\"></i> </span><br/> -->
                             <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-calendar fa-lg\"></i> ".$myDateTime."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                             <div class=\"col-xm-12 col-md-10\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> ".strtoupper($donnees['lieu_voyage'])." à ".$myTime." (Durée: ~".$donnees['duree_voyage']."h)</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                            
                            <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-tags fa-1x\"></i> ".$donnees['tag1'].", ".$donnees['tag2'].", ".$donnees['tag3']."</span><br/></span>                                                        
                            </div>

                        </div>
                        <div class=\"col-md-3\">
                           
                            <div class=\"col-md-12\">
                             <span class=\"name\">".$Prix_."</span> <span class=\"text-muted\">".$groupe."</span><br/>
                                                                                    
                            </div>
                            
                            <div class=\"col-md-12 text-center\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['min_personne']." à ".$donnees['max_personne']." Personne(s)</span><br/></span>                                                        
                            </div>

                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> <span class=\"text-muted\">".$_prixsuppTotzl."</span><br/></span>                                                        
                            </div>


                            
                        </div>

                        ";
                                        if($reserver&&!empty($mdescription)){echo "

                                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> 

                            <h3 class=\"text-muted\">Description</h3>
                            <span class=\"text-muted\">".$mdescription."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                            ";} 

                                            if($reserver&&!empty($mprerequis)){echo "

                                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> 

                            <h3 class=\"text-muted\">Prerequis</h3>
                            <span class=\"text-muted\">".$mprerequis."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                            ";} echo"


                        <div class=\"clearfix\"></div>
                    </div>


                                                        <!-- fin -->
                                                        </div>
                                                      </div>
                                                    </div>
                                                            
                                                    </section>
                                                </div>
                                            </div>
                                        </div>";
                                         if($reserver){echo"
                                         <div class=\"modal-footer\">
                                            <a href=\"settingtour/editertoursuite.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Editer tour</a>
                                             <a href=\"copytour/editertoursuite.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Copier ce tour</a>
                                         
                                            <!--<a href=\"#\" class=\"btn btn-sm btn-default\">Editer tour (Beta)</a>-->
                                            <!--<a href=\"adddate.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Ajouter date</a>-->
                                           
                                             <a href=\"canceltour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Annuler tour</a>
                                        </div> ";}else{
                                            echo"
                                         <div class=\"modal-footer\">
                                         <!--<a href=\"adddate.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Ajouter date</a>-->
                                            <a href=\"copytour/editertoursuite.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Copier ce tour</a>
                                         
                                            
                                             <a href=\"canceltour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Annuler tour</a>
                                        </div> ";


                                        }
                                        echo "
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end -->
    






                    ";
    
}
$req->closeCursor(); 



                    
                    
               echo"     
                </ul>
            </div>
            ";

             ?>


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
                 

            </div>
       
        </div>
    
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
            _total =  Math.trunc(total*0.70);  

             }else{
                total = 1*prix; 
                total=total +prixsupp*(nombretouriste-max);
                _total =  Math.trunc(total*0.70);



             }
             total=Math.ceil(total);
             frais=total-_total;
       
    
    $('#Payment').val(frais);
     $('#total').val(frais);
     $('#totalsansfrais').val(_total);
     $('.totalsansfrais span').text(_total);
     $('.total span').text(total);
      $('.frais span').text(frais);
   $('.prix span').text(nombretouriste+" Touriste(s): "+total); 

         
  
            

        $('#touriste').on('change',function(){
            //$('.total span').append(total);
  
    var total = 0;
      var nombretouriste=parseInt($('#touriste').val());
   if((min<=nombretouriste)&&(nombretouriste<=max)){


  
            //total = nombretouriste*prix;
            total = prix;
            _total =  Math.trunc(total*0.70);  

             }else{
                total = 1*prix;
                total=total +prixsupp*(nombretouriste-max);  
                _total =  Math.trunc(total*0.70);



             }
             total=Math.trunc(total);
             frais=total-_total;
       
    
    $('#Payment').val(frais.toFixed(2));
     $('#total').val(frais.toFixed(2));
     $('#totalsansfrais').val(_total.toFixed(2));
     $('.totalsansfrais span').text(_total);
     $('.total span').text(total);
      $('.frais span').text(frais);
      $('.prix span').text(nombretouriste+" Touriste(s): "+total); 
});


                    </script> 

</body>

</html>
