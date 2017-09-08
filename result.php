<?php 



$locationFORM=$_GET['location'];

try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.locationDeparture, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.prerequis, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.birthday, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE lieu_voyage= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC, voyage.heure_voyage ASC, voyage.prix ASC');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($locationFORM));

// $req1 = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
// $req1->execute(array($emailFORM));

echo"<div class=\"\">
                <div class=\"\">
                    <h1 class=\"title text-center text-muted\">Résultat(s): </h1>
                    
               ";
               //echo " <ul class=\"list-group\" id=\"contact-list\">";

                

$year=date("Y");

while ($donnees = $req->fetch())
{
    


    $pathimage='users/'.$donnees['mailhexa'].'/profile.jpg';
    //var_dump($pathimage);
    //die();
     if (!file_exists($pathimage)||isset($donnees['mailhexa'])) {
        //$pathimage='users/profile.jpg';
        //echo 'coucou';
    //mkdir($path, 0777, true);
}
$myDateTime = DateTime::createFromFormat('Y-m-d',$donnees['date_voyage'])->format('d/m/Y');
$myTime = DateTime::createFromFormat('H:i:s',$donnees['heure_voyage'])->format('H:i');

if(!((string)$AncienDateString===(string)$myDateTime)){

// echo'<h3>Le '.$myDateTime.'</h3>';
    }else{
        //echo'<div class="panel panel-default"> <div class="panel-heading c-list">';
               
       
       //echo' </div> </div>';


    }
// $myDateTime = DateTime::createFromFormat('Y-m-d',$donnees['date_voyage'])->format('d/m/Y');

$AncienDateString = $myDateTime;
$idtour=$donnees['idtour'];

if($donnees['complet']==='0'){
    $myBoutonEtat='monBoutonPasComplet';
    $groupe=' /Groupe';
    //$Prix_=$donnees['prix'].' €';detail_voyage voyage.detail_voyage,
    $mdescription=$donnees['detail_voyage'];
    $mprerequis=$donnees['prerequis'];
    $pasdeperssup=$donnees['pasdeperssup'];
    if($pasdeperssup){
        $_prixsuppTotzl='Pas de personne supplémentaire';

    }else {
         $_prixsuppTotzl='+ '.ceil($donnees['prixsupp']).' €/pers supplémentaire';

    }

   

$Prix_=ceil($donnees['prix']).' €';
    $reserver=true;
}else
{
    $myBoutonEtat='monBoutonComplet';
    $Prix_='Complet';
    $reserver=false;
    $groupe='';
   $mdescription='';
   $mprerequis='';
   $_prixsuppTotzl='';


}
$mbirthday='';
$birthday=$donnees['birthday'];
if(empty($birthday)){
	$mbirthday='';

}else{
	$myDatYeareTime = DateTime::createFromFormat('m/d/Y',$birthday);
$newYearBirhday = (int)$myDatYeareTime->format('Y');
$newYearBirhday=$year-$newYearBirhday;
if(empty($newYearBirhday)){
	$mbirthday='';

}else{
	$mbirthday='('.$newYearBirhday.')';

}
}

//$mbirthday='01/16/1992';

// $myDateTime = DateTime::createFromFormat('m/d/Y',$mbirthday);
// $newDateString = $myDateTime->format('Y-m-d');



    //include 'ii.html';
if($reserver){
  echo '
     <div class="col-md-4 col-sm-6 portfolio-item">
                   
                    <a href="reserver/index.php?mytrip='.$donnees['mailhexa'].'&mytour='.$idtour.'" class="portfolio-link">
                                    

                    
                        <div class="portfolio-hover" >
                            <div class="portfolio-hover-content">
                               
                                      <h3 class="text-muted" id="positionGauche"><i class="fa fa-calendar fa-lg"></i> '.$myDateTime.'</h3>
                                     <br> <h4 class="text-muted" id="positionGauche"><i class="fa fa-map-marker fa-lg"></i> '.strtoupper($donnees['lieu_voyage']).' à '.$myTime.' (Durée: ~'.$donnees['duree_voyage'].'h)</h4>
                                                                          
                             
                            </div>
                        </div>
                        <img src="test02/img/portfolio/'.$locationFORM.'.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                   
                              <h4 class="text-muted" id="positionGauche"><i class="fa fa-tags fa-1x"></i> '.$donnees['tag1'].', '.$donnees['tag2'].', '.$donnees['tag3'].'</h4>                                                    
                         
                        <br> <br>
                             <h4 class="name text-muted">'.$Prix_.$groupe.'</h4>
                             <p class="text-muted"> '.$donnees['min_personne'].' à '.$donnees['max_personne'].' Personne(s) <span class="text-muted">'.$_prixsuppTotzl.'</span></p>                                                     
                            
                                
                                          <div class="modal-footer">
                                             <a href="reserver/index.php?mytrip='.$donnees['mailhexa'].'&mytour='.$idtour.'" class="btn btn-lg btn-primary btn-block">Reserver<br>(Voir plus)</a>
                                         </div>                                        
                             
                    </div>
                </div>


';
}else{

   echo '
     <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#" class="portfolio-link" >

                    
                        <div class="portfolio-hover" style="
    opacity: 0.85;
    background: rgba(255, 255, 255, 0.9);
">
                            <div class="portfolio-hover-content">
                               
                                      <h3 class="text-muted" id="positionGauche">Complet</h3>
                                       <br> <h4 class="text-muted" id="positionGauche"><i class="fa fa-map-marker fa-lg"></i> '.strtoupper($donnees['lieu_voyage']).'</h4>
                                                                         
                             
                            </div>
                        </div>
                        <img src="test02/img/portfolio/'.$locationFORM.'.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                   
                              <h4 class="text-muted" id="positionGauche"><i class="fa fa-tags fa-1x"></i> '.$donnees['tag1'].', '.$donnees['tag2'].', '.$donnees['tag3'].'</h4>                                                    
                         
                    
                                                                   
                             
                    </div>
                </div>


';


}

    
}
$req->closeCursor(); 



                    
                    
               echo"     
                </ul>
            </div>
            ";

             ?>