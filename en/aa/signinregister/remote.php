<?php  
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

header('Content-type: application/json');

//sleep(5);

$valid = true;





if (isset($_POST['email'])) {

    $emailFORM=$_POST['email'];
    $emailBD="";
    try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
$req->execute(array($emailFORM));
if ( $req->rowCount() > 0 ) {
  // do something here
    $valid = false;
}
  
} 

echo json_encode(array(
    'valid' => $valid,));


?>