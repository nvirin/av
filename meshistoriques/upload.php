<?php
var_dump($_FILES);echo'<br>';echo'<br>';
print_r($_FILES);echo'<br>';echo'<br>';
error_reporting(E_ALL);
ini_set('display_errors', true);echo'<br>';echo'<br>';
//phpinfo();
if(isset($_FILES['avatar']))
{ 
     $dossier = $_SERVER['DOCUMENT_ROOT'].'/users/';
     $fichier = $_FILES['avatar']['name'];
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !'; 
     }
}
?>