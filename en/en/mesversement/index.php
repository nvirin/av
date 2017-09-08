<?php  
session_start();

if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Hey, You have to sign up before creating a tour =/ <br><a href="http://aventour.net/en/signinregister/">Sign in</a></h1></div></html');

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

$req = $bdd->prepare('SELECT `lv1`, `lv2`, `lv3`, `phonenumber`, `mapresentation` , `mailpaypal` FROM user WHERE mail = ?');
$req->execute(array($mailstring));
$result = $req->fetch(PDO::FETCH_ASSOC);
//print_r($result);
$lv1=$result['lv1'];
$lv2=$result['lv2'];
$lv3=$result['lv3'];
$phonenumber=$result['phonenumber'];
$mapresentation=$result['mapresentation'];
$mailpaypal=$result['mailpaypal'];

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
                        <a href="http://aventour.net/en/creationaventoursuite.php">Create a tour</a>
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
<legend>My payments</legend>

<!-- Text input-->
<p>The payments will be done once the tour will be done</p>

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
      <h3>Solde: 0.00 €</h3>
       
      </div>
<hr>
<!-- Text input-->









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

<div class="form-group">
  <label class="col-md-4 control-label">1. I have paypal account or create one just there </label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span> -->
        <a href="https://www.paypal.com/fr/home" target="_blank">Create a paypal account</a>
  <!-- <input name="mailpaypal" placeholder='<?php if(!empty($mailpaypal)){echo $mailpaypal;}else{echo 'Entre ton mail paypal';} ?>' class="form-control"> -->
    </div>
  </div>
</div> 

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">2. I fill my paypal email</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="mailpaypal" placeholder='<?php if(!empty($mailpaypal)){echo $mailpaypal;}else{echo 'Enter your paypal email';} ?>' class="form-control">
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
    <button type="submit" name="submit" class="btn btn-warning" >Confirm</button>

              <button onclick="location.href = 'http://www.aventour.net/en/'" type="reset" name="reset" class="btn btn-warning" value="Cancel">Cancel</button>
   
  </div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label"></label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span> -->
        <h6>As soon an other way of payments (directly via your RIB)</h6>

  <!-- <input name="mailpaypal" placeholder='<?php if(!empty($mailpaypal)){echo $mailpaypal;}else{echo 'Entre ton mail paypal';} ?>' class="form-control"> -->
    </div>
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