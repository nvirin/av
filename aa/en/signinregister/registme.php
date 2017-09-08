<?php  
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>S'enregistrer</title>


    <link rel="stylesheet" href="test/b/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="test/b/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="test/b/vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="test/b/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="test/b/dist/js/bootstrapValidator.js"></script>
     <!-- <script type="text/javascript" src="test/b/test/spec/verbose.js"></script> -->

    <style type="text/css">

#mybody{
    /*padding-top: 90px;*/
    background-color: #EDEFED;
    text-align: center;
        }
    
        #login-form-link, #register-form-link  {

    /*padding-top: 90px;*/
    background-color: rgba(255, 255, 255, 0);
}

/**/
</style>
</head>
<body class="no-trans" id="mybody">

 <section>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="page-header">
                <!-- <h2>S'enregistrer</h2> -->
                <!-- Success message -->
<div class="alert alert-success hidden" role="alert" id="success_message"><i class="glyphicon glyphicon-thumbs-up"></i> Le lien d'activation a été envoyé sur ta boite mail. Tu pourras te connecter à ton compte: <a href="../signinregister/">Se connecter</a> </div>

            </div>

            <form class="well form-horizontal" method="post"  id="defaultForm" action="registerdone.php">
<fieldset>

<!-- Form Name -->
<legend>S'enregistrer</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nom</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="Nom" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Prénom</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Prénom" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail" class="form-control"  type="text" data-bv-verbose="false" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Mot de passe</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="password" placeholder="Mot de passe" class="form-control"  type="password" required>
    </div>
  </div>
</div>

<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-4 control-label" >Confirmer</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="confirmpassword" placeholder="Confirmer" class="form-control"  type="password" required>
    </div>
  </div>
</div> -->

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Téléphone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="+33615321254" class="form-control" type="tel" required>
    </div>
  </div>
</div> 

<!-- <div id="mysuccess"></div> -->


<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <!-- <div class="g-recaptcha" data-sitekey="Google Site Key"></div> -->

  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="submit" class="btn btn-warning" >S'enregistrer <span class="glyphicon glyphicon-send"></span></button>
   
  </div>
</div>

</fieldset>
</form>

            <!-- <form id="defaultForm" method="post" class="form-horizontal" action="ajaxSubmit.php">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="username" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email address</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </form> -->
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm')
        .bootstrapValidator({
            message: 'Non valide',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
        //     fields: {
        //         username: {
        //             message: 'The username is not valid',
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The username is required and can\'t be empty'
        //                 },
        //                 stringLength: {
        //                     min: 6,
        //                     max: 30,
        //                     message: 'The username must be more than 6 and less than 30 characters long'
        //                 },
        //                 /*remote: {
        //                     url: 'remote.php',
        //                     message: 'The username is not available'
        //                 },*/
        //                 regexp: {
        //                     regexp: /^[a-zA-Z0-9_\.]+$/,
        //                     message: 'The username can only consist of alphabetical, number, dot and underscore'
        //                 }
        //             }
        //         },
        //         email: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The email address is required and can\'t be empty'
        //                 },
        //                 emailAddress: {
        //                     message: 'The input is not a valid email address'
        //                 }
        //             }
        //         },
        //         password: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The password is required and can\'t be empty'
        //                 }
        //             }
        //         }
        //     }
        // })
 fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                        message: ' '
                    },
                        notEmpty: {
                            message: ' '
                        
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: ' '
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                        message: ' '
                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: ' '
                    }
                }
            },
            email: {
                threshold: 6,
                validators: {
                    verbose :{
                        enabled: false

                    },
                    notEmpty: {
                        message: ' '
                        
                    },
                    emailAddress: {
                        message: ' '
                        
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Déjà enregistré!  <a href="mdp.php">Mot de passe oublié?</a>',
                        delay: 2000
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: ' '
                        
                    },
                    password: {
                        message: ' '
                        
                        
                    },
                      stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Entre 6 et 20 caractères'
                    }
                }
            },
            // confirmpassword: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The confirm password is required and can\'t be empty'
            //         }, 
            //         identical: {
            //             field: 'password',
            //             message: 'Not the same'
            //         }
            //     }
            // },

            phone: {
                validators: {
                    notEmpty: {
                        message: ' '
                       
                    },
                    // callback: {
                    //     message: 'Use the "+" format. Ex: +336123456', 
                    //     callback: function(value, validator) {
                            
                    //        return value.toString().startsWith("+");
                    //     }
                    // }, 
                    stringLength: {
                        min: 5,
                        max: 20,
                        message: ' '
                        //message: 'The password must be more than 6 and less than 20 characters long'
                    }
                }//,
                // regexp: {
                //         regexp: /^\+(?:[0-9]●?){6,14}[0-9]$/i, 
                //         message: 'Numero de telephone '
                //     }
            }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

              $('#success_message').removeClass('hidden');
                //$('#contact_form').data('bootstrapValidator').resetForm();
                //document.getElementById("log").innerHTML="WHATEVER YOU WANT...";
               // $("#success_message").text("<a href=\"#\">Mot de passe oublié?</a>");

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
                // $("#success_message").text(""+result);
            }, 'json');



            // var url = "../signinregister/"; 
            // setTimeout(function(){
            //          //do what you need here
            //        $(location).attr('href',url);
            //                        }, 2000);   
                 
        });
});
</script>
</body>
</html>