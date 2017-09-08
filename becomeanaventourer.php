<?php 
session_start();



if(!((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
  header('Location: connectetoi.html');
   die();
  include 'connectetoi.html';
  die();
  header('Location: connectetoi.html');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter =/ <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}

// if(!((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid'])))){
//     //header('Location: signinregister/index.php');
//   die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour créer un tour =/ <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

// }
 

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
$phonenumber=$result['phonenumber'];
$checkAventourer=$result['checkAventourer'];


if($checkAventourer==0){
   //header('Location: //www.aventour.net/');
  //echo "coucou";
 //include 'becomeanaventourer.php';
	//echo "coucouzrfe".$checkAventourer;
  //die();

}

require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'couvou123?'); // GMail password

//smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'AVENTOUR.NET', 'Vdevenir aventoureur: '.$prenom.' '.$nom.' '.$$mailstring.' '.$phonenumber, 'devenir aventoureur <br>'.$prenom.'<br>'.$nom.'<br>'.$mailstring.'<br>'.$phonenumber); 
if(/*isset($_SESSION['deja'])*/false){

}else{ 


smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'AVENTOUR.NET', 'Devenir aventoureur', 'devenir aventoureur <br>'.$prenom.'<br>'.$nom.'<br>'.$mailstring.'<br>'.$phonenumber); 

$_SESSION['deja']=true;
}
 function smtpmailer($to, $from, $from_name, $subject, $body) {  
  global $error;
  $mail1 = new PHPMailer();  // create a new object
  $mail1->CharSet = 'UTF-8';
  $mail1->IsSMTP(); // enable SMTP
  $mail1->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail1->SMTPAuth = true;  // authentication enabled
  $mail1->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail1->Host = 'smtp.gmail.com';
  $mail1->Port = 465; 
  $mail1->Username = GUSER;  
  $mail1->Password = GPWD;           
  $mail1->SetFrom($from, $from_name);
  $mail1->Subject = $subject;
  $mail1->Body = $body;
  $mail1->MsgHTML($body);
  $mail1->AddAddress($to);
  if(!$mail1->Send()) {
    $error = 'Mail error: '.$mail1->ErrorInfo; 
    return false;
  } else {
    $error = 'Message sent!'; 
    return true;
  }
  //echo "ligne97 ";
}
  // echo "post : ";var_dump($_POST); echo "<br> session : ";var_dump($_SESSION);


// $_SESSION['login_user']= "coucou";
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';
// $_SESSION['location']=$_POST['location'];
//$_SESSION['title']=$_POST['title'];
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
<title>Devenir un AvenTourer</title>


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
<body class="no-trans">

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

    <section style="background-color: white;"  id="mybody"> 
    	<div class="">
    		<div class="row">
    			<div class="col-md-12" style="padding-top: 4em;">
    			<h1>Devenir un AvenToureur</h1>
    			<h3>Rempli ce formulaire, nous reviendrons vers toi au plus vite!</h3>
    			<!-- <h3>Envoi ton CV sur nicolas@aventour.net</h3>
          <p>Veilles à laisser tes coordonées dans le mail pour pouvoir te recontacter,</p> 
          <p>et surtout dis nous qui tu es (en quelques mots).</p> --> 
    	<br>
    	

    				


    			</div>
    		</div>
    	</div>
    </section>
     <section style="background-color: white;"> 
    	<div class="">
    		<div class="row">
    			<div class="col-md-12" style="padding-top: 4em;">
    			
    	<br>
    	
<!-- Calendly inline widget begin -->
<!-- <div class="calendly-inline-widget" data-url="https://calendly.com/aventour/aventour" style="min-width:320px;height:580px;"></div>
<script type="text/javascript" src="https://calendly.com/assets/external/widget.js"></script> -->
<!-- Calendly inline widget end -->
<!-- svddddddddddddddddddddddddddddddddddd -->
<form class="well form-horizontal" method="post"  id="defaultForm" action="recruitment.php" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->


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
  <label class="col-md-4 control-label" >*Nom: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="nom" id="nom" placeholder="Mon nom" class="form-control"  type="text" value="" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >*Prénom: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="prenom" id="prenom" placeholder="Mon prénom" class="form-control"  type="text" value="" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >*Email: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="memail" id="memail" placeholder="Mon email" class="form-control"  type="email" value="" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >*Téléphone: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="phone" id="phone" placeholder="+33612345678" class="form-control"  type="text" value="" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >*Tu as quel age? </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="age" id="age" placeholder="20" class="form-control"  type="text" value="" required>
    </div>
  </div>
</div>

<hr>
<br>

<div class="form-group">
  <label class="col-md-4 control-label" > </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <h3 class="control-label" >Ton niveau de langue </h3> 
  <!-- <input name="age" id="age" placeholder="20" class="form-control"  type="text" value="" required> -->
  <!-- <label class="radio-inline"><input type="radio" name="gender"> Male</label>
    <label class="radio-inline"><input type="radio" name="gender"> Female</label> -->
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >*Français: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <!-- <input name="phone" id="phone" placeholder="+33612345678" class="form-control"  type="text" value="" required> -->
   
 <select type="text" id="francais" name="francais" class="form-control" required>
 <option value=""></option>
            <option value="languematernel_bilingue"> Langue Maternelle - Bilingue</option>
            <option value="courant"> Courant</option>
            <option value="jemedebrouille"> Je me débrouille</option>
            <option value="non"> Non</option>
       
            

          </select>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >*Anglais: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <!-- <input name="phone" id="phone" placeholder="+33612345678" class="form-control"  type="text" value="" required> -->
   
 <select type="text" id="anglais" name="anglais" class="form-control" required>
 <option value=""></option>
            <option value="languematernel_bilingue"> Langue Maternelle - Bilingue</option>
            <option value="courant"> Courant</option>
            <option value="jemedebrouille"> Je me débrouille</option>
            <option value="non"> Non</option>
       
            

          </select>
    </div>
  </div>
</div> 

<div class="form-group">
  <label class="col-md-4 control-label" >Autres langues?</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <!-- <input name="mtexte" id="mtexte" placeholder="En quelques mots, qui es tu? :) " class="form-control"  type="text" value=""> -->
   <textarea rows="4" cols="50" placeholder="Autres langues + niveau?" name="autrelangues" id="autrelangues"></textarea>
    </div>
  </div>
</div>
<br>

<hr>




<div class="form-group">
  <label class="col-md-4 control-label" >*Situation actuelle: </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <!-- <input name="phone" id="phone" placeholder="+33612345678" class="form-control"  type="text" value="" required> -->
   
 <select type="text" id="situation" name="situation" class="form-control" required>
 <option value=""></option>
            <option value="salarie_temps_plein">Salarié à temps plein</option>
            <option value="salarie_temps_partiel">Salarié à temps partiel</option>
            <option value="etudiant">Etudiant</option>
            <option value="independant">Indépendant/Freelance</option>
            <option value="sans_emploi">Sans emploi</option>
            

          </select>
    </div>
  </div>
</div>

<!-- As-tu déjà déclaré ton activité de prestation de service pour devenir partenaire -->

<!-- <div class="form-group">
          <label class="sr-only" for="location">Location</label>
          <select id="location" name="location" class="form-control">
            <option value="paris">Paris</option>
            <option value="reunion">La Réunion</option>
            

          </select>
        </div> -->

        <hr>
<br>

<div class="form-group">
  <label class="col-md-4 control-label" > </label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <p class="" >*As-tu déjà déclaré ton activité de prestation de service pour devenir partenaire?<br>(Auto-entrepreneur,...) </p>
  <!-- <p>(Auto-entrepreneur,...)</p>  -->
  <!-- <input name="age" id="age" placeholder="20" class="form-control"  type="text" value="" required> -->
  <label class="radio-inline"><input type="radio" required name="independant" value="oui"> Oui</label>
    <label class="radio-inline"><input type="radio" required name="independant" value="non"> Non</label>
    </div>
  </div>
</div>

<hr>
<br>

<div class="form-group">
  <label class="col-md-4 control-label" >Détails</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <!-- <input name="mtexte" id="mtexte" placeholder="En quelques mots, qui es tu? :) " class="form-control"  type="text" value=""> -->
   <textarea rows="4" cols="50" placeholder="Détails (A partir de quand es tu disponible?, ...)" name="description" id="description"></textarea>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Upload ton CV</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <!-- <input name="mtexte" id="mtexte" placeholder="En quelques mots, qui es tu? :) " class="form-control"  type="text" value=""> -->

  <!-- <input id="input-1" type="file" class="file" required> -->

 <!--  <label for="icone">Icône du fichier (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="icone" id="icone" /><br /> -->
     <label for="mon_fichier">Fichier (PDF | max. 1 Mo) :</label><br />
     <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input required type="file" name="mon_fichier" id="mon_fichier" /><br />
     <!-- <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" value="Titre du fichier" id="titre" /><br /> -->

  </div>
</div>
</div>

 







<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="submit" class="btn btn-warning" >Envoyer <span class="glyphicon glyphicon-send"></span></button>
   
  </div>
</div>

</fieldset>
</form>
<!-- fffffffffffffffffffffffffffffff -->
    				


    			</div>
    		</div>
    	</div>
    </section>



<!-- <script src="TimePicker/pickerjs.js"></script> -->
<!-- <input type="text" class="timepicker" name="open"> -->
<!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>  -->
<!-- <script src="TimePicker/pickerjs.js"></script> -->
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>




</body>
</html>

<!--  -->

