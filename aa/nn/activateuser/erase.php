<?php
// ob_start(); 

// var_export($_POST); 

// $tab_debug=ob_get_contents(); 
// ob_end_clean(); 

// file_put_contents('test.log',date("Y-m-d H:i:s")." | ".$tab_debug."\n",FILE_APPEND);



// $var1="".var_dump($_POST);
// echo $var1;
//var_export($_POST);

erase(); 



/***********************************************
    Helper Functions
***********************************************/
// function wh_log($msg){
//     $logfile = 'admin-error.log';
//     file_put_contents($logfile,date("Y-m-d H:i:s")." | ".$msg."\n",FILE_APPEND);

function erase(){
   // wh_log($data['email'] . ' just subscribed!');
try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
//91.216.107.248
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}




//Mettre ses valeur récupérés à la $ligne de video_
//$temp=date('Y-m-d H:i:s');

$req=$bdd->exec("DELETE FROM user WHERE actif='0' AND timeregister < (NOW() - INTERVAL 48 HOUR)");

//echo date('Y-m-d H:i:s');
// $req = $bdd->prepare('SELECT actif, timeregister FROM user WHERE actif = ?');
// $req->execute(array("0"));

// $req1 = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
// $req1->execute(array($emailFORM));




//$req->closeCursor(); 

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



 //$req->closeCursor(); 
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
