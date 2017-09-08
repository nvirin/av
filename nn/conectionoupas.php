<?php 

session_start();
//var_dump($_SESSION);
if(isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])){

  if(empty($phonenumber1)){
   header("Location: http://www.aventour.net/phone/");

//header("Location: http://www.aventour.net/");
}else{

  //$_SESSION['okphone']='ok';
}

if(!isset($_SESSION['okphone'])){

//     try{
// $bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// // $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
// }
// catch (Exception $e)
// { echo "ERRREUR";
//         die('Erreur : ' . $e->getMessage());
// }

// $mailhex=$_SESSION['myid'];
//     for ($i=0; $i < strlen($mailhex)-1; $i+=2){
//        $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
//     }


//   $req00 = $bdd->prepare('SELECT `phonenumber`FROM user WHERE mail = ?');
// $req00->execute(array($mailstring));
// $result00 = $req00->fetch(PDO::FETCH_ASSOC);
//print_r($result);
// $lv1=$result['lv1'];
// $lv2=$result['lv2'];
// $lv3=$result['lv3'];
//$phonenumber1=$result00['phonenumber'];
//$mapresentation=$result['mapresentation'];


}

	$data=$_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'].'/data.txt';

	$pathimage='../users/'.$_SESSION['myid'].'/profile.jpg';

	$json = file_get_contents($data);
	//var_dump($json);
   $jsondec=json_decode($json,true);
   //var_dump($json);
   $fname=$jsondec['first_name'];



	  echo'  <div class="dropdown">
    <a href="#" class="btn dropdown-toggle"  data-toggle="dropdown" id="usernameHeaderField" style="color: whitesmoke; background-color: rgba(255, 255, 255, 0.25);">'.$fname .' <b class="caret"></b></a>
    <ul class="dropdown-menu" style="background-color: white;"> 
      <img class="thumbnail" style="height:100px; float-left; margin:3px" src="'.$pathimage.'">

      <li>
        <a href="../profile/"><i class="fa fa-fw fa-user"></i> Profile</a>
      </li>
      <li>
        <a href="../setting/"><i class="fa fa-fw fa-gear"></i> Editer Profile</a>
      </li>
      <li>
        <a href="../mesversement/"><i class="fa fa-fw fa-eur"></i> Mes versements</a>
      </li>
      <li>
        <a href="../mestours/"><i class="fa fa-fw fa-bicycle"></i > Mes Tours</a>
      </li>
      <li>
        <a href="#"><i class="fa fa-fw fa-calendar"></i > Mes Réservations (Beta)</a>
      </li>

      <li>
        <a href="#"><i class="fa fa-fw fa-user"></i> Parainages</a>
      </li>
     
      <li class="divider"></li>
      <li>
        <a href="../signout4.php"><i class="fa fa-fw fa-power-off"></i> Se deconnecter</a>
      </li>
    </ul>
  </div>';




	//echo"<a href=\"signout4.php\" class=\"btn\" id=\"monConectInscris\">".$_SESSION['login_user_prenom']."</a>";
	// echo "<div class=\"dropdown\">";
	// echo "<a href=\"signout4.php\" data-toggle=\"dropdown\" class=\"btn dropdown-toggle\" id=\"monConectInscris\"><img src=\"".$pathimage."\" class=\"img-circle\" height=\"48\" width=\"48\"></a>";
	// echo "<span class=\"caret\"></span></button>
 //  <ul class=\"dropdown-menu\">
 //    <li><a href=\"#\">HTML</a></li>
 //    <li><a href=\"#\">CSS</a></li>
 //    <li><a href=\"#\">JavaScript</a></li>
 //  </ul>
 //  </div>";

	// echo "<ul><li class=\"dropdown active\">
 //    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" id=\"usernameHeaderField\"><i class=\"fa fa-user\"></i>Administrator <b class=\"caret\"></b></a>
 //    <ul class=\"dropdown-menu\">
 //      <img class=\"thumbnail\" style=\"height:100px; float-left; margin:10px\" src=\"default.jpg\">

 //      <li>
 //        <a href=\"profile.php\"><i class=\"fa fa-fw fa-user\"></i> Profile</a>
 //      </li>
 //      <li>
 //        <a href=\"sendEmail.php\"><i class=\"fa fa-fw fa-envelope-o\"></i>Send email report</a>
 //      </li>
 //      <li>
 //        <a href=\"settings.php\"><i class=\"fa fa-fw fa-gear\"></i> Settings</a>
 //      </li>
 //      <li class=\"divider\"></li>
 //      <li>
 //        <a href=\"logout.php\"><i class=\"fa fa-fw fa-power-off\"></i> Log Out</a>
 //      </li>
 //    </ul>
 //  </li></ul>";

}else{
	echo '<li class="active"><a href="signinregister" class="btn" id="monConectInscris">Se connecter / S\'enregistrer</a></li>';
 }
 ?> 
 <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="css/style.css" rel="stylesheet"> -->
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 


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

    
     
