<?php  
session_start();

if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour créer un tour =/ <br><a href="http://aventour.net/signinregister/index.php">Se connecter</a></h1></div></html');

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

$req = $bdd->prepare('SELECT `lv1`, `lv2`, `lv3`, `phonenumber`, `mapresentation` FROM user WHERE mail = ?');
$req->execute(array($mailstring));
$result = $req->fetch(PDO::FETCH_ASSOC);
//print_r($result);
$lv1=$result['lv1'];
$lv2=$result['lv2'];
$lv3=$result['lv3'];
$phonenumber=$result['phonenumber'];
$mapresentation=$result['mapresentation'];

?> 

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editer profile</title>


    <link rel="stylesheet" href="test/b/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="test/b/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="test/b/vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="test/b/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="test/b/dist/js/bootstrapValidator.js"></script>
     <!-- <script type="text/javascript" src="test/b/test/spec/verbose.js"></script> -->

    <style type="text/css">

#mybody{
    /*padding-top: 90px;*/
    background-color: #EDEFED;
    text-align: center;
        }
    
        #login-form-link, #register-form-link  {

    /*padding-top: 90px;*/
    background-color: rgba(255, 255, 255, 0);


}

.porfolioCover {
background-size: cover;
width: 100%;
height: 300px;
}

/**/
</style>
<script type="text/javascript" src="dist/js/formfieldlimiter.js"></script>

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
                        <a href="http://www.aventour.net/creationaventoursuite.php">Créer tour</a>
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

 <section>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="page-header">
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div>

            </div>

            <form class="well form-horizontal" method="post" name="sampleform" id="defaultForm" action="editerdone.php" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Edition profile</legend>

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

<!-- left column -->
      <div class="form-group">
        <div class="text-center">
          <!-- <img src="//placehold.it/100" class="avatar img" alt="avatar"> -->
          <?php 
                 $couverture='../users/'.$_SESSION['myid'].'/couverture.jpg';
          if(file_exists('../users/'.$_SESSION['myid'].'/couverture.jpg')){
            echo '<div class="porfolioCover img-responsive" style="background-image:url('.$couverture.')"></div>';
          }else{

            echo '<div class="porfolioCover img-responsive" style="background-image:url(\'//placehold.it/100\')"></div>';
          }

           ?>
          
          <h6>Changer photo de couverture (en .jpg et 5mo max)</h6>

           <!-- On limite le fichier à 6mo -->
     <input type="hidden" name="MAX_FILE_SIZE" value="6291456"> 
     <!-- 6MB 1024*1024*6 -->
          
          <input type="file" name="datafile" accept="image/jpeg" class="form-control text-center">
        </div>
      </div>
<hr>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Langue Maternelle</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <!-- <input name="last_name" placeholder="Prénom" class="form-control"  type="text" required> -->

  <select class="form-control" name="lv1">
        <option selected value=''><?php echo $lv1; ?></option>
		<option value="Français">Français</option>
		<option value="Anglais">Anglais</option>
		<option value="Espagnol">Espagnol</option>
		<option value="Allemand">Allemand</option>
		<option value="Italian">Italien</option>
		<option value="Japonais">Japonais</option>
		<option value="Autre">Autre</option>

	</select>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Deuxième Langue</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <!-- <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required> -->
    <select class="form-control" name="lv2">
    <option selected value=''><?php echo $lv2; ?></option>
		<option value="Français">Français</option>
		<option value="Anglais">Anglais</option>
		<option value="Espagnol">Espagnol</option>
		<option value="Allemand">Allemand</option>
		<option value="Italian">Italien</option>
		<option value="Japonais">Japonais</option>
		<option value="Autre">Autre</option>
		<option value="">--</option>


	</select>

    </div>


  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Troisième Langue</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <!-- <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required> -->
   <select class="form-control" name="lv3">
   <option selected value=''><?php echo $lv3; ?></option>
		<option value="Français">Français</option>
		<option value="Anglais">Anglais</option>
		<option value="Espagnol">Espagnol</option>
		<option value="Allemand">Allemand</option>
		<option value="Italian">Italien</option>
		<option value="Japonais">Japonais</option>
		<option value="Autre">Autre</option>
		<option value="">--</option>

	</select>

    </div>
  </div>
</div>


<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-4 control-label" >Mot de passe</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="password" placeholder="Mot de passe" class="form-control"  type="password" required>
    </div>
  </div>
</div> -->

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
       
<div class="form-group">
  <label class="col-md-4 control-label">Téléphone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder='<?php if(!empty($phonenumber)){echo $phonenumber;}else{echo 'Ex: +33601234567';} ?>' class="form-control" type="tel">
    </div>
  </div>
</div> 

<div class="form-group">
  <h3><label class="col-md-0 control-label center">Ma présentation</label></h3>
  <!-- <div class="col-md-12" id="presentation-status"></div> -->

  <div class='col-md-12'><p><?php  if(!empty($mapresentation)){echo '<u>Ma présentation actuel:</u><br>'.$mapresentation;} ?></p></div> 

    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span> -->
  <!-- <input name="phone" placeholder='<?php echo $phonenumber; ?>' class="form-control" type="tel"> -->
  <!-- <textarea class="form-control" name="johndoe" id="johndoe" rows="5" id="comment"></textarea> -->
  <textarea class="form-control" placeholder=<?php  if(!empty($mapresentation)){echo '\'Editer ma présentation...\'';}else{echo '\'Une petite présentation sur moi...\'';} ?> value='' name="presentation" id="presentation" rows="8"></textarea>

                                        <!-- <textarea type="text" rows="8" name="details" id="title" tabindex="1" class="form-control" placeholder="Ballade" value=""></textarea> -->
                                         
   
    </div>
  </div>
  <p><div class="col-md-12" id="presentation-status"></div></p>

  
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
    <button type="submit" name="submit" class="btn btn-warning" >Confirmer</button>

              <button onclick="location.href = 'http://www.aventour.net/'" type="reset" name="reset" class="btn btn-warning" value="Cancel">Annuler</button>
   
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

<script type="text/javascript">

//Example 1:

fieldlimiter.setup({
	thefield: document.sampleform.george, //reference to form field
	maxlength: 10,
	statusids: ["george-status"], //id(s) of divs to output characters limit in the form [id1, id2, etc]. If non, set to empty array [].
	onkeypress:function(maxlength, curlength){ //onkeypress event handler
		if (curlength<maxlength) //if limit hasn't been reached
			this.style.border="2px solid gray" //"this" keyword returns form field
		else
			this.style.border="2px solid red"
	}
})

//Example 2:

fieldlimiter.setup({
	thefield: document.getElementById("presentation"), //reference to form field
	maxlength: 150,
	statusids: ["presentation-status"], //id(s) of divs to output characters limit. If non, set to empty array [].
	onkeypress:function(maxlength, curlength){ //onkeypress event handler
		//define custom event actions here if desired
	}
})

</script>





</body>
</html>