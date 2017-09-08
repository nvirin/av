<?php 
//session_start();

// $_SESSION['login_user']= "coucou";
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';

?>







    
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h3>Create your activity: AvenTour.net</h3>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">


                                <form id="login-form" action="creationaventoursuite.php" method="post" role="form" style="display: block;">


                                    <div class="form-group col-md-12 col-xs-12" > 
                                    <h5>Name it!</h5>

                                    
                                        <input type="text" name="title" id="title" tabindex="1" class="form-control" placeholder="My super title!" value=<?php  echo "\"".$_SESSION['title']."\"";?>>
                                       

                                    </div>

                                    <!--  <div class="form-group col-md-12 col-xs-12">

                                    
                    <label class="sr-only" for="location">Location</label>
                    
                    <select id="location" name="location" class="form-control" value=<?php  //echo "\"".$_SESSION['location']."\"";?>>
                        <option value="paris">Paris (Ile de France)</option>
                        <option value="reunion">La Réunion</option>
                        
    
      
    
                        

                    </select>
                </div> -->


                                    <!--  <div class='input-group form-group col-md-12 col-xs-12' >
                    <label class="sr-only" for="checkin">Quand?</label>
                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="dd/mm/yyyy">
                        <input type="text" class="form-control"  placeholder="Quand ?" id="dtp_input2" name="datepicker" value=<?php  //echo "\"".$_SESSION['datepicker']."\"";?>>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

                    </div>


                </div> -->

                                   


                                     
                                    


                                     
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Creer">
                                            </div>
                                        </div>
                                    </div>



                                   <!--  <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </form>








                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        
                            


         





