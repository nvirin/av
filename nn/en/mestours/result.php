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

$req = $bdd->prepare('SELECT voyage.title, voyage.id_voyage, voyage.date_voyage, voyage.heure_voyage, voyage.lieu_voyage, voyage.duree_voyage, voyage.tag1, voyage.tag2, voyage.tag3, voyage.prix, voyage.prixsupp, voyage.min_personne, voyage.max_personne, voyage.detail_voyage, voyage.done, voyage.complet, voyage.id_mail, voyage.idtour, user.nom, user.prenom, user.vote, user.nombrevote, user.nombrefb, user.lv1, user.lv2, user.lv3, user.mailhexa FROM voyage INNER JOIN user ON voyage.id_mail=user.mail WHERE id_mail= ? AND done= 0 AND date_voyage >= DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY voyage.date_voyage ASC, voyage.heure_voyage ASC, voyage.prix ASC');
// $req = $bdd->prepare('SELECT mail, nom, prenom, vote, nombrevote, nombrefb, lv1, lv2, lv3 FROM voyage WHERE mail = ?');
$req->execute(array($mailstring));

// $req1 = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
// $req1->execute(array($emailFORM));

echo"<div class=\"panel panel-default\">
                <div class=\"panel-heading c-list\">
                    <span class=\"title\">Mes Tours: </span>
                    
               ";
               echo " <ul class=\"list-group\" id=\"contact-list\">";

                



while ($donnees = $req->fetch())
{
    


    $pathimage='http://aventour.net/users/'.$donnees['mailhexa'].'/profile.jpg';
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

    if($donnees['lv1']==='Français'){$lv1='French';}
    elseif($donnees['lv1']==='Anglais'){$lv1='English';}
    elseif($donnees['lv1']==='Espagnol'){$lv1='Spanish';}
    elseif($donnees['lv1']==='Allemand'){$lv1='German';}
    elseif($donnees['lv1']==='Italian'){$lv1='Italian';}
    elseif($donnees['lv1']==='Japonais'){$lv1='Japenese';}
    elseif($donnees['lv1']==='Autre'){$lv1='Other';}else{$lv1='';}

    if($donnees['lv2']==='Français'){$lv2='French';}
    elseif($donnees['lv2']==='Anglais'){$lv2='English';}
    elseif($donnees['lv2']==='Espagnol'){$lv2='Spanish';}
    elseif($donnees['lv2']==='Allemand'){$lv2='German';}
    elseif($donnees['lv2']==='Italian'){$lv2='Italian';}
    elseif($donnees['lv2']==='Japonais'){$lv2='Japenese';}
    elseif($donnees['lv2']==='Autre'){$lv2='Other';}else{$lv2='';}

    if($donnees['lv3']==='Français'){$lv3='French';}
    elseif($donnees['lv3']==='Anglais'){$lv3='English';}
    elseif($donnees['lv3']==='Espagnol'){$lv3='Spanish';}
    elseif($donnees['lv3']==='Allemand'){$lv3='German';}
    elseif($donnees['lv3']==='Italian'){$lv3='Italian';}
    elseif($donnees['lv3']==='Japonais'){$lv3='Japenese';}
    elseif($donnees['lv3']==='Autre'){$lv3='Other';}else{$lv3='';}
// $myDateTime = DateTime::createFromFormat('Y-m-d',$donnees['date_voyage'])->format('d/m/Y');

$AncienDateString = $myDateTime;
$idtour=$donnees['idtour'];

if($donnees['complet']==='0'){
    $myBoutonEtat='monBoutonPasComplet';
    $groupe=' /Group';
    $Prix_=$donnees['prix'].' €';
    $reserver=true;
}else
{
    $myBoutonEtat='monBoutonComplet';
    $Prix_='Full';
    $reserver=false;
    $groupe='';


}

//var_dump($donnees);
    

echo" 

                <li class=\"list-group-item\" style=\"padding: 1px;\">
                   <button data-toggle=\"modal\" data-target=\"#".$idtour."\" type=\"button\" id=\"".$myBoutonEtat."\" class=\"btn btn-default btn-default\">
                    
                        <div class=\"col-md-2\">
                         <div class=\"col-md-12\">
                         <img src=\"".$pathimage."\" alt=\"Scott Stevens\" class=\"img-responsive img-circle center-block\" />
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-star fa-1x\"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-facebook-square fa-1x\"></i> ".$donnees['nombrefb']." friends</span><br/></span> 
                         </div>

                         <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-globe fa-1x\"></i> ".$lv1." ".$lv2." ".$lv3."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class=\"col-md-8\">
                           
                            
                            <!-- <span class=\"name\"><i class=\"fa fa-tags fa-1x\"></i> </span><br/> -->
                             <div class=\"col-xm-12 col-md-2\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-calendar fa-lg\"></i> ".$myDateTime."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                             <div class=\"col-xm-12 col-md-10\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> ".strtoupper($donnees['lieu_voyage'])." at ".$myTime." (Duration: ~".$donnees['duree_voyage']."h)</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                            
                            <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-tags fa-1x\"></i> ".$donnees['tag1'].", ".$donnees['tag2'].", ".$donnees['tag3']."</span><br/></span>                                                        
                            </div>

                        </div>
                        <div class=\"col-md-2\">
                           
                            <div class=\"col-md-12\">
                            <span class=\"name\">".$Prix_."</span> <span class=\"text-muted\">".$groupe."</span><br/>
                                                                                    
                            </div>
                            
                            <div class=\"col-md-12 text-center\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['min_personne']." to ".$donnees['max_personne']." people</span><br/></span>                                                        
                            </div>

                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> <span class=\"text-muted\">+ ".$donnees['prixsupp']." €/additional person</span><br/></span>                                                        
                            </div>


                            
                        </div>
                        <div class=\"clearfix\"></div>
                    </button></li>


 

<!-- Modal -->
                            <div class=\"modal fade\" id=\"".$idtour."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"".$idtour."-label\" aria-hidden=\"true\">
                                <div class=\"modal-dialog modal-lg\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\" style=\"background-color: whitesmoke;\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\" style=\"color: black;\">&times;</span><span class=\"sr-only\">Close</span></button>
                                            <h4 class=\"modal-title\" id=\"project-10-label\" style=\"color: #6F6F6F;\">Title of the AvenTour : ".$donnees['title']."</h4>
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
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-star fa-1x\"></i> ".$donnees['vote']."/5 (".$donnees['nombrevote']." votes)</span><br/></span> 
                         </div>
                         <div class=\"col-md-12\">
                         <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-facebook-square fa-1x\"></i> ".$donnees['nombrefb']." friends</span><br/></span> 
                         </div>

                         <div class=\"col-md-12\">
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-globe fa-1x\"></i> ".$lv1." ".$lv2." ".$lv3."</span><br/></span>                                                        
                            </div>
                           

                       
                        
                            

                        </div>
                        <div class=\"col-md-7\">
                           
                            
                            <!-- <span class=\"name\"><i class=\"fa fa-tags fa-1x\"></i> </span><br/> -->
                             <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-calendar fa-lg\"></i> ".$myDateTime."</span><br/></span> 
                            <!-- <span class=\"visible-xs\"> <span class=\"text-muted\"></span><br/></span><i class=\"fa fa-users\"></i>-->
                            </div>
                             <div class=\"col-xm-12 col-md-12\">                      
                            <span class=\"visible-xs\"> <span class=\"text-muted\" id=\"positionGauche\"><i class=\"fa fa-map-marker fa-lg\"></i> ".strtoupper($donnees['lieu_voyage'])." at ".$myTime." (Duration: ~".$donnees['duree_voyage']."h)</span><br/></span> 
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
                            <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['min_personne']." to ".$donnees['max_personne']." people</span><br/></span>                                                        
                            </div>

                            <div class=\"col-md-12 text-center\">
                            <br><span class=\"visible-xs\"> <span class=\"text-muted\">+ ".$donnees['prixsupp']." €/additional person</span><br/></span>                                                        
                            </div>


                            
                        </div>

                        <div class=\"col-md-12 text-center\">
                         <h3 class=\"visible-xs text-muted\">Description: </h3> <br>   
                        <span class=\"visible-xs\"> <span class=\"text-muted\"> ".$donnees['detail_voyage']."</span><br/></span>                                                        
                            

                        </div>
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
                                            <!--<a href=\"editertour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Edit tour</a>-->
                                            <a href=\"#\" class=\"btn btn-sm btn-default\">Edit tour (Beta)</a>
                                           
                                             <a href=\"canceltour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Delete tour</a>
                                        </div> ";}else{
                                            echo"
                                         <div class=\"modal-footer\">
                                            
                                             <a href=\"canceltour.php?mytrip=".$donnees['mailhexa']."&mytour=".$idtour."\" class=\"btn btn-sm btn-default\">Annuler tour</a>
                                             
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