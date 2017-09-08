<?php 
session_start();

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

var_dump($_SESSION);die;
$m=$_SESSION['idtour2'];


$req0002 = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `detail_voyage`=:detail_voyage WHERE idtour='".$m."'");
    $req0002->execute(array(
      "detail_voyage" => $_SESSION['detail_voyage'], 
      // "idtour" => $idtour2    Randonnmafate575aaaa
      // "idtour" =>  $_SESSION['idtour2']
      // "idtour" =>  'Randonnmafate575aaaa' 'Randonnmafate575aaaa'
            ));
   

header('Location: http://www.aventour.net/mestours/');


 ?>