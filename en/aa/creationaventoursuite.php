<?php 
session_start();



if(!((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
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
 include 'becomeanaventourer.php';
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
        <div class="col-lg-8 col-lg-offset-2">
            <div class="page-header">
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div>

            </div>

            <form class="well form-horizontal" method="post"  id="defaultForm" action="creationaventoursuite3.php">
<fieldset>

<!-- Form Name -->
<legend>ETAPE 1 </legend><br><h2></h2>

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
  <label class="col-md-4 control-label" >Titre </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="title" id="title" placeholder="Mon super titre" class="form-control"  type="text" value=<?php  echo "\"".$_SESSION['title']."\"";?> required>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Location</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> -->
         <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
  <!-- <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required> -->


  <select id="location" name="location" class="form-control" value=<?php  echo "\"".$_SESSION['location']."\"";?>>
                        <option value="paris">Paris (Ile de France)</option>
                        <option value="reunion">La Réunion</option>
                        
    
      
    
                        

                    </select>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Lieu de départ du tour</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> -->
         <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
  <!-- <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required> -->
  <!-- <div id="locationField"> -->
      <input id="autocomplete" name="locationDeparture" class="form-control" value=<?php  echo "\"".$_SESSION['locationDeparture']."\"";?> placeholder="Lieu de départ (Ville, Lieu ou Adresse)"
             onFocus="geolocate()" type="text" required></input>
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
  <h4 style='color:red'>Lancement à partir du 01/06/2016</h4>
 </div>
  </div>
</div>
<!-- Text input-->



<div class="form-group">
  <label class="col-md-4 control-label" >Quand?</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <!-- <input name="password" placeholder="Mot de passe" class="form-control"  type="password" required> -->
  <input type="text" class="form-control"  placeholder="Quand ?" id="datepicker-13" name="datepicker" value=<?php  echo "\"".$_SESSION['datepicker']."\"";?> required >
    </div>
  </div>
</div>
<br>

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
  <label class="col-md-4 control-label">Heure</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group  clockpicker" data-placement="right" data-align="top" data-autoclose="true">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span> -->
        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span> 
 <!--  <input name="phone" placeholder="+33615321254" class="form-control" type="tel" required> -->
 <input type="text" name="time" id="input-time" tabindex="1" class="timepicker form-control time" required placeholder="" value=<?php  echo "\"".$_SESSION['time']."\"";?>>
   <!-- <input type="text" class="timepicker" name="open" readonly> -->

<!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>  -->

    </div>
  </div>
</div> 

<div class="form-group">
  <label class="col-md-4 control-label">Duree (approximatif)</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span> 
 <!--  <input name="phone" placeholder="+33615321254" class="form-control" type="tel" required> -->
 <!-- <input type="time" name="time" id="input-time" tabindex="1" class="form-control time" required placeholder="" value=<?php  echo "\"".$_SESSION['time']."\"";?>> -->
   <select id="duree" name="duree" class="form-control" value=<?php  echo "\"".$_SESSION['duree']."\"";?>>
                        <option value="1">1 heure</option>
                        <option value="2">2 heures</option>
                        <option value="3">3 heures</option>
                        <option value="4">4 heures</option>
                        <option value="5">5 heures</option>
                        <option value="6">6 heures</option>
                        <option value="7">7 heures</option>
                        <option value="8">8 heures</option> 
                        <option value="9">9 heures</option> 
                        <option value="10">10 heures</option> 
                        <option value="11">11 heures</option> 
                        <option value="12">12 heures</option>                      

                    </select>  
    </div>
  </div>
</div> 




<div class="form-group">
<div class="col-xs-12">
                                <h3>Nombre de personnes (touristes)</h3>
                            </div>
  <label class="col-md-4 control-label">Minimum</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select id="minimum" name="minimum" class="form-control" value=<?php  echo "\"".$_SESSION['minimum']."\"";?>>
                        <option selected="selected" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>                      

                    </select>    
    </div>
  </div>
</div> 


<div class="form-group">
  <label class="col-md-4 control-label">Maximum</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select id="maximum" name="maximum" class="form-control" value=<?php  echo "\"".$_SESSION['maximum']."\"";?>>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option selected="selected" value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>                      

                    </select>   
    </div>
  </div>
</div> 


<div class="form-group">
<div class="col-xs-12">
                                <h3>3 mots caractérisant ton tour</h3>
                            </div>
  <label class="col-md-4 control-label">Tags</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
  <input type="text" name="tag1" id="title" tabindex="1" class="form-control" placeholder="Ex: Ballade" value=<?php  echo "\"".$_SESSION['tag1']."\"";?> required> 
   <input type="text" name="tag2" id="title" tabindex="1" class="form-control" placeholder="Ex: Degustation" value=<?php  echo "\"".$_SESSION['tag2']."\"";?> required>
    <input type="text" name="tag3" id="title" tabindex="1" class="form-control" placeholder="Ex: Histoire" value=<?php  echo "\"".$_SESSION['tag3']."\"";?> required>
    </div>
  </div>
</div>  








<!-- <div id="mysuccess"></div> -->


<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <!-- <div class="g-recaptcha" data-sitekey="Google Site Key"></div> -->

  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="submit" class="btn btn-warning" >Continuer <span class="glyphicon glyphicon-send"></span></button>
   
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


</body>
</html>

<!--  -->

