<?php 
session_start();
// echo'<br>';echo'<br>';
// error_reporting(E_ALL);
// ini_set('display_errors', true);echo'<br>';echo'<br>';
// var_dump($_POST); 
if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour créer un tour =/ <br><a href="../signinregister/index.php">Se connecter</a></h1></div></html');

}elseif(isset($_POST['submit'])){
	if(isset($_POST['mailpaypal'])){
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


if(isset($_POST['mailpaypal'])){

  if(!empty($_POST['mailpaypal'])){
$req = $bdd->prepare("UPDATE `ma_base`.`user` SET `mailpaypal`=:mailpaypal WHERE mail=:mail");
    $req->execute(array(
      "mailpaypal" => $_POST['mailpaypal'], 
      "mail" => $mailstring,         
            ));
    } 
}





// $lv1='';
// $lv2='';
// $lv3='';
// $phonenumber='';
//header('Location: http://aventour.io/myindexdev.php');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé <br>'.$erreur.'<br><a href="http://aventour.net/">Home</a></h1></div></html');

//echo'coucou0 '.$mailstring;

}
}else{
	//header('Location: http://aventour.io/myindexdev.php');
  die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé  <br>'.$erreur.'<br><a href="http://aventour.net/">Home</a></h1></div></html');
	//echo'coucou1 ';

	}

    die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé  <br>'.$erreur.'<br><a href="http://aventour.net">Home</a></h1></div></html');

 ?>


    <html>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <div class="col-md-12 center">
    <h1 style="text-align:center">
    <br><br>Edition terminé <br>
    <a href="http://aventour.net/">Home</a>
    </h1>
    </div>
    </html>

