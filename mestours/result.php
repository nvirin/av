<?php 



$locationFORM='paris';
$mailhex=$_SESSION['myid'];
    for ($i=0; $i < strlen($mailhex)-1; $i+=2){
       $mailstring .= chr(hexdec($mailhex[$i].$mailhex[$i+1]));
    }
try{
$bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
}
catch (Exception $e)
{ echo "ERRREUR";
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.locationDeparture, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage,voyage.prerequis, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE id_mail= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC, voyage.heure_voyage ASC, voyage.prix ASC');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
//$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.pasdeperssup, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.prerequis, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.birthday, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE lieu_voyage= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC, voyage.heure_voyage ASC, voyage.prix ASC');

$req->execute(array($mailstring));

// $req1 = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
// $req1->execute(array($emailFORM)); 
/*if($pasdegroupe){
         $_prixsuppTotzl=''; //ceil($donnees['prixsupp']).' €/personnes'

$Prix_=ceil($donnees['prixsupp']).' €/personnes';
  $groupe='';

       }*/

echo"<div class=\"panel panel-default\">
                <div class=\"panel-heading c-list\">
                    <span class=\"title\">Mes Tours: </span>
                    
               ";
               echo " <ul class=\"list-group\" id=\"contact-list\">";

                



while ($donnees = $req->fetch())
{
    


    $pathimage='../users/'.$donnees['mailhexa'].'/profile.jpg';
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

 echo'<h3>Le '.$myDateTime.'</h3>';
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

//var_dump($donnees);
    

echo" 


                                                        <!-- debut-->

                <li class=\"list-group-item\" style=\"padding: 1px;\">
                   <button data-toggle=\"modal\" data-target=\"#".$idtour."\" type=\"button\" id=\"".$myBoutonEtat."\" class=\"btn btn-default btn-default\">
                    
                        

                                                        <div class=\"col-md-12 text-center\" >
 <h4 class=\"modal-title\" id=\"project-10-label\" style=\"color: #6F6F6F;\"> ".$donnees['title']."</h4><hr>
                                       

                        <div class=\"col-md-2\">
                         <div class=\"col-md-12\">
                         <img src=\"".$pathimage."\" alt=\"Scott Stevens\" class=\"img-responsive img-circle center-block\" />
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\">".$donnees['prenom']." ".$donnees['nom'][0].".  $mbirthday</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-star fa-1x\"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-facebook-square fa-1x\"></i> ".$donnees['nombrefb']." ami(e)s</span><br/></span> 
                         </div>

                         <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-globe fa-1x\"></i> ".$donnees['lv1']." ".$donnees['lv2']." ".$donnees['lv3']."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class=\"col-md-7\">
                           
                            
                            <!-- <span class=\"name\"><i class=\"fa fa-tags fa-1x\"></i> </span><br/> -->
                             <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-calendar fa-lg\"></i> ".$myDateTime."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                             <div class=\"col-xm-12 col-md-10\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> ".strtoupper($donnees['lieu_voyage'])." à ".$myTime." (Durée: ~".$donnees['duree_voyage']."h)</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>

                                    <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> Départ vers: ".strtoupper($donnees['locationDeparture'])."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>

                            
                            <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-tags fa-1x\"></i> ".$donnees['tag1'].", ".$donnees['tag2'].", ".$donnees['tag3']."</span><br/></span>                                                        
                            </div>

                        </div>
                        <div class=\"col-md-3\">
                           
                            <div class=\"col-md-12\">
                            <span class=\"name\">".$Prix_."</span> <span class=\"text-muted\">".$groupe."</span><br/>
                                                                                    
                            </div>
                            
                            <div class=\"col-md-12 text-center\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['min_personne']." à ".$donnees['max_personne']." Personne(s)</span><br/></span>                                                        
                            </div>

                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> <span class=\"text-muted\">".$_prixsuppTotzl."</span><br/></span>                                                        
                            </div>


                            
                        </div>
                        <div class=\"clearfix\"></div>
                        <div class=\"modal-footer col-md-12\">
                                           <a class=\"btn btn-sm btn-warning btn-lg btn-block\">Ajouter dates</a>
                                            <a class=\"btn btn-sm btn-default btn-lg btn-block\">Voir</a>
                                            </div> 

                          <!-- fin -->
                                                        </div>
                                                      
                    </button></li>

                                                      
 

<!-- Modal -->
                            <div class=\"modal fade\" id=\"".$idtour."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"".$idtour."-label\" aria-hidden=\"true\">
                                <div class=\"modal-dialog modal-lg\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\" style=\"background-color: whitesmoke;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\" style=\"color: black;\">&times;</span><span class=\"sr-only\">Close</span></button>
                                            <h4 class=\"modal-title\" id=\"project-10-label\" style=\"color: #6F6F6F;\"> ".$donnees['title']."</h4>
                                        </div>
                                        <div class=\"modal-body\" style=\"background-color: rgb(245, 245, 245);\">
                                            <h3></h3>

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    
                                                    <section class=\"bg-primary\" style=\"background-color: rgb(245, 245, 245);\">

                                                    <div class=\"container\"  id=\"mail\">
                                                      <div class=\"row\">
                                                        <div class=\"col-md-12 text-center\" style=\"padding-top: 5px;\" padding-bottom: \"50px;\">

                                                        <!-- debut-->

                                                        <div id=\"monBoutonPasComplet\">
                    
                        <div class=\"col-md-2\">
                         <div class=\"col-md-12\">
                         <img src=\"".$pathimage."\" alt=\"Scott Stevens\" class=\"img-responsive img-circle center-block\" />
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\">".$donnees['prenom']." ".$donnees['nom'][0].".  $mbirthday</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-star fa-1x\"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-facebook-square fa-1x\"></i> ".$donnees['nombrefb']." ami(e)s</span><br/></span> 
                         </div>

                         <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-globe fa-1x\"></i> ".$donnees['lv1']." ".$donnees['lv2']." ".$donnees['lv3']."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class=\"col-md-7\">
                           
                            
                            <!-- <span class=\"name\"><i class=\"fa fa-tags fa-1x\"></i> </span><br/> -->
                             <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-calendar fa-lg\"></i> ".$myDateTime."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                             <div class=\"col-xm-12 col-md-10\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> ".strtoupper($donnees['lieu_voyage'])." à ".$myTime." (Durée: ~".$donnees['duree_voyage']."h)</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>

                                    <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> Départ vers: ".strtoupper($donnees['locationDeparture'])."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>

                            
                            <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-tags fa-1x\"></i> ".$donnees['tag1'].", ".$donnees['tag2'].", ".$donnees['tag3']."</span><br/></span>                                                        
                            </div>

                        </div>
                        <div class=\"col-md-3\">
                           
                            <div class=\"col-md-12\">
                             <span class=\"name\">".$Prix_."</span> <span class=\"text-muted\">".$groupe."</span><br/>
                                                                                    
                            </div>
                            
                            <div class=\"col-md-12 text-center\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['min_personne']." à ".$donnees['max_personne']." Personne(s)</span><br/></span>                                                        
                            </div>

                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> <span class=\"text-muted\">".$_prixsuppTotzl."</span><br/></span>                                                        
                            </div>


                            
                        </div>

                        ";
                                        if($reserver&&!empty($mdescription)){echo "

                                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> 

                            <h3 class=\"text-muted\">Description</h3>
                            <span class=\"text-muted\">".$mdescription."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                            ";} 

                                            if($reserver&&!empty($mprerequis)){echo "

                                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> 

                            <h3 class=\"text-muted\">Prerequis</h3>
                            <span class=\"text-muted\">".$mprerequis."</span>

                            <br/>

                            </span>                                                        
                            </div>


                                            ";} echo"


                        <div class=\"clearfix\"></div>
                    </div>


                                                        <!-- fin -->
                                                        </div>
                                                      </div>
                                                    </div>
                                                            
                                                    </section>
                                                </div>
                                            </div>
                                        </div>";
                                         if($reserver){echo" 
                                         <div class=\"modal-footer\">
                                     <a href=\"copytour/editertoursuite.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-primary btn-lg btn-block\">Ajouter dates</a>
                                            <a href=\"settingtour/editertoursuite.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default btn-lg btn-block\">Editer tour</a>
                                             
                                         
                                            <!--<a href=\"#\" class=\"btn btn-sm btn-default\">Editer tour (Beta)</a>-->
                                            <!--<a href=\"adddate.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Ajouter date</a>-->
                                           
                                             <a href=\"canceltour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default btn-lg btn-block\">Annuler tour</a>
                                        </div> ";}else{
                                            echo"
                                         <div class=\"modal-footer\">
                                         <!--<a href=\"adddate.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-primary btn-lg btn-block\">Ajouter dates</a>-->
                                            <a href=\"copytour/editertoursuite.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-primary btn-lg btn-block\">Ajouter dates</a>
                                         
                                            
                                             <a href=\"canceltour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default btn-lg btn-block\">Annuler tour</a>
                                        </div> ";


                                        }
                                        echo "
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end -->
    






                    ";
    
}
$req->closeCursor(); 



                    
                    
               echo"     
                </ul>
            </div>
            ";

             ?>