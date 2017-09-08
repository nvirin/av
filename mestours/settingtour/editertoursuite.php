<?php 
session_start();



if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){

    //header('Location: signinregister/index.php');
  //include $_SERVER['DOCUMENT_ROOT'].'/commentdevenirunaventoureur.php'; 
  //die();
  header('Location: http://www.aventour.net/connectetoi.html');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter =/ <br><a href="http://www.aventour.net/signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!((isset($_GET['mytrip'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_GET['mytrip'])))){
 header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!isset($_GET['mytour'])){
    header('Location: http://www.aventour.net/');  
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
    header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{

  $req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage,voyage.locationDeparture, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.prerequis, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');

 $req->execute(array($tour));
$result = $req->fetch(PDO::FETCH_ASSOC);
//print_r($result);
$title=$result['title'];
$lieu_voyage=$result['lieu_voyage'];
$locationDeparture=$result['locationDeparture'];
$date_voyage=$result['date_voyage'];
$heure_voyage=$result['heure_voyage'];
$duree_voyage=$result['duree_voyage'];
$min_personne=$result['min_personne'];
$max_personne=$result['max_personne'];

$tag1=$result['tag1'];
$tag2=$result['tag2'];
$tag3=$result['tag3'];

$lv1=$result['lv1'];
$lv2=$result['lv2'];
$lv3=$result['lv3'];
$phonenumber=$result['phonenumber'];
$mapresentation=$result['mapresentation'];

$prix=$result['prix'];
$prixsupp=$result['prixsupp'];
$pasdeperssup=$result['pasdeperssup']; 

$details=$result['detail_voyage']; 
$prerequis=$result['prerequis']; 

$maildate=$result['id_mail'];
   

}

}

$reqdate = $bdd->prepare('SELECT voyage.date_voyage FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE id_mail= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC');
$reqdate->execute(array($maildate));

unset($mesdates); 

while ($donnees = $reqdate->fetch())
{

  $mesdates[]=$donnees['date_voyage'];
}






  



?>



<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editer tour</title>


    <link rel="stylesheet" href="http://www.aventour.net/signinregister/test/b/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="http://www.aventour.net/signinregister/test/b/dist/css/bootstrapValidator.css"/>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- // <script type="text/javascript" src="signinregister/test/b/vendor/jquery/jquery-1.10.2.min.js"></script> -->
    <script type="text/javascript" src="http://www.aventour.net/signinregister/test/b/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.aventour.net/signinregister/test/b/dist/js/bootstrapValidator.js"></script>
    <!-- // <script type="text/javascript" src="signinregister/test/b/dist/js/bootstrapValidator.min.js"></script> -->
    <!-- // <script type="text/javascript" src="signinregister/dist/js/bootstrap-form-helpers.min.js"></script> -->
    <!-- ClockPicker script -->
<script type="text/javascript" src="http://www.aventour.net/dist/bootstrap-clockpicker.min.js"></script>

    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <!-- // <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="http://www.aventour.net/signinregister/js/datepicker-fr.js"></script>
        <!-- // <script src="signinregister/js/pickerjs.js"></script> -->

        <script src="http://www.aventour.net/js/simple-slider.js"></script>

  <link href="http://www.aventour.net/css/simple-slider.css" rel="stylesheet" type="text/css" />
  <link href="http://www.aventour.net/css/simple-slider-volume.css" rel="stylesheet" type="text/css" />  


     <!-- <script type="text/javascript" src="test/b/test/spec/verbose.js"></script> -->
     <script>
     var unavailableDates = <?php echo json_encode($mesdates); ?>;
  //alert(unavailableDates+ "---------"+unavailableDates1);
  function DisableSpecificDates(date) {
    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
    return [unavailableDates.indexOf(string) == -1];
  }
         $(function() {
            $( "#datepicker-13" ).datepicker(
               {
       
        beforeShowDay: DisableSpecificDates,
      
       minDate: 0
        
    }



              );
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
<link rel="stylesheet" type="text/css" href="http://www.aventour.net/dist/bootstrap-clockpicker.min.css">

    


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

    [class^=slider] { display: inline-block; margin-bottom: 30px; }
  .output { color: #888; font-size: 14px; padding-top: 1px; margin-left: 5px; vertical-align: top;color: black;font-size: xx-large;}
  h1 { font-size: 20px; }
  h2 { clear: both; margin: 0; margin-bottom: 5px; font-size: 16px; }
  p { font-size: 15px; margin-bottom: 30px; }
  h2:first-of-type { margin-top: 0; }
} 

/**/
</style>

 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ //selector:'textarea'

  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'




   });</script>
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
<div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="http://www.aventour.net/signinregister/">Se connecter</a> </div>

            </div>

            <form class="well form-horizontal" method="post"  id="defaultForm" action="confirmed.php"> 
<fieldset>

<!-- Form Name -->
<legend>Modifier tour:<br><p>Si vous ne voulez pas modifer un paramètre, il suffit de ne pas y toucher :)</p></legend><br><!-- <h2>Lancement des premiers tours après le 1er mai</h2> -->

 <input name="mytour" type="hidden" value="<?php echo $_GET['mytour'];?>">
<input name="mytrip" type="hidden" value="<?php echo $_GET['mytrip'];?>">
     
<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-4 control-label">Nom</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="Nom" class="form-control"  type="text" required> 
    </div>
  </div>
</div> -->

<!-- Text input--> 

<div class="form-group">
  <div class='col-md-12'><p><?php  if(!empty($title)){echo '<u>Titre actuel:</u> '.$title;} ?></p></div>
  <label class="col-md-4 control-label" >Titre </label> 
  <!-- <div class='col-md-12'><p><?php  //if(!empty($title)){echo '<u>Mon titre actuel:</u><br>'.$title;} ?></p></div>  -->
    <div class="col-md-4 inputGroupContainer"> 
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="title" id="title" placeholder='<?php if(!empty($title)){echo $title;}else{echo '';} ?>' class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
         <div class="form-group">
          <div class='col-md-12'><p><?php  if(!empty($lieu_voyage)){echo '<u>Lieu actuel:</u> '.$lieu_voyage;} ?></p></div>
  <label class="col-md-4 control-label">Lieu</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> -->
         <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
  <!-- <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required> -->


  <select id="location" name="location" class="form-control">
                        <option <?php if($lieu_voyage==='paris'){echo 'selected="selected"';}else{echo '';} ?> value="paris">Paris (Ile de France)</option>
                        <option <?php if($lieu_voyage==='reunion'){echo 'selected="selected"';}else{echo '';} ?> value="reunion">La Réunion</option>
                        
    
      
    
                        

                    </select>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
        <div class='col-md-12'><p><?php  if(!empty($locationDeparture)){echo '<u>Lieu de départ actuel:</u> '.$locationDeparture;} ?></p></div>
  <label class="col-md-4 control-label">Lieu de départ du tour</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> -->
         <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
  <!-- <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required> -->
  <!-- <div id="locationField"> -->
      <input id="autocomplete" style="width: 100%;" name="locationDeparture" class="form-control" placeholder='<?php if(!empty($locationDeparture)){echo $locationDeparture;}else{echo '';} ?>'
             onFocus="geolocate()" type="text"></input>
    <!-- </div> -->

     <table class='hidden' id="address">
      <tr>
        <td class="label">Street address</td>
        <td class="slimField"><input class="field" id="street_number"
              disabled="true"></input></td>
        <td class="wideField" colspan="2"><input class="field" id="route"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">City</td>
        <td class="wideField" colspan="3"><input class="field" id="locality"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">State</td>
        <td class="slimField"><input class="field"
              id="administrative_area_level_1" disabled="true"></input></td>
        <td class="label">Zip code</td>
        <td class="wideField"><input class="field" id="postal_code"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field"
              id="country" disabled="true"></input></td>
      </tr>
    </table>



    </div>
  </div>
</div>

 
<!-- Text input-->
<br>


<div class="form-group">
  
  <label class="col-md-4 control-label" ></label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
  <!-- <h4 style='color:red'>Lancement à partir du 01/06/2016</h4> --> 
 </div>
  </div>
</div>
<!-- Text input-->

<hr>
<div class="col-xs-12">
                                <h3>Quand? Heure? et Durée?</h3>
                            </div>
                             <!-- <div class="input_fields_wrap"> -->
    <!-- <button class="add_field_button col-xs-12">Ajouter date (Date, heure et durée)</button> -->
    <div>

                           

<div class="form-group">
  <div class='col-md-12'><p><?php  if(!empty($date_voyage)){

 $myDateTime = DateTime::createFromFormat('Y-m-d', $date_voyage);
$newDateString = $myDateTime->format('d/m/Y');



    echo '<u>Date actuelle:</u> '.$newDateString;} ?></p></div>
  <label class="col-md-4 control-label" >Quand?</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <!-- <input name="password" placeholder="Mot de passe" class="form-control"  type="password" required> -->
  <input type="text" class="form-control" name="datepicker" placeholder='<?php if(!empty($date_voyage)){echo $newDateString;}else{echo '';} ?>' id="datepicker-13" name="datepicker">
    </div>
  </div>
</div>
<!-- <br> -->

<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-4 control-label" >Confirmer</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="confirmpassword" placeholder="Confirmer" class="form-control"  type="password" required>
    </div> 
  </div>
</div> -->

<!-- Text input-->
<!-- class="timepicker" name="open" -->

       <!-- <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true"> -->
<div class="form-group">
  <div class='col-md-12'><p><?php  if(!empty($heure_voyage)){

$myTime = DateTime::createFromFormat('H:i:s', $heure_voyage);
$newTimeString = $myTime->format('H:i');

// $date = new DateTime('2000-01-01');
// echo $date->format('Y-m-d H:i:s');

    echo '<u>Heure actuelle:</u> '.$newTimeString;} ?></p></div>
  <label class="col-md-4 control-label">Heure</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group  clockpicker" data-placement="right" data-align="top" data-autoclose="true">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span> -->
        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span> 
 <!--  <input name="phone" placeholder="+33615321254" class="form-control" type="tel" required> -->
 <input type="text" name="time" id="input-time" tabindex="1" class="timepicker form-control time" placeholder='<?php if(!empty($heure_voyage)){echo $newTimeString;}else{echo '';} ?>'>
   <!-- <input type="text" class="timepicker" name="open" readonly> -->

<!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>  -->

    </div>
  </div>
</div>  

<div class="form-group">
  <div class='col-md-12'><p><?php  if(!empty($duree_voyage)){echo '<u>Durée actuelle:</u> '.$duree_voyage.' heure(s)';} ?></p></div>
  <label class="col-md-4 control-label">Durée (approximatif)</label>  
    <div class="col-md-4 inputGroupContainer"> 
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span> 
 <!--  <input name="phone" placeholder="+33615321254" class="form-control" type="tel" required> -->
 <!-- <input type="time" name="time" id="input-time" tabindex="1" class="form-control time" required placeholder="" value=<?php  echo "\"".$_SESSION['time']."\"";?>> -->
   <select id="duree" name="duree" class="form-control">
                        <option <?php if($duree_voyage==='1'){echo 'selected="selected"';}else{echo '';} ?> value="1">1 heure</option>
                        <option <?php if($duree_voyage==='2'){echo 'selected="selected"';}else{echo '';} ?> value="2">2 heures</option>
                        <option <?php if($duree_voyage==='3'){echo 'selected="selected"';}else{echo '';} ?> value="3">3 heures</option>
                        <option <?php if($duree_voyage==='4'){echo 'selected="selected"';}else{echo '';} ?> value="4">4 heures</option>
                        <option <?php if($duree_voyage==='5'){echo 'selected="selected"';}else{echo '';} ?> value="5">5 heures</option>
                        <option <?php if($duree_voyage==='6'){echo 'selected="selected"';}else{echo '';} ?> value="6">6 heures</option>
                        <option <?php if($duree_voyage==='7'){echo 'selected="selected"';}else{echo '';} ?> value="7">7 heures</option>
                        <option <?php if($duree_voyage==='8'){echo 'selected="selected"';}else{echo '';} ?> value="8">8 heures</option> 
                        <option <?php if($duree_voyage==='9'){echo 'selected="selected"';}else{echo '';} ?> value="9">9 heures</option> 
                        <option <?php if($duree_voyage==='10'){echo 'selected="selected"';}else{echo '';} ?> value="10">10 heures</option> 
                        <option <?php if($duree_voyage==='11'){echo 'selected="selected"';}else{echo '';} ?> value="11">11 heures</option> 
                        <option <?php if($duree_voyage==='12'){echo 'selected="selected"';}else{echo '';} ?> value="12">12 heures</option>                      

                    </select>  
    </div>
  </div>
</div>  


    <!-- <input type="text" name="mytext[]"> -->
    </div>
<!-- </div> -->

<hr>





<div class="form-group">
 <div class="col-xs-12">
                                <h3>Nombre de personnes (touristes)</h3>
                            </div>
                             <div class='col-md-12'><p><?php  if(!empty($min_personne)){echo '<u>Actuellement:</u> '.$min_personne.' personne(s) minimum';} ?></p></div>

  <label class="col-md-4 control-label">Minimum</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select id="minimum" name="minimum" class="form-control">
                        <option <?php if($min_personne==='1'){echo 'selected="selected"';}else{echo '';} ?> value="1">1</option>
                        <option <?php if($min_personne==='2'){echo 'selected="selected"';}else{echo '';} ?> value="2">2</option>
                        <option <?php if($min_personne==='3'){echo 'selected="selected"';}else{echo '';} ?> value="3">3</option>
                        <option <?php if($min_personne==='4'){echo 'selected="selected"';}else{echo '';} ?> value="4">4</option>
                        <option <?php if($min_personne==='5'){echo 'selected="selected"';}else{echo '';} ?> value="5">5</option>
                        <option <?php if($min_personne==='6'){echo 'selected="selected"';}else{echo '';} ?> value="6">6</option>
                        <option <?php if($min_personne==='7'){echo 'selected="selected"';}else{echo '';} ?> value="7">7</option>
                        <option <?php if($min_personne==='8'){echo 'selected="selected"';}else{echo '';} ?> value="8">8</option>                      

                    </select>    
    </div>
  </div>
</div> 


<div class="form-group">
 <div class='col-md-12'><p><?php  if(!empty($max_personne)){echo '<u>Actuellement:</u> '.$max_personne.' personne(s) maximum';} ?></p></div>
<label class="col-md-4 control-label">Maximum</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select id="maximum" name="maximum" class="form-control">
                            <option <?php if($max_personne==='1'){echo 'selected="selected"';}else{echo '';} ?> value="1">1</option>
                        <option <?php if($max_personne==='2'){echo 'selected="selected"';}else{echo '';} ?> value="2">2</option>
                        <option <?php if($max_personne==='3'){echo 'selected="selected"';}else{echo '';} ?> value="3">3</option>
                        <option <?php if($max_personne==='4'){echo 'selected="selected"';}else{echo '';} ?> value="4">4</option>
                        <option <?php if($max_personne==='5'){echo 'selected="selected"';}else{echo '';} ?> value="5">5</option>
                        <option <?php if($max_personne==='6'){echo 'selected="selected"';}else{echo '';} ?> value="6">6</option>
                        <option <?php if($max_personne==='7'){echo 'selected="selected"';}else{echo '';} ?> value="7">7</option>
                        <option <?php if($max_personne==='8'){echo 'selected="selected"';}else{echo '';} ?> value="8">8</option>                   

                    </select>   
    </div>
  </div>
</div> 


<div class="form-group">
  
<div class="col-xs-12">
                                <h3>3 mots caractérisant ton tour</h3>
                                <div class='col-md-12'><p><?php  if(!empty($tag1)){echo '<u>Actuellement:</u><br>-'.$tag1.'<br>-'.$tag2.'<br>-'.$tag3;} ?></p></div>
                             
                            </div>
  <label class="col-md-4 control-label">Tags</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
  <input type="text" name="tag1" id="title" tabindex="1" class="form-control" placeholder='<?php if(!empty($tag1)){echo $tag1;}else{echo '';} ?>'> 
   <input type="text" name="tag2" id="title" tabindex="1" class="form-control" placeholder='<?php if(!empty($tag2)){echo $tag2;}else{echo '';} ?>'>
    <input type="text" name="tag3" id="title" tabindex="1" class="form-control" placeholder='<?php if(!empty($tag3)){echo $tag3;}else{echo '';} ?>'>
    </div>
  </div>
</div>


                                    <div class="form-group col-md-12 col-xs-12" > 
                                    <!-- <h4>Prix minimal conseillé: <?php //echo $prix." €" ?></h4> -->
                                    <!-- <br><h5>Ce prix a été calculé en fonction des valeurs que vous avez entrée.</h5> -->
                                    <br><h5>N'hésiter pas à le Réajuster!</h5> 
                                    
                                    
                                        <!-- <input type="number"  step="1" value=<?php //echo "\"".$prix."\"" ?> min="5" max="100" name="prix" id="title" tabindex="1" class="form-control" placeholder=""> -->
                                        <div class="col-md-12 jumbotron">
                                          <div class='col-md-12'><p><?php  if(!empty($prix)){echo '<u>Actuellement:</u> '.$prix.' €';} ?></p></div>

                                          <h3>Prix par groupe</h3>
                                          <h5>Groupe de minimum à maximum de personnes choisi</h5>
                                           <h5>Dont 15% de commission</h5>
                                       <input type="text" name="prix" id="title" class="form-control" tabindex="1" data-slider="true" value=<?php echo "\"".$prix."\"" ?> data-slider-highlight="true" data-slider-theme="volume" data-slider-range="5,1000">
                                        </div> 
                                         <div class="col-md-12">
                                         <h6 style="font-size: 5em;">+</h6>
                                         </div>
                                        <div class="col-md-12 jumbotron">
                                          <div class='col-md-12'><p><?php  if(!empty($prixsupp)){echo '<u>Actuellement:</u> '.$prixsupp.' €';} ?></p></div>
                                        <h3>Prix par personne supplémentaire</h3>
                                         <h5>Dont 15% de commission</h5>
                                       <input type="text" name="sup" id="title" class="form-control" tabindex="1" data-slider="true" value=<?php echo "\"".$prixsupp."\"" ?> data-slider-highlight="true" data-slider-theme="volume" data-slider-range="0,300">
                                       </div>

                                     <!--   sgsrg -->

                                     <div class="col-md-12 jumbotron">
                                          <!-- <div class='col-md-12'><p><?php  if(!empty($prixsupp)){echo '<u>Prix par personne supplémentaire (actuel):</u><br>'.$prixsupp.' €';} ?></p></div> -->
                                        <!-- <h3>Prix par personne supplémentaire</h3>
                                         <h5>Dont 15% de commission</h5> -->
                                       <!-- <input type="text" name="sup" id="title" class="form-control" tabindex="1" data-slider="true" value=<?php echo "\"".$prixsupp."\"" ?> data-slider-highlight="true" data-slider-theme="volume" data-slider-range="0,300"> -->
                                       <!-- <br>   -->
                                          <div class='col-md-12'><p><?php  if($pasdeperssup=='on')
                                          {
                                            echo 'Actuellement, Vous n\'acceptez pas de personnes supplémentaires';
                                          }else{
                                             echo 'Actuellement, Vous acceptez des personnes supplémentaires'; 
                                          }

                                           ?></p></div>
                                      

                                       <h4><input type="checkbox" name="pasdeperssup" <?php if($pasdeperssup=='on'){echo 'checked';}else{echo '';} ?>> Pas de personne(s) supplémentaire(s)</h4> 
                                       </div>

                                  <!--    tht -->

                                       <script>
  $("[data-slider]")
    .each(function () {
      var input = $(this);
      $("<span>")
        .addClass("output")
        .addClass("center-block")
        .addClass("col-md-12")//center-block

        .insertAfter($(this));
    })
    .bind("slider:ready slider:changed", function (event, data) {
      $(this)
        .nextAll(".output:first")
          .html(data.value.toFixed(0)+" \u20AC");
    }); 
  </script>


                                    </div>







<!-- <div id="mysuccess"></div> -->


<div class="form-group">
 <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <!-- <div class="g-recaptcha" data-sitekey="Google Site Key"></div> -->

  </div>
</div>
 


                               

       
          


                                    <div class="form-group col-md-12 col-xs-12" > 
                                    <h5>Description:</h5>  <p></p>
                                     <div class='col-md-12'></div>
  
                                                                 
                                        

                                        <textarea type="text" rows="8" name="details" id="title" tabindex="1" class="form-control" placeholder="Ballade" value=""><?php  if(!empty($details)){echo $details;} ?></textarea>
                                        
                                       
                                                                      
                                    </div>

                                    <div class="form-group col-md-12 col-xs-12" > 
                                     <h5>Prerequis (Facultatif):</h5>  
                                     <p></p>
                                                                 
                                        
  <div class='col-md-12'></div>
                                   
                                        <textarea type="text" rows="8" name="prerequis" id="title" tabindex="1" class="form-control" placeholder="Ne pas oublier le parapluie," value=""><?php  if(!empty($prerequis)){echo $prerequis;} ?></textarea>
                                        
                                       
                                                                      
                                    </div>


                                    

                                   
                                   

                                    



        

  

  

                                    


                                     
                                   <!--  <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="go-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Continuer">
                                            </div>
                                        </div>
                                    </div> -->




<!-- Button -->
<div class="form-group">
  <!-- <div class='col-md-12'><p><?php  //if(!empty($title)){echo '<u>Mon titre actuel:</u><br>'.$title;} ?></p></div> -->
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="submit" class="btn btn-warning" >Mettre à jour <span class="glyphicon glyphicon-send"></span></button>
   
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



            // var url = "http://www.aventour.net/signinregister/"; 
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
var defaultBounds = new google.maps.LatLngBounds(
  // new google.maps.LatLng(-33.8902, 151.1759),
  // new google.maps.LatLng(-33.8474, 151.2631)); 

new google.maps.LatLng(48.856614, 2.3522219000000177),
  new google.maps.LatLng(-21.052463, 55.233421));

  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')), 
      { bounds: defaultBounds,
        types: ['geocode']
//componentRestrictions: {country: ["fr", "uk"]}
    });

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

