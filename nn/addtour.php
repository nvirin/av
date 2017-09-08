<?php 
//recupere post setting (+$_SESSION['idtour']?? pense pas)
// Si je suis la cela veut dire ajouter plusieurs dates (10 maximum), le faire (formulaire + bootstrap) decocher celui déjà fait




//aller dans addTourConfirmed.php avec les dates selctionnés 


 ?>

 <!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ajouter dates</title>


    <link rel="stylesheet" href="signinregister/test/b/vendor/bootstrap/css/bootstrap.css"/>
   
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- // <script type="text/javascript" src="signinregister/test/b/vendor/jquery/jquery-1.10.2.min.js"></script> -->
    <script type="text/javascript" src="signinregister/test/b/vendor/bootstrap/js/bootstrap.min.js"></script>
   

    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <!-- // <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
       <script src="signinregister/js/datepicker-fr.js"></script>
<script type="text/javascript" src="test01/date/jquery-ui.multidatespicker.js"></script>
        <!-- // <script src="signinregister/js/pickerjs.js"></script> -->

     <!-- <script type="text/javascript" src="test/b/test/spec/verbose.js"></script> -->
     <script>
         $(function() {
            // $( "#datepicker-13" ).datepicker();

 //            $( "#datepicker-13" ).multiDatesPicker({
 //            	minDate: 0,
	// maxDate: 90,
	// maxPicks: 10

 //            });
             $("#datepicker-13-show").multiDatesPicker({
             	altField: "#datepicker-13",
minDate: 0,
	maxDate: 90,
	maxPicks: 10,
	numberOfMonths: [2,2]
             }

             	);

//             $('#datepicker-13').multiDatesPicker({
//             	minDate: 0,
// 	maxDate: 90,
// 	maxPicks: 10,
//     onSelect: function(date, obj){
//         $('#datepicker-13').val(date);  //Updates value of of your input 
//     }
// });


            //$( "#datepicker-13" ).datepicker('show');
//             $('#maxPicks').multiDatesPicker({
// 	maxPicks: 2
// });
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
        <div class="col-lg-8">
           
            <form class="well form-horizontal" method="post"  id="defaultForm" action="creationaventoursuite3.php" style="
    background-color: #edefed;
    border: 0px;
">
<fieldset>

<!-- Form Name -->
<legend></legend><br><h2></h2>

<br>




<div class="form-group">
  <label class="col-md-4 control-label" ></label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
 <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> -->
  <!-- <input name="password" placeholder="Mot de passe" class="form-control"  type="password" required> -->
  <div id="datepicker-13-show"></div>
  <input type="text" class="form-control hidden"  placeholder="Ajouter dates" id="datepicker-13" name="datepicker" value="" style="
    z-index: -1;
">
<!-- <div id="datepicker-13"></div> -->
    </div>
  </div>
</div>
<br>


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

          
        </div>
    </div>
</div>
</section>



</body>
</html>

<!--  -->

