<?php 
session_start();



if(!((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
  include 'commentdevenirunaventoureur.php';
  die();
  header('Location: connectetoi.html');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter =/ <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}


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
 
    $req = $bdd->prepare('SELECT `prenom`, `phonenumber`, `nom`, `checkAventourer` FROM user WHERE mail = ?');
$req->execute(array($mailstring));
$result = $req->fetch(PDO::FETCH_ASSOC); 
//print_r($result);
$prenom=$result['prenom'];
$phonenumber=$result['phonenumber'];
$nom=$result['nom'];
// $phonenumber=$result['phonenumber'];
$checkAventourer=$result['checkAventourer'];


if($checkAventourer==0){
   //header('Location: //www.aventour.net/');
  //echo "coucou";
 include 'commentdevenirunaventoureur.php';
  die();

}
  // echo "post : ";var_dump($_POST); echo "<br> session : ";var_dump($_SESSION);


// $_SESSION['login_user']= "coucou";
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';
// $_SESSION['location']=$_POST['location'];
$_SESSION['title']=$_POST['title'];
// $_SESSION['datepicker']=$_POST['datepicker'];
// $_SESSION['time']=$_POST['time'];
// $_SESSION['duree']=$_POST['duree'];
// $_SESSION['tag1']=$_POST['tag1'];
// $_SESSION['tag2']=$_POST['tag2'];
// $_SESSION['tag3']=$_POST['tag3'];
// $_SESSION['minimum']=$_POST['minimum'];
// $_SESSION['maximum']=$_POST['maximum'];

// $_SESSION['location']=$_POST['location'];
// $_SESSION['title']=$_POST['title'];
// $_SESSION['datepicker']=$_POST['datepicker'];
// echo $_SESSION['location'];
// echo $_SESSION['title'];
// echo $_SESSION['datepicker'];

?>



<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>S'enregistrer</title>


    <link rel="stylesheet" href="signinregister/test/b/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="signinregister/test/b/dist/css/bootstrapValidator.css"/>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- // <script type="text/javascript" src="signinregister/test/b/vendor/jquery/jquery-1.10.2.min.js"></script> -->
    <script type="text/javascript" src="signinregister/test/b/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="signinregister/test/b/dist/js/bootstrapValidator.js"></script>
    <!-- // <script type="text/javascript" src="signinregister/test/b/dist/js/bootstrapValidator.min.js"></script> -->
    <!-- // <script type="text/javascript" src="signinregister/dist/js/bootstrap-form-helpers.min.js"></script> -->
    <!-- ClockPicker script -->
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>

    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <!-- // <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="signinregister/js/datepicker-fr.js"></script>
        <!-- // <script src="signinregister/js/pickerjs.js"></script> -->

     <!-- <script type="text/javascript" src="test/b/test/spec/verbose.js"></script> -->
     <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            //$( "#datepicker-13" ).datepicker("show");
            //$( "#datepicker-13" ).datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
         });

 //         $( "#datepicker-131" ).datepicker(); });
 // $( "#datepicker-132" ).datepicker(); });
 // $( "#datepicker-133" ).datepicker(); });
 // $( "#datepicker-134" ).datepicker(); });
 // $( "#datepicker-135" ).datepicker(); });
 // $( "#datepicker-136" ).datepicker(); });
 // $( "#datepicker-137" ).datepicker(); });
 // $( "#datepicker-138" ).datepicker(); });
 // $( "#datepicker-139" ).datepicker(); });
 // $( "#datepicker-1310" ).datepicker(); }); 



//          $( "#datepicker-13" ).datepicker({
// altField: "#datepicker-13",
// closeText: 'Fermer',
// prevText: 'Précédent',
// nextText: 'Suivant',
// currentText: 'Aujourd\'hui',
// monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
// monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
// dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
// dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
// dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
// weekHeader: 'Sem.',
// dateFormat: 'yy-mm-dd'
// });
      </script>
      <script>$(function() {$( "#datepicker-131" ).datepicker();});</script>
       <script>$(function() {$( "#datepicker-132" ).datepicker();});</script>
        <script>$(function() {$( "#datepicker-133" ).datepicker();});</script>
         <script>$(function() {$( "#datepicker-134" ).datepicker();});</script>
          <script>$(function() {$( "#datepicker-135" ).datepicker();});</script>
           <script>$(function() {$( "#datepicker-136" ).datepicker();});</script>
            <script>$(function() {$( "#datepicker-137" ).datepicker();});</script>
             <script>$(function() {$( "#datepicker-138" ).datepicker();});</script>
              <script>$(function() {$( "#datepicker-139" ).datepicker();});</script>
               <script>$(function() {$( "#datepicker-1310" ).datepicker();});</script>


      <!-- ClockPicker Stylesheet -->
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">

    


    <style type="text/css">

    #locationField, #controls {
        /*position: relative;
        width: 150%;*/
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 150%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }

    #map {
        height: 100%;
      }

    #timepicker {
  width: 20%;
  margin: 30px 40%;
  margin-bottom: 0;
  position: absolute;
}

.timepicker_wrap {
  top: 10px;
  /*left: 39%;*/
  display: none;
  position: absolute;
  background: hsl(0, 0%, 100%);
  border-radius: 5px;
  z-index: 4;
}

.hour, .min, .meridian, .sec {
  float: left;
  width: 60px;
  margin: 0 10px;
}

.sec {
  float: left;
  width: 60px;
  margin: 0 10px;
  display:none;
}

.timepicker_wrap .btn {
  background: url(arrow.png) no-repeat;
  cursor: pointer;
  padding: 18px;
  border: 3px dotted hsl(120, 40%, 80%);
  width: 28%;
  margin: auto;
  border-radius: 5px;
}

.timepicker_wrap .prev { background-position: 50% -50%; }

.timepicker_wrap .next { background-position: 50% 150%; }

.timepicker_wrap .ti_tx {
  margin: 10px 0;
  width: 100%;
  text-align: center;
}

.timepicker_wrap .in_txt {
  border-radius: 10px;
  width: 70%;
  float: none;
  text-align: center;
  padding-bottom: 8px;
  border: 2px solid hsl(0, 0%, 0%);
  font-family: georgia, helvetica, arial;
  font-weight: 700;
  font-size: 1.5em;
}

.timepicker_wrap > .hour > .ti_tx:after {
  content: '';
  font-size: 1em;
  padding-left: 0.2em;
  font-weight: 700;
}

.timepicker_wrap >.min > .ti_tx:after {
  content: '';
  font-size: 1em;
  padding-left: 0.2em;
  font-weight: 700;
}

.timepicker_wrap > .sec > .ti_tx:after {
  content: '';
  font-size: 1em;
  padding-left: 0.2em;
  font-weight: 700;
}

.timepicker_wrap > .meridian > .ti_tx:after {
  content: '';
  font-size: 1em;
  padding-left: 0.2em;
  font-weight: 700;
}

#mybody{
    /*padding-top: 90px;*/
    background-color: #EDEFED;
    text-align: center;
        }
    
        #login-form-link, #register-form-link  {

    /*padding-top: 90px;*/
    background-color: rgba(255, 255, 255, 0);
}

/**/
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
                        <?php //include 'conectionoupas.php' ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

 <section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div>

            </div>

            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <div class="">
                <div class="">
                    <h1 class="title">Selectionne le type de forfait pour ton tour</h1>

                    
         <ul class="list-group" id="contact-list">

                

 <p>Type1 : Forfait groupe + prix par personne(s) supplémentaire(s) </p>
  <p>Type2 : Forfait groupe et Pas de personne(s) supplémentaire(s)</p>
   <p>Type3 : Prix par personne(s)</p>

  
  
        <div class=""> <div class="">
               
       
       </div> </div>


    
                                                        <!-- debut-->

                                                          <form class="" method="post"  id="defaultForm" action="creationaventoursuite.php" style='display:inline;'>

                
                   <button  type="submit" id="monBoutonPasComplet" class="btn btn-default btn-default">
                    
                        

                                                        <div class="col-md-12 text-center" >
 <h4 class="modal-title" id="project-10-label" style="color: #6F6F6F;"> Type 1</h4><hr> 
                                       

                   
                        <div class="col-md-12">
                           
                            <div class="col-md-12">
                            <h1 class="name">37€</h1> <!-- <br/> --><span class="text-muted"> /Groupe de 1 à 3 personnes</span><br/><!-- <br/> -->
                            <span class="name">+</span> <!-- <br/> --><!-- <br/> --> 
                             <h1 class="name">17€</h1> <!-- <br/> --><span class="text-muted"> /personnes supplémentaires</span><!-- <br/> -->
                            </div>
     
                        </div>
                        <div class="clearfix"></div>
                      <div class="col-md-12">
                                         <a class="btn btn-lg btn-primary">Selectionner</a>
                                        </div> 
                          <!-- fin -->
                                                        </div>
                                                      
                    </button>

                   </form>

                     <form class="" method="post"  id="defaultForm" action="creationaventoursuite002.php" style='display:inline;'>


 <button type="type" id="monBoutonPasComplet" class="btn btn-default btn-default">
                    
                        

                                                        <div class="col-md-12 text-center" >
 <h4 class="modal-title" id="project-10-label" style="color: #6F6F6F;"> Type 2</h4><hr>

 <input type="hidden" name="pasdeperssup" value="on">
                                       

                   
                        <div class="col-md-12">
                           
                            <div class="col-md-12">
                            <h1 class="name">37€</h1> <!-- <br/> --><span class="text-muted"> /Groupe de 1 à 3 personnes</span><br/><br/>
                           <!--  <span class="name">+</span> --> <br/><br/>
                             <span class="name"></span> <br/><span class="text-muted"> Pas de personnes supplémentaires</span><br/>
                            </div>
     
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                                         <a class="btn btn-lg btn-primary">Selectionner</a>
                                        </div> 

                          <!-- fin -->
                                                        </div>
                                                      
                    </button> 

                   </form>
                       <form class="" method="post"  id="defaultForm" action="creationaventoursuite003.php" style='display:inline;'>
                     <button  type="submit" id="monBoutonPasComplet" class="btn btn-default btn-default">
                    
                        

                                                        <div class="col-md-12 text-center" >
 <h4 class="modal-title" id="project-10-label" style="color: #6F6F6F;"> Type 3</h4><hr>
                                       
 <input type="hidden" name="pasdegroupe" value="on">  
                                       
                   
                        <div class="col-md-12">
                           
                            <div class="col-md-12">
                            <h1 class="name">37€</h1> <br/><span class="text-muted"> /personne(s)</span><br/><br/>
                            <!-- <span class="name">+</span>  --><br/><br/>
                             <span class="name"></span> <br/><span class="text-muted"> .</span><br/>
                            </div>
     
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                                         <a class="btn btn-lg btn-primary">Selectionner</a>
                                        </div> 

                          <!-- fin -->
                                                        </div>
                                                      
                    </button>

                  </form>

             
                                                      
 

<!-- Modal -->
                        <!--     <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: whitesmoke;">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: black;">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="project-10-label" style="color: #6F6F6F;"> ".$donnees['title']."</h4>
                                        </div>
                                        <div class="modal-body" style="background-color: rgb(245, 245, 245);">
                                            <h3></h3>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    
                                                    <section class="bg-primary" style="background-color: rgb(245, 245, 245);">

                                                    <div class="container"  id="mail">
                                                      <div class="row">
                                                        <div class="col-md-12 text-center" style="padding-top: 5px;" padding-bottom: "50px;">

                                                 

                                                        <div id="monBoutonPasComplet">
                    
                        <div class="col-md-2">
                         <div class="col-md-12">
                         <img src="" alt="Scott Stevens" class="img-responsive img-circle center-block" />
                         </div>
                         <div class="col-md-12">
                         <span class="visible-xs"> <span class="text-muted" id="positionGauche">".$donnees['prenom']." ".$donnees['nom'][0].".  $mbirthday</span><br/></span> 
                         </div>
                         <div class="col-md-12">
                         <span class="visible-xs"> <span class="text-muted" id="positionGauche"><i class="fa fa-star fa-1x"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class="col-md-12">
                         <span class="visible-xs"> <span class="text-muted" id="positionGauche"><i class="fa fa-facebook-square fa-1x"></i> ".$donnees['nombrefb']." ami(e)s</span><br/></span> 
                         </div>

                         <div class="col-md-12">
                            <span class="visible-xs"> <span class="text-muted" id="positionGauche"><i class="fa fa-globe fa-1x"></i> ".$donnees['lv1']." ".$donnees['lv2']." ".$donnees['lv3']."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class="col-md-7">
                           
                            
                    
                             <div class="col-xm-12 col-md-12">                      
                            <span class="visible-xs"> <span class="text-muted" id="positionGauche"><i class="fa fa-calendar fa-lg"></i> ".$myDateTime."</span><br/></span> 
                            </div>
                             <div class="col-xm-12 col-md-10">                      
                            <span class="visible-xs"> <span class="text-muted" id="positionGauche"><i class="fa fa-map-marker fa-lg"></i> ".strtoupper($donnees['lieu_voyage'])." à ".$myTime." (Durée: ~".$donnees['duree_voyage']."h)</span><br/></span> 
                            </div>
                            
                            <div class="col-md-12">
                            <span class="visible-xs"> <span class="text-muted" id="positionGauche"><i class="fa fa-tags fa-1x"></i> ".$donnees['tag1'].", ".$donnees['tag2'].", ".$donnees['tag3']."</span><br/></span>                                                        
                            </div>

                        </div>
                        <div class="col-md-3">
                           
                            <div class="col-md-12">
                             <span class="name">".$Prix_."</span> <span class="text-muted">".$groupe."</span><br/>
                                                                                    
                            </div>
                            
                            <div class="col-md-12 text-center">
                            <span class="visible-xs"> <span class="text-muted"> ".$donnees['min_personne']." à ".$donnees['max_personne']." Personne(s)</span><br/></span>                                                        
                            </div>

                            <div class="col-md-12 text-center">
                            <br><span class="visible-xs"> <span class="text-muted">".$_prixsuppTotzl."</span><br/></span>                                                        
                            </div>

                            
                        </div>

                     

                                            <div class="col-md-12 /*text-center*/">
                            <br><span class="visible-xs"> 

                            <h3 class="text-muted">Description</h3>
                            <span class="text-muted">".$mdescription."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                          

                                            <div class="col-md-12 text-center">
                            <br><span class="visible-xs"> 

                            <h3 class="text-muted">Prerequis</h3>
                            <span class="text-muted">".$mprerequis."</span>

                            <br/>

                            </span>                                                        
                            </div>



                        <div class="clearfix"></div>
                    </div>


                                                        </div>
                                                      </div>
                                                    </div>
                                                            
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                
                                         <div class="modal-footer">
                                            <a href="reserver/index.php?mytrip=&mytour=" class="btn btn-sm btn-default">Reserver</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            -->
    
                    
        
                </ul>
            </div>
          



            <!-- zzzzzzzzzzzzzzzzzzzzzzzzzzzz -->

         

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


<!-- <script src="TimePicker/pickerjs.js"></script> -->
<!-- <input type="text" class="timepicker" name="open"> -->
<!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>  -->
<!-- <script src="TimePicker/pickerjs.js"></script> -->
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>

<script type="text/javascript">


$(document).ready(function() {


     // $('#datepicker-13')
     //    .datepicker({
     //        format: 'dd/mm/yyyy'
     //    })
     //    .on('changeDate', function(e) {
     //        // Revalidate the date field
     //        //$('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'region');
     //        $('#defaultForm').bootstrapValidator('revalidateField', 'datepicker');
     //    });
    $('#defaultForm')
        .bootstrapValidator({
            message: 'Non valide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
        //     fields: {
        //         username: {
        //             message: 'The username is not valid',
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The username is required and can\'t be empty'
        //                 },
        //                 stringLength: {
        //                     min: 6,
        //                     max: 30,
        //                     message: 'The username must be more than 6 and less than 30 characters long'
        //                 },
        //                 /*remote: {
        //                     url: 'remote.php',
        //                     message: 'The username is not available'
        //                 },*/
        //                 regexp: {
        //                     regexp: /^[a-zA-Z0-9_\.]+$/,
        //                     message: 'The username can only consist of alphabetical, number, dot and underscore'
        //                 }
        //             }
        //         },
        //         email: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The email address is required and can\'t be empty'
        //                 },
        //                 emailAddress: {
        //                     message: 'The input is not a valid email address'
        //                 }
        //             }
        //         },
        //         password: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The password is required and can\'t be empty'
        //                 }
        //             }
        //         }
        //     }
        // })
 fields: {
            title: {
                validators: {
                        stringLength: {
                        min: 2,
                        message: ' '
                    },
                        notEmpty: {
                            message: ' '
                        
                    }//,
                    // regexp: {
                    //     regexp: /^[a-z\s]+$/i,
                    //     message: ' '
                    // }
                }
            },
             tag1: {
                validators: {
                     stringLength: {
                        min: 2,
                        message: ' '
                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: ' '
                    }
                }
            },
            tag2: {
                validators: {
                     stringLength: {
                        min: 2,
                        message: ' '
                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: ' '
                    }
                }
            },
            tag3: {
                validators: {
                     stringLength: {
                        min: 2,
                        message: ' '
                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: ' '
                    }
                }
            },
             datepicker: {
                threshold: 3,
                validators: {
                     stringLength: {
                        min: 2,
                        message: ' '
                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    date: { 
                    format: 'DD/MM/YYYY',
                    min: '01/05/2016',
                        max: '12/30/2020',
                    message: 'Lancement à partir du 01/05/2016 '
                   },
                    callback: {
                            message: 'Lancement à partir du 01/05/2016 ',
                            callback: function (value, validator, $field) {
                                var m = new moment(value, 'DD/MM/YYYY', true);
                                var now = moment().format("DD/MM/YYYY");

                                // Determine the numbers which are generated in captchaOperation
                                // var items = $('#captchaOperation').html().split(' '),
                                //     sum   = parseInt(items[0]) + parseInt(items[2]);

                                //return m.isAfter(moment().subtract(1, 'days'));
                                return m.isAfter(moment('30/04/2016','DD/MM/YYYY'));
                            }
                        }
                }
            },
            // selectedDate: {
            // // The hidden input will not be ignored
            // excluded: false,
            // validators: {
            //     notEmpty: {
            //         message: 'The date is required'
            //     },
            //     date: {
            //         format: 'MM/DD/YYYY',
            //         message: 'The date is not a valid'
            //     }
            // }

            email: {
                threshold: 6,
                validators: {
                    verbose :{
                        enabled: false

                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    emailAddress: {
                        message: ' '
                        
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Déjà enregistré!  <a href="mdp.php">Mot de passe oublié?</a>',
                        delay: 2000
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: ' '
                        
                    },
                    password: {
                        message: ' '
                        
                        
                    },
                      stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Entre 6 et 20 caractères'
                    }
                }
            },
            // confirmpassword: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The confirm password is required and can\'t be empty'
            //         }, 
            //         identical: {
            //             field: 'password',
            //             message: 'Not the same'
            //         }
            //     }
            // },

            phone: {
                validators: {
                    notEmpty: {
                        message: ' '
                       
                    },
                    // callback: {
                    //     message: 'Use the "+" format. Ex: +336123456', 
                    //     callback: function(value, validator) {
                            
                    //        return value.toString().startsWith("+");
                    //     }
                    // }, 
                    stringLength: {
                        min: 5,
                        max: 20,
                        message: ' '
                        //message: 'The password must be more than 6 and less than 20 characters long'
                    }
                }//,
                // regexp: {
                //         regexp: /^\+(?:[0-9]●?){6,14}[0-9]$/i, 
                //         message: 'Numero de telephone '
                //     }
            }
            }
        })
.off('success.form.bv');
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

              $('#success_message').removeClass('hidden');
                //$('#contact_form').data('bootstrapValidator').resetForm();
                //document.getElementById("log").innerHTML="WHATEVER YOU WANT...";
               // $("#success_message").text("<a href=\"#\">Mot de passe oublié?</a>");

            // Get the form instance
            var $form = $(e.target);
            var httpRequest;

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            // $.post($form.attr('action'), $form.serialize(), function(result) {
            //     console.log(result);
            //     // $("#success_message").text(""+result);
            //     //alert(result);
            // }, 'text');
//makeRequest('creationaventoursuite3.php', 'result');
// var xmlhttp;
// xmlhttp = new XMLHttpRequest();
// if(xmlhttp == null){
//   alert("Boo! Your browser doesn't support AJAX!");
//   return;
// }
// xmlhttp.onreadystatechange = stateChanged;
// xmlhttp.open("GET", "http://www.google.com", true);
// xmlhttp.send(null);



            $.ajax({
                url: 'creationaventoursuite3.php',
                type: 'POST',
                data: $form.serialize(),
                //dataType: 'application/x-www-form-urlencoded',
                contentType: "application/x-www-form-urlencoded",
                    dataType: "text",
                success: function(result) { 
                    // ... Process the result ...
                    console.log(result);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        //makeRequest('creationaventoursuite3.php', 'result');
            }
            });

      


            


         window.location.href = 'creationaventoursuite2.php'; 



            // var url = "../signinregister/"; 
            // setTimeout(function(){
            //          //do what you need here
            //        $(location).attr('href',url); 
            //                        }, 2000);   
                 
        });
});
</script>


    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-el-s7L_OEA1hHv6UkJyKl16J3AjL8iA&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>


<script type="text/javascript">
$('.clockpicker').clockpicker()
    .find('input').change(function(){
        // TODO: time changed
        console.log(this.value);
    });

</script>

<script type="text/javascript">
  

  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment

         // $(function() {
           // $( '#datepicker-13'+x+'' ).datepicker();
            //$( "#datepicker-13" ).datepicker("show");
            //$( "#datepicker-13" ).datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
         // });




  
            $(wrapper).append('<div><div class="form-group"><label class="col-md-4 control-label" >Quand?</label><div class="col-md-4 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input required type="text" class="form-control hasDatepicker"  placeholder="Quand ?" id="datepicker-13" name="datepicker[]"/></div></div></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>


</body>
</html>

<!--  -->

