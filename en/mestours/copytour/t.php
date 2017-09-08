<?php 

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req0002 = $bdd->prepare("UPDATE `ma_base`.`voyage` SET `detail_voyage`=:detail_voyage WHERE idtour=:idtour");
    $req0002->execute(array(
      "detail_voyage" => 'sdvsd', 
      "idtour" => 'Randonnmafate666651b'       
            ));



 ?>