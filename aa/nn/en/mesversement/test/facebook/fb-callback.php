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
      $loginUrl = $helper->getLoginUrl('http://www.aventour.io/signinregister/', $permissions);
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
    header("Location: index.php");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }


  try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$nom=$profile['first_name'];
$prenom=$profile['last_name'];
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
  $req1 = $bdd->prepare("UPDATE `ma_base`.`user` SET `nom`=:nom, `prenom`=:prenom,`nombrefb`=:nombrefb  WHERE mail=:mail");
    $req1->execute(array(

      "nom" => $nom, 
            "prenom" => $prenom,
            "mail" => $mail,
            // "password" => $password,
            "nombrefb" => $nombrefb,
            //"actif" => 1,

           
            
            ));
  //et mettre les doonées en session 
  //et rtourner sur home page
}else{
  //Creer user

  $mailhexa='';
    for ($i=0; $i < strlen($mail); $i++)
    {
        $mailhexa .= dechex(ord($mail[$i]));
    }
 

  $req1 = $bdd->prepare("INSERT INTO `ma_base`.`user` (`nom`, `prenom`, `mail`,`mailhexa`, `password`, `nombrefb`, `actif`) VALUES (:nom, :prenom, :mail, :mailhexa, :password, :nombrefb, :actif)");
    $req1->execute(array(

      "nom" => $nom, 
            "prenom" => $prenom,
            "mail" => $mail,
            "mailhexa" => $mailhexa,
            "password" => $password,
            "nombrefb" => $nombrefb,
            "actif" => 1,

           
            
            ));
  //mettres les données en sessions


}
//Mettre à jour la photo.
  print_r($profile);
   print_r($friends);
  echo $profile['first_name'];
  echo $profile['last_name'];
  echo $profile['email'];
  echo $profile['id'];
  echo $profile['birthday'];
  echo $profile['website'];
  echo $profile['location']['name'];
  // showing picture on the screen
  echo "<img src='".$picture['url']."'/>";
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
   echo $jsondec['friends'];
   $_SESSION['myid']=$mailhex;

  // echo json_encode($profile);
  //  echo json_encode($friends);
  //8header('Location: //www.aventour.io');
  
    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
  $helper = $fb->getRedirectLoginHelper();
  $loginUrl = $helper->getLoginUrl('http://www.aventour.io/');
  echo "<script>window.top.location.href='".$loginUrl."'</script>";
}

 header("Location: http://www.aventour.io/myindexdev.php");