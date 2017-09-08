<?php


require 'src/Facebook-fixed/autoload.php';
session_start();
$fb = new Facebook\Facebook([
  'app_id' => '731663666968594',
  'app_secret' => 'd72fd809c3d15380514316bc81080bb1',
  'default_graph_version' => 'v2.5',
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = array('email','user_friends');//['email']; // optionnal

//$permissions[] = ['user_friends']; // optionnal
try {
  if (isset($_SESSION['facebook_access_token'])) {
  $accessToken = $_SESSION['facebook_access_token'];
  } else {
      $accessToken = $helper->getAccessToken();
  }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
 }
if (isset($accessToken)) {
  if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  } else {
    $_SESSION['facebook_access_token'] = (string) $accessToken;
      // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();
    // Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
    $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  }


  // validating the access token
  try {
    $request = $fb->get('/me');
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    if ($e->getCode() == 190) {
      unset($_SESSION['facebook_access_token']);
      $helper = $fb->getRedirectLoginHelper();
      $loginUrl = $helper->getLoginUrl('http://www.aventour.net/signinregister/', $permissions);
      echo "<script>window.top.location.href='".$loginUrl."'</script>";
      exit;
    }
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  // getting profile picture of the user
  try {
    $requestFriends = $fb->get('/me/friends'); //getting user picture
    $requestPicture = $fb->get('/me/picture?redirect=false&height=300'); //getting user picture
    $requestProfile = $fb->get('/me?fields=name,first_name,last_name,birthday,website,location,email'); // getting basic info
    $picture = $requestPicture->getGraphUser();
    $profile = $requestProfile->getGraphNode()->asArray();
    $friends = $requestFriends->getGraphEdge()->getTotalCount();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    // redirecting user back to app login page
    header("Location: http://aventour.net/signinregister/");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }

//echo 'test'.$profile['email']; die();
  if(!isset($profile['email'])){

   // echo 'test'.$profile['email']; die(); 
    header("Location: http://www.aventour.net/incomplet/");
    die();


  }


  try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$nom=$profile['last_name'];
$prenom=$profile['first_name'];
$birthday=$profile['birthday'];
$mail=$profile['email'];
$password=substr(str_shuffle(strtolower(sha1(rand() . time() . "azertyuiopqsdfghjklmwxcvbn"))),0, 8);;
$phonenumber="";
$nombrefb=$friends;

$req = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
$req->execute(array($profile['email']));
if ( $req->rowCount() > 0 ) {
  // do something here 
  //déjà dans la base de données. Du coup 
  //verifier les mises à jours 
  if (empty($birthday)) {
    $req1 = $bdd->prepare("UPDATE `ma_base`.`user` SET `nom`=:nom, `prenom`=:prenom,`nombrefb`=:nombrefb  WHERE mail=:mail");
    $req1->execute(array(

      "nom" => $nom, 
            "prenom" => $prenom,
            "mail" => $mail,
            // "password" => $password,
            "nombrefb" => $nombrefb,
            //"actif" => 1,

           
            
            ));
  }else{
   $req1 = $bdd->prepare("UPDATE `ma_base`.`user` SET `nom`=:nom, `prenom`=:prenom,`nombrefb`=:nombrefb,`birthday`=:birthday WHERE mail=:mail");
    $req1->execute(array(

      "nom" => $nom, 
            "prenom" => $prenom,
            "mail" => $mail,
            // "password" => $password,
            "nombrefb" => $nombrefb,
            "birthday" => $birthday,
            //"actif" => 1,

           
            
            ));



  }
  
  //et mettre les doonées en session 
  //et rtourner sur home page
}else{
  //Creer user

  require_once $_SERVER['DOCUMENT_ROOT'].'/inc/MCAPI.class.php';
  $api = new MCAPI('dbdbd86e3868fca40973810da6dde76c-us12');
   $merge_vars = array('FNAME'=>$prenom, 'LNAME'=>$nom);
   //$email=$mail;
   $retval = $api->listSubscribe( 'd403335c23', $mail, $merge_vars, 'html', false, true );

  $mailhexa='';
    for ($i=0; $i < strlen($mail); $i++)
    {
        $mailhexa .= dechex(ord($mail[$i]));
    }
 

   if(empty($birthday)){
   $req01 = $bdd->prepare("INSERT INTO `ma_base`.`user` (`nom`, `prenom`, `mail`,`mailhexa`, `password`, `nombrefb`, `actif`) VALUES (:nom, :prenom, :mail, :mailhexa, :password, :nombrefb, :actif)");
    $req01->execute(array(

      "nom" => $nom, 
            "prenom" => $prenom,
            "mail" => $mail,
            "mailhexa" => $mailhexa,
            "password" => $password,
            "nombrefb" => $nombrefb,
            "actif" => 1,
           
            
            ));



 }else{
   $req01 = $bdd->prepare("INSERT INTO `ma_base`.`user` (`nom`, `prenom`, `mail`,`mailhexa`, `password`, `nombrefb`, `actif`, `birthday`) VALUES (:nom, :prenom, :mail, :mailhexa, :password, :nombrefb, :actif, :birthday)");
    $req01->execute(array(

      "nom" => $nom, 
            "prenom" => $prenom,
            "mail" => $mail,
            "mailhexa" => $mailhexa,
            "password" => $password,
            "nombrefb" => $nombrefb,
            "actif" => 1,
             "birthday" => $birthday,

           
            
            ));



 }


  require $_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/PHPMailerAutoload.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/signinregister/PHPMailer/class.phpmailer.php'); 
define('GUSER', 'vnicolas060@gmail.com'); // GMail username
define('GPWD', 'Couvou123?KmtilmB_2'); // GMail password

$mymessagepourleguide='<p>Salut '.$prenom.'!<br><br>

Je m\'appelle Nicolas Fondateur d\'aventour.net <br>
Je te souhaite la Bienvenue! ^^<br><br>

Si tu as des questions, des suggestions ou juste envie de chatter<br>
tu peux le faire sur nicolas@aventour.net<br>
ou juste en répondant à ce mail <br><br>

Nous travaillons actuellement sur l\'amélioration du site<br>
et la création d\'application pour Android et Iphone<br><br>

Pour en finir, tu peux nous suivre sur :<br><br>

Facebook : <a href="https://www.facebook.com/goaventour">https://www.facebook.com/goaventour</a><br>
Twitter : <a href="https://twitter.com/nicolasvirin">https://twitter.com/nicolasvirin</a><br><br>

Je peux me permettre de te demander ce que t\'attends d\'aventour.net et comment améliorerais-tu ce dernier?<br><br>

A bientôt,<br><br>

Nicolas<br>
Fondateur d\'aventour.net
<br><a href="http://www.aventour.net" title="">http://www.aventour.net</a></p>';

smtpmailer( $mail, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR.NET', 'Bienvenue sur aventour.net', $mymessagepourleguide); 
smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR.NET', 'Bienvenue: '.$prenom.' '.$nom.' '.$mail.' '.$nombrefb, 'nouveauinscris <br>Prénom: '.$prenom.'<br>Nom: '.$nom.'<br>mail '.$mail.'<br>amisFB: '.$nombrefb); 

smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR.NET', 'Bienvenue sur aventour.net', $mymessagepourleguide); 
  //mettres les données en sessions


}
//Mettre à jour la photo.
  // print_r($profile);
  //  print_r($friends);
  // echo $profile['first_name'];
  // echo $profile['last_name'];
  // echo $profile['email'];
  // echo $profile['id'];
  // echo $profile['birthday'];
  // echo $profile['website'];
  // echo $profile['location']['name'];
  // showing picture on the screen
  // echo "<img src='".$picture['url']."'/>";
  $mail=$profile['email'];

  $mailhex='';
    for ($i=0; $i < strlen($mail); $i++)
    {
        $mailhex .= dechex(ord($mail[$i]));
    }


$path=$_SERVER['DOCUMENT_ROOT'].'/users/'.$mailhex;
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
  // saving picture
  $img = $path.'/profile.jpg';
  $data = $path.'/data.txt';
  file_put_contents($img, file_get_contents($picture['url']));
  $profiletab=$profile;
  $profiletab['friends'] = $friends;
  //array_push($profiletab, "friends", $friends );
   file_put_contents($data, json_encode($profiletab));

   $json = file_get_contents($data);
   $jsondec=json_decode($json,true);
   //var_dump($json);
   // echo $jsondec['friends'];
   $_SESSION['myid']=$mailhex;

  // echo json_encode($profile);
  //  echo json_encode($friends);
  //8header('Location: //www.aventour.net');
   header('Location: //www.aventour.net/phone/');


  
    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
  $helper = $fb->getRedirectLoginHelper();
  $loginUrl = $helper->getLoginUrl('http://www.aventour.net/');
  echo "<script>window.top.location.href='".$loginUrl."'</script>";
}
// try{
// $bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// // $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
// }
// catch (Exception $e)
// { echo "ERRREUR";
//         die('Erreur : ' . $e->getMessage());
// }
 
$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }

$req_1 = $bdd->prepare('SELECT `phonenumber` FROM user WHERE mail = ?');
$req_1->execute(array($mailstring));
$result_1 = $req_1->fetch(PDO::FETCH_ASSOC);
//print_r($result);
// $lv1=$result['lv1'];
// $lv2=$result['lv2'];
// $lv3=$result['lv3'];
$phonenumber_1=$result_1['phonenumber'];
if(empty($phonenumber_1)){
 header("Location: http://www.aventour.net/phone/");
 }else{
  header("Location: http://www.aventour.net/");

 }


 function smtpmailer($to, $from, $from_name, $subject, $body) {  
  global $error;
  $mail1 = new PHPMailer();  // create a new object
  $mail1->CharSet = 'UTF-8';
  $mail1->IsSMTP(); // enable SMTP
  $mail1->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
  $mail1->SMTPAuth = true;  // authentication enabled
  $mail1->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail1->Host = 'smtp.gmail.com';
  $mail1->Port = 465; 
  $mail1->Username = GUSER;  
  $mail1->Password = GPWD;           
  $mail1->SetFrom($from, $from_name);
  $mail1->Subject = $subject;
  $mail1->Body = $body;
  $mail1->MsgHTML($body);
  $mail1->AddAddress($to);
  if(!$mail1->Send()) {
    $error = 'Mail error: '.$mail1->ErrorInfo; 
    return false;
  } else {
    $error = 'Message sent!'; 
    return true;
  }
  //echo "ligne97 ";
}