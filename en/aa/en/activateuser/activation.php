<?php
//ob_start(); 

var_export($_GET); 
echo"coucou"; 

// $tab_debug=ob_get_contents(); 
// ob_end_clean(); 

// file_put_contents('test.log',date("Y-m-d H:i:s")." | ".$tab_debug."\n",FILE_APPEND);
// $fichier=fopen('test.log','w'); 
// fwrite($fichier,$tab_debug); 
// fclose($fichier);

// $_POST['data']['merges']['FNAME'];
// $_POST['data']['merges']['LNAME'];
// $_POST['data']['merges']['EMAIL'];
// $_POST['data']['merges']['MMERGE4']; 



// $var1="".var_dump($_POST);
// echo $var1;
//var_export($_POST);
if(isset($_GET['data'])){
subscribe($_GET['data']); 
}
/***********************************************
Sample code for handling MailChimp Webhooks - to write the logfile, your webserver must be able to write 
to the file in the wh_log() function below.

This also assumes you use a key to secure the script and configure a URL like this in MailChimp:

http://www.mydomain.com/webhook.php?key=EnterAKey!

***********************************************/
// $my_key  = 'addafbaplm';

// wh_log('==================[ Incoming Request ]==================');

// wh_log("Full _REQUEST dump:\n".print_r($_REQUEST,true)); 

// if ( !isset($_GET['key']) ){
//     wh_log('No security key specified, ignoring request'); 
// } elseif ($_GET['key'] != $my_key) {
//     wh_log('Security key specified, but not correct:');
//     wh_log("\t".'Wanted: "'.$my_key.'", but received "'.$_GET['key'].'"');
// } else {
//     //process the request
//     wh_log('Processing a "'.$_POST['type'].'" request...');
//     switch($_POST['type']){
//         case 'subscribe'  : subscribe($_POST['data']);   break;
//         // case 'unsubscribe': unsubscribe($_POST['data']); break;
//         // case 'cleaned'    : cleaned($_POST['data']);     break;
//         // case 'upemail'    : upemail($_POST['data']);     break;
//         // case 'profile'    : profile($_POST['data']);     break;
//         default:
//             wh_log('Request type "'.$_POST['type'].'" unknown, ignoring.');
//     }
// }
// wh_log('Finished processing request.');

/***********************************************
    Helper Functions
***********************************************/
function wh_log($msg){
    $logfile = 'admin-error.log';
    file_put_contents($logfile,date("Y-m-d H:i:s")." | ".$msg."\n",FILE_APPEND);
}

function subscribe($data){
   // wh_log($data['email'] . ' just subscribed!');
    var_export($data); 
echo"coucou"; 
try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


// $nom=$data
// $prenom=$data['LNAME'];
// $mail=$data['EMAIL'];
// $password=$data['MMERGE4'];
// $fired_at= $_POST['fired_at'];

//Mettre ses valeur récupérés à la $ligne de video_ UPDATE test set name=:name where id=:id'

$datastring='';
    for ($i=0; $i < strlen($data)-1; $i+=2)
    {
        $datastring .= chr(hexdec($data[$i].$data[$i+1]));
    }
    //return $string;
    //$datastring;


$req = $bdd->prepare("UPDATE `ma_base`.`user` SET `actif`=:actif WHERE `mail` = :mail");
    $req->execute(array(
            "actif" => 1, 
            "mail" => $datastring,
            
            ));

    // $req = $bdd->prepare("INSERT INTO `ma_base`.`user` (`nom`, `prenom`, `mail`, `password`,, `date`) VALUES (:nom, :prenom, :mail, :password, :mdate)");
    // $req->execute(array(
    //         "nom" => $nom, 
    //         "prenom" => $prenom,
    //         "mail" => $mail,
    //         "password" => $password,
    //         "mdate" => $fired_at,
            
    //         ));


//     try{
// $bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// //$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
// //91.216.107.248
// }
// catch (Exception $e)
// {
//         die('Erreur : ' . $e->getMessage());
// }


// $nom=$data['FNAME'];
// $prenom=$data['LNAME'];
// $mail=$data['email'];
// $password=$data['MMERGE4'];

// //Mettre ses valeur récupérés à la $ligne de video_


// $req = $bdd->prepare("INSERT INTO `ma_base`.`user` (`nom`, `prenom`, `mail`, `password`) VALUES (:nom, :prenom, :mail, :password)");
//     $req->execute(array(
//             "nom" => $nom, 
//             "prenom" => $prenom,
//             "mail" => $mail,
//             "password" => $password,
            
//             ));



 $req->closeCursor(); 
// ;





    
}
function unsubscribe($data){
    wh_log($data['email'] . ' just unsubscribed!');
}
function cleaned($data){
    wh_log($data['email'] . ' was cleaned from your list!');
}
function upemail($data){
    wh_log($data['old_email'] . ' changed their email address to '. $data['new_email']. '!');
}
function profile($data){
    wh_log($data['email'] . ' updated their profile!');
}
