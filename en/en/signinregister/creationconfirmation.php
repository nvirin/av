<?php 


 $_SESSION['location']="12";
$_SESSION['title']="12";
$_SESSION['datepicker']="12";
$_SESSION['time']="12";
$_SESSION['duree']="12";
$_SESSION['tag1']="12";
$_SESSION['tag2']="12";
$_SESSION['tag3']="";
$_SESSION['minimum']="12";
$_SESSION['maximum']="12";
$_POST['prix']="12";
$_POST['details']='12';

$prix=$_POST['prix'];

echo $_POST['prix'];
echo $_POST['details'];

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare("INSERT INTO `ma_base`.`voyage` (`date_voyage`, `heure_voyage`, `lieu_voyage`, `duree_voyage`, `tag1`, `tag2`, `tag3`, `prix`, `min_personne`, `max_personne`, `detail_voyage`, `done`, `id_mail`) VALUES (:date_voyage, :heure_voyage, :lieu_voyage, :duree_voyage, :tag1, :tag2, :tag3, :prix, :min_personne, :max_personne, :detail_voyage, :done, :id_mail)");
    $req->execute(array(
            "date_voyage" => $_SESSION['datepicker'], 
            "heure_voyage" => $_SESSION['time'],
            "lieu_voyage" => $_SESSION['location'],
            "duree_voyage" => $_SESSION['duree'],

            "tag1" => $_SESSION['tag1'], 
            "tag2" => $_SESSION['tag2'],
            "tag3" => $_SESSION['tag3'],
            "prix" => $_POST['prix'],

            "min_personne" => $_SESSION['minimum'],
            "max_personne" => $_SESSION['maximum'],
            "detail_voyage" => $_POST['details'],
            "done" => '0',
            "id_mail" => $_SESSION['mail'],
            
            ));
$req->closeCursor(); 

$_SESSION['location']="12";
$_SESSION['title']="12";
$_SESSION['datepicker']="12";
$_SESSION['time']="12";
$_SESSION['duree']="12";
$_SESSION['tag1']="12";
$_SESSION['tag2']="12";
$_SESSION['tag3']="";
$_SESSION['minimum']="12";
$_SESSION['maximum']="12";



$_POST['prix']="";
$_POST['details']="";

echo "Tour créé";

sleep(5);
//header("location: myindexdev.php");
//








 ?>