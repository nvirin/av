<?php 
session_start();
// echo'<br>';echo'<br>';
// error_reporting(E_ALL);
// ini_set('display_errors', true);echo'<br>';echo'<br>';
// var_dump($_POST); 
if(!((isset($_SESSION['myid'])&&file_exists($_SERVER['DOCUMENT_ROOT'].'/users/'.$_SESSION['myid'])))){
    //header('Location: signinregister/index.php');
 // die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Ha, Tu dois d\'abord te connecter pour créer un tour =/ <br><a href="../signinregister/index.php">Se connecter</a></h1></div></html');
header("Location: http://www.aventour.net/signinregister/");
}elseif(isset($_POST['submit'])){
	if(isset($_POST['phone'])){
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



//if(isset($_POST['phone'])){
  if(!empty($_POST['phone'])){
    $mphonenumber=$_POST['phone'];
    // if($mphonenumber[0]!='+'){
    //   header("Location: http://www.aventour.net/phone/");

    // }





// $mailhex=$_SESSION['myid'];
//     for ($i=0; $i < strlen($mailhex)-1; $i+=2){
//        $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
//     }//^(?!(?:\d*-){5,})(?!(?:\d* ){5,})\+?[\d-() ]+$

    $n = $mphonenumber;
$p = "/[+()]?\d{3,}[-.()]*\d{3,}[-.()]*\d{4}/";

preg_match($p,$n,$m);
if($mphonenumber!=$m[0]){
  //$_POST['phone']='';
  //die('coucou65');
  header("Location: http://www.aventour.net/phone/");

 // echo 'notgood';
}else{
  $_SESSION['okphone']='ok';






    $req3 = $bdd->prepare("UPDATE `ma_base`.`user` SET `phonenumber`=:phonenumber  WHERE mail=:mail");
    $req3->execute(array(
      "phonenumber" => $_POST['phone'],
      "mail" => $mailstring,          
            ));

    }
  }else{
     header("Location: http://www.aventour.net/phone/");

  }
//}


$req00 = $bdd->prepare('SELECT `phonenumber`FROM user WHERE mail = ?');
$req00->execute(array($mailstring));
$result00 = $req00->fetch(PDO::FETCH_ASSOC);
//print_r($result);
// $lv1=$result['lv1'];
// $lv2=$result['lv2'];
// $lv3=$result['lv3'];
$phonenumber1=$result00['phonenumber'];
//$mapresentation=$result['mapresentation'];
if(!empty($phonenumber1)){

header("Location: http://www.aventour.net/");
}else{
  header("Location: http://www.aventour.net/phone/");


}

// $lv1='';
// $lv2='';
// $lv3='';
// $phonenumber='';
//header('Location: http://aventour.io/myindexdev.php');
header("Location: http://www.aventour.net/phone/");
  //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé <br>'.$erreur.'<br><a href="http://aventour.net/mesversement/">Continuer</a></h1></div></html');

//echo'coucou0 '.$mailstring;

}else{
  header("Location: http://www.aventour.net/phone/");

}


}else{
  header("Location: http://www.aventour.net/phone/");
} 

//header("Location: http://www.aventour.net/signinregister/");

    //die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Edition terminé  <br>'.$erreur.'<br><a href="http://aventour.net/mesversement/">Continuer</a></h1></div></html');

 ?>


    <html>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <div class="col-md-12 center">
    <h1 style="text-align:center">
    <br><br>Edition terminé <br>
    <a href="http://aventour.net/mesversement/">Home</a>
    </h1>
    </div>
    </html>

