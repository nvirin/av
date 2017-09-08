<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT mail FROM user WHERE id = ?');
$req->execute(array('1'));
while ($donnees = $req->fetch())
{
	echo $donnees['mail'];
	
}
$req->closeCursor(); 

?>
	

