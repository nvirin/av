<?php 
session_start();

// echo "post : ";var_dump($_POST); echo "<br> session : ";var_dump($_SESSION);
//     $_SESSION['location']=$_POST['location'];
// $_SESSION['title']=$_POST['title'];
// $_SESSION['datepicker']=$_POST['datepicker'];
// $_SESSION['time']=$_POST['time'];
// $_SESSION['duree']=$_POST['duree'];
// $_SESSION['tag1']=$_POST['tag1'];
// $_SESSION['tag2']=$_POST['tag2'];
// $_SESSION['tag3']=$_POST['tag3'];
// $_SESSION['minimum']=$_POST['minimum']; 
// $_SESSION['maximum']=$_POST['maximum'];
// $_SESSION['locationDeparture']=$_POST['locationDeparture'];

//$_POST['mytour'];$_POST['mytour'];



//////////////////////
// $_POST['title'];
// $_POST['location'];
// $_POST['locationDeparture'];
// $_POST['datepicker'];
// $_POST['time'];
// $_POST['duree'];
// $_POST['minimum'];
// $_POST['maximum'];
// $_POST['tag1'];
// $_POST['tag2'];
// $_POST['tag3'];
// $_POST['prix'];
// $_POST['sup'];

// $_POST['pasdeperssup'];
// $_POST['details'];
// $_POST['prerequis'];

$idtour = $_POST['mytour'];
$idtrip = $_POST['mytrip'];

// header('Location: editertoursuite2.php?mytrip='.$idtrip.'&mytour='.$idtour);//



if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){

    //header('Location: signinregister/index.php');
  //include $_SERVER['DOCUMENT_ROOT'].'/commentdevenirunaventoureur.php'; 
  //die();
  header('Location: http://www.aventour.net/connectetoi.html');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter =/ <br><a href="http://www.aventour.net/signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!((isset($_POST['mytrip'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_POST['mytrip'])))){
 header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>1s d\'abord te connecter pour réserver un tour =P <br><a href="signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(!isset($_POST['mytour'])){
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
$tour = $_POST['mytour'];
$req0->execute(array($tour));

if (!( $req0->rowCount() == 1 )) {
  // do something here
  // var_dump($tour);
  // die();
    header('Location: http://www.aventour.net/');
    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, un problème. Ce tour n\'existe pas. Peux tu nous le signaler? ^^<br><a href="myindexdev.php">Page d\'acceuil</a></h1></div></html');
   
}else{

// 	$_POST['title'];
// $_POST['location'];
// $_POST['locationDeparture'];
// $_POST['datepicker'];
// $_POST['time'];
// $_POST['duree'];
// $_POST['minimum'];
// $_POST['maximum'];
// $_POST['tag1'];
// $_POST['tag2'];
// $_POST['tag3'];
// $_POST['prix'];
// $_POST['sup'];

// $_POST['pasdeperssup'];
// $_POST['details'];
// $_POST['prerequis'];


if(isset($_POST['title'])){
  if(!empty($_POST['title'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `title`=:title WHERE idtour=:idtour");
    $req->execute(array(
      "title" => $_POST['title'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['location'])){
  if(!empty($_POST['location'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `lieu_voyage`=:lieu_voyage WHERE idtour=:idtour");
    $req->execute(array(
      "lieu_voyage" => $_POST['location'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['locationDeparture'])){
  if(!empty($_POST['locationDeparture'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `locationDeparture`=:locationDeparture WHERE idtour=:idtour");
    $req->execute(array(
      "locationDeparture" => $_POST['locationDeparture'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['datepicker'])){
  if(!empty($_POST['datepicker'])){

  	 $myDateTime = DateTime::createFromFormat('d/m/Y', $_POST['datepicker']);
$newDateString = $myDateTime->format('Y-m-d');
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `date_voyage`=:date_voyage WHERE idtour=:idtour");
    $req->execute(array(
      "date_voyage" => $newDateString, 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['time'])){
  if(!empty($_POST['time'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `heure_voyage`=:heure_voyage WHERE idtour=:idtour");
    $req->execute(array(
      "heure_voyage" => $_POST['time'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['duree'])){
  if(!empty($_POST['duree'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `duree_voyage`=:duree_voyage WHERE idtour=:idtour");
    $req->execute(array(
      "duree_voyage" => $_POST['duree'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['minimum'])){
  if(!empty($_POST['minimum'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `min_personne`=:min_personne WHERE idtour=:idtour");
    $req->execute(array(
      "min_personne" => $_POST['minimum'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['maximum'])){
  if(!empty($_POST['maximum'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `max_personne`=:max_personne WHERE idtour=:idtour");
    $req->execute(array(
      "max_personne" => $_POST['maximum'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['tag1'])){
  if(!empty($_POST['tag1'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `tag1`=:tag1 WHERE idtour=:idtour");
    $req->execute(array(
      "tag1" => $_POST['tag1'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['tag2'])){
  if(!empty($_POST['tag2'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `tag2`=:tag2 WHERE idtour=:idtour");
    $req->execute(array(
      "tag2" => $_POST['tag2'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['tag3'])){
  if(!empty($_POST['tag3'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `tag3`=:tag3 WHERE idtour=:idtour");
    $req->execute(array(
      "tag3" => $_POST['tag3'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['prix'])){
  if(!empty($_POST['prix'])){

$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `prix`=:prix WHERE idtour=:idtour");
    $req->execute(array(
      "prix" => floor($_POST['prix']), 
    	 // "prix" => '60', 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['sup'])){ 
  if(!empty($_POST['sup'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `prixsupp`=:prixsupp WHERE idtour=:idtour");
    $req->execute(array(
      "prixsupp" => floor($_POST['sup']), 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['pasdeperssup'])){ 
  if(!empty($_POST['pasdeperssup'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `pasdeperssup`=:pasdeperssup WHERE idtour=:idtour");
    $req->execute(array(
      "pasdeperssup" => $_POST['pasdeperssup'], 
      "idtour" => $tour,         
            ));
    } 
}else{

	$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `pasdeperssup`=:pasdeperssup WHERE idtour=:idtour");
    $req->execute(array(
      "pasdeperssup" => '', 
      "idtour" => $tour,         
            ));



}
if(isset($_POST['details'])){ 
  if(!empty($_POST['details'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `detail_voyage`=:detail_voyage WHERE idtour=:idtour");
    $req->execute(array(
      "detail_voyage" => $_POST['details'], 
      "idtour" => $tour,         
            ));
    } 
}
if(isset($_POST['prerequis'])){ 
  if(!empty($_POST['prerequis'])){
$req = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `prerequis`=:prerequis WHERE idtour=:idtour");
    $req->execute(array(
      "prerequis" => $_POST['prerequis'], 
      "idtour" => $tour,         
            ));
    } 
} 

 header('Location: http://www.aventour.net/mestours/');
//var_dump($_POST);
 
 //http://www.aventour.net/mestours/
//   $req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage,voyage.locationDeparture, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE idtour= ?');

//  $req->execute(array($tour));
// $result = $req->fetch(PDO::FETCH_ASSOC);
// //print_r($result);
// $title=$result['title'];
// $lieu_voyage=$result['lieu_voyage'];
// $locationDeparture=$result['locationDeparture'];
// $date_voyage=$result['date_voyage'];
// $heure_voyage=$result['heure_voyage'];
// $duree_voyage=$result['duree_voyage'];
// $min_personne=$result['min_personne'];
// $max_personne=$result['max_personne'];

// $tag1=$result['tag1'];
// $tag2=$result['tag2'];
// $tag3=$result['tag3'];

// $lv1=$result['lv1'];
// $lv2=$result['lv2'];
// $lv3=$result['lv3'];
// $phonenumber=$result['phonenumber'];
// $mapresentation=$result['mapresentation'];

// $prix=$result['prix'];
// $prixsupp=$result['prixsupp'];
// $pasdeperssup=$result['pasdeperssup']; 
   

}

}



 ?>

   