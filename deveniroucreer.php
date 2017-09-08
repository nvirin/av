<?php 

session_start();
//var_dump($_SESSION);
if(isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])){



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


   $req000 = $bdd->prepare('SELECT `checkAventourer`, `phonenumber` FROM user WHERE mail = ?');
$req000->execute(array($mailstring));
$result000 = $req000->fetch(PDO::FETCH_ASSOC);
$phonenumber1=$result000['phonenumber'];
//print_r($result);

$checkAventourer000=$result000['checkAventourer'];
if($checkAventourer000=='0'){
   //header("Location: http://www.aventour.net/phone/");

//header("Location: http://www.aventour.net/");
   echo '<li><a href="creationaventoursuite.php" class="btn" id="monCQuoi" style="outline: none;">Devenir AvenToureur! <br> (Guide)

</a></li>';
}else{
	echo '<li><a href="" class="btn" data-toggle="modal" data-target="#project-11" id="monCQuoi">Creer Tour!

</a></li>';

  //$_SESSION['okphone']='ok';
}



	


}else{
	echo '<li><a href="creationaventoursuite.php" class="btn" id="monCQuoi">Devenir Aventoureur! <br>(Guide)

</a></li>';
 }
 ?> 
 <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="css/style.css" rel="stylesheet"> -->
 <!-- // <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  -->


       <!--  <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Iasmani Pinazo <span class="glyphicon glyphicon-user pull-right"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            <li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul> 
        </div> -->

    
     
