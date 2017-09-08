<?php 
session_start();
// echo'<br>';echo'<br>';
// error_reporting(E_ALL);
// ini_set('display_errors', true);echo'<br>';echo'<br>';
// var_dump($_POST); 
if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour créer un tour =/ <br><a href="../en/signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(isset($_POST['submit'])){
	if(isset($_POST['lv1'])||isset($_POST['lv2'])||isset($_POST['lv3'])||isset($_POST['phone'])||isset($_POST['presentation'])){
// $lv1=$_POST['lv1'];
// $lv2=$_POST['lv2'];
// $lv3=$_POST['lv3'];
// //$password=$_POST['password'];
// $phonenumber=$_POST['phone'];

		$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }

    $upload=false;
    //$mailstring=$mailhex;



try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}


// $req = $bdd->prepare('SELECT `lv1`, `lv2`, `lv3`, `phonenumber` FROM user WHERE mail = ?');
// $req->execute(array($profile['email']));


// $req = $bdd->prepare("INSERT INTO `ma_base`.`user` (`lv1`, `lv2`, `lv3`, `phonenumber`) VALUES (:lv1, :lv2, :lv3, :phonenumber)");
//     $req->execute(array(
//             "lv1" => $nom, 
//             "lv2" => $prenom,
//             "lv3" => $mail,
//             "phonenumber" => $phonenumber,
            
//             ));
// if(isset($_POST['datafile'])){

//   if(!empty($_POST['datafile'])){

// $path=$_SERVER['DOCUMENT_ROOT'].'/users/'.$mailhex;
// $img = $path.'/couverture.jpg';
//  if (!file_exists($path)) {
//     mkdir($path, 0777, true);
// }
// file_put_contents($img, file_get_contents($_POST['datafile']));

// } 
// }
//var_dump($_FILES);

if(isset($_FILES['datafile']))
  if(!empty($_FILES['datafile']['tmp_name'])){
{ 
  $erreur=null;
  $fichierb = basename($_FILES['datafile']['name']);
  $taille_maxi = 6815744;//6815744 1024*1024*6.5 (6.5mo)
   $taille = filesize($_FILES['datafile']['tmp_name']);
  $extensions = array('.jpg');
 $extension = strrchr($_FILES['datafile']['name'], '.');
 $fichier = 'couverture'.$extension;
 //Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Sauf pour la photo de couverture: Vous devez uploader un fichier de type jpg';
}
if($taille>$taille_maxi)
{
     $erreur = 'Sauf pour la photo de couverture: L\'image uploadé est trop gros...';
}
if(!isset($erreur)){


     $dossier = $_SERVER['DOCUMENT_ROOT'].'/users/'.$mailhex;
     //$fichier = 'couverture.jpg';
     if(move_uploaded_file($_FILES['datafile']['tmp_name'], $dossier .'/'. $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
         // echo 'Upload effectué avec succès !';
      //$erreur = 'Upload effectué avec succès !';

     $upload=true;
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          //echo 'Echec de l\'upload !';
      $erreur = 'Echec de l\'upload de la photo de couverture!';
     }

   }else{

    //echo $erreur;
   }

   if($upload){

     /* purge.php
 * Purge an url on this host
 */
header("Cache-Control: max-age=1"); // don't cache ourself
 
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
 
// Set to true to hide varnish result
define("SILENT", false);
 
$path = isset($_GET["path"]) ? $_GET["path"] : "";
 
$purge_url = "http://" . $_SERVER["HTTP_HOST"].'/users/'.$mailhex.'/couverture.jpg' ;//. "/setting/index.php";
 
if ( $ch = curl_init($purge_url) ) {
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PURGE");
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_NOBODY, SILENT);
 
    curl_exec($ch);
    curl_close($ch);
}
   }


}
}

// $dossier = $_SERVER['DOCUMENT_ROOT'].'/users/'.$mailhex;
// $fichier = basename($_FILES['datafile']['name']);
// $taille_maxi = 100000;
// $taille = filesize($_FILES['datafile']['tmp_name']);
// $extensions = array('.png', '.gif', '.jpg', '.jpeg');
// $extension = strrchr($_FILES['datafile']['name'], '.'); 
// //Début des vérifications de sécurité...
// if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
// {
//      $erreur = 'Vous devez uploader un fichier de type jpg';
// }
// if($taille>$taille_maxi)
// {
//      $erreur = 'Le fichier est trop gros...';
// }
// if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
// {
//      //On formate le nom du fichier ici...
//      $fichier = 'couverture'.$extension/*.jpg' strtr($fichier, 
//           'coucou', 
//           'Aaaaa');*/
//      //$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
//      if(move_uploaded_file($_FILES['datafile']['tmp_name'], $dossier .'/'. $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
//      {
//           echo 'Upload effectué avec succès !';
//      }
//      else //Sinon (la fonction renvoie FALSE).
//      {
//           echo 'Echec de l\'upload !';
//      }
// }
// else
// {
//      echo $erreur;
// }


if(isset($_POST['lv1'])){

  if(!empty($_POST['lv1'])){
$req = $bdd->prepare("UPDATE `ma_base`.`user` SET `lv1`=:lv1 WHERE mail=:mail");
    $req->execute(array(
      "lv1" => $_POST['lv1'], 
      "mail" => $mailstring,         
            ));
    } 
}


if(isset($_POST['lv2'])){
  if(!empty($_POST['lv2'])){
    $req1 = $bdd->prepare("UPDATE `ma_base`.`user` SET `lv2`=:lv2 WHERE mail=:mail");
    $req1->execute(array(
      "lv2" => $_POST['lv2'],
      "mail" => $mailstring,          
            ));
  }//echo'cou0 '.$mailstring;
}
if(isset($_POST['lv3'])){
  if(!empty($_POST['lv3'])){
    $req2 = $bdd->prepare("UPDATE `ma_base`.`user` SET `lv3`=:lv3 WHERE mail=:mail");
    $req2->execute(array(
      "lv3" => $_POST['lv3'],
      "mail" => $mailstring,          
            ));
  }
}
if(isset($_POST['phone'])){
  if(!empty($_POST['phone'])){
    $req3 = $bdd->prepare("UPDATE `ma_base`.`user` SET `phonenumber`=:phonenumber  WHERE mail=:mail");
    $req3->execute(array(
      "phonenumber" => $_POST['phone'],
      "mail" => $mailstring,          
            ));
  }
}

if(isset($_POST['presentation'])){
  if(!empty($_POST['presentation'])){
    $req4 = $bdd->prepare("UPDATE `ma_base`.`user` SET `mapresentation`=:mapresentation  WHERE mail=:mail");
    $req4->execute(array(
      "mapresentation" => $_POST['presentation'],
      "mail" => $mailstring,          
            ));
  }
}



// $lv1='';
// $lv2='';
// $lv3='';
// $phonenumber='';
//header('Location: http://aventour.io/myindexdev.php');
header('Location: http://www.aventour.net/confirmation.html');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé <br>'.$erreur.'<br><a href="http://aventour.net/en/mesversement/">Continuer</a></h1></div></html');

//echo'coucou0 '.$mailstring;

}
}else{
	//header('Location: http://aventour.io/myindexdev.php');
  header('Location: http://www.aventour.net/confirmation.html');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé  <br>'.$erreur.'<br><a href="http://aventour.net/en/mesversement">Continuer</a></h1></div></html');
	//echo'coucou1 ';

	} 
header('Location: http://www.aventour.net/confirmation.html');
    die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé  <br>'.$erreur.'<br><a href="http://aventour.net/en/mesversement/">Continuer</a></h1></div></html');

 ?>


    <html>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <div class="col-md-12 center">
    <h1 style="text-align:center">
    <br><br>Edition terminé <br>
    <a href="http://aventour.net/en/mesversement/">Home</a>
    </h1>
    </div>
    </html>

