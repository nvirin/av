<?php 

    print phpinfo();  


// $_SESSION['login_user']= "coucou";
// unset($_POST['submit']);
// echo $_SESSION['login_user_nom'];
//     echo $_SESSION['login_user_prenom']; 

//     echo $_SESSION['login_user_erreur'];

// $_SESSION['login_user_erreur']='';
//$_POST['submit']=null;
// var_export($_POST);

// //if(isset($_POST['submit'])){
// if (empty($_POST['first_name']) || empty($_POST['last_name'])|| empty($_POST['email'])|| empty($_POST['password'])|| empty($_POST['phone'])) {
// $_SESSION['login_user_erreur']= "Form registration invalid";
// header("location: ../signinregister/register.php");
// echo $_SESSION['login_user_erreur'];

// }else{

// 	echo "ligne22 ";


// $nom=$_POST['first_name'];
// $prenom=$_POST['last_name'];
// $mail=$_POST['email'];
// $password=$_POST['password'];
// $phonenumber=$_POST['phone'];




// try{
// $bdd = new PDO('mysql:host=localhost;dbname=ma_base;charset=utf8', 'root', 'addafbaplm');
// // $bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');
// }
// catch (Exception $e)
// { echo "ERRREUR";
//         die('Erreur : ' . $e->getMessage());
// }

// //Mettre ses valeur récupérés à la $ligne de video_

// echo "ligne45 ";
// $req = $bdd->prepare("INSERT INTO `ma_base`.`user` (`nom`, `prenom`, `mail`, `password`, `phonenumber`) VALUES (:nom, :prenom, :mail, :password, :phonenumber)");
//     $req->execute(array(
//             "nom" => $nom, 
//             "prenom" => $prenom,
//             "mail" => $mail,
//             "password" => $password,
//             "phonenumber" => $phonenumber,
            
//             ));


// require '../signinregister/PHPMailer/PHPMailerAutoload.php';
// require_once('../signinregister/PHPMailer/class.phpmailer.php');
// define('GUSER', 'vnicolas060@gmail.com'); // GMail username
// define('GPWD', 'couvou123?'); // GMail password
// //$mailhex=$mail;
// echo "ligne62 ";
// $mailhex='';
//     for ($i=0; $i < strlen($mail); $i++)
//     {
//         $mailhex .= dechex(ord($mail[$i]));
//     }
// $mymessage="<a href=\"http://aventour.io/activateuser/activation.php?data=".$mailhex."\">Clique ici pour activer ton compte</a>";
// //$mymessage="<a href=\"http://aventour.io/\">Clique ici pour activer ton compte</a>";
// //$mymessage=file_get_contents('mail.html'); 
// smtpmailer($mail, 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Confirmation mail', $mymessage);
// smtpmailer('vnicolas054@gmail.com', 'nicolas@aventour.net', 'L\'EQUIPE AVENTOUR', 'Nouvelle inscription : '.$mail, 'Nom: '.$nom." prénom: ".$prenom." mail: ".$mail." password: ".$password." phone: ".$phonenumber);



// }





//   echo"\r\n   \r\n";
//   var_export($_POST);
// //}
//   //unset($_POST['submit']);
// //$_POST['submit']=null;
// //header("location: ../myindexdev.php");
// //die("<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" /><h1 style=\"padding-top: 10%;text-align: center;\">Un mail de confirmation a été envoyé sur ta boite mail</h1>");


// function smtpmailer($to, $from, $from_name, $subject, $body) { 
//   global $error;
//   $mail = new PHPMailer();  // create a new object
//   $mail->CharSet = 'UTF-8';
//   $mail->IsSMTP(); // enable SMTP
//   $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
//   $mail->SMTPAuth = true;  // authentication enabled
//   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
//   $mail->Host = 'smtp.gmail.com';
//   $mail->Port = 465; 
//   $mail->Username = GUSER;  
//   $mail->Password = GPWD;           
//   $mail->SetFrom($from, $from_name);
//   $mail->Subject = $subject;
//   $mail->Body = $body;
//   $mail->MsgHTML($body);
//   $mail->AddAddress($to);
//   if(!$mail->Send()) {
//     $error = 'Mail error: '.$mail->ErrorInfo; 
//     return false;
//   } else {
//     $error = 'Message sent!';
//     return true;
//   }
//   echo "ligne97 ";
// }
 ?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Secure Payment Form</title>
<link rel="stylesheet" href="css/bootstrap-min.css">
<link rel="stylesheet" href="css/bootstrap-formhelpers-min.css" media="screen">
<link rel="stylesheet" href="css/bootstrapValidator-min.css"/>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
<link rel="stylesheet" href="css/bootstrap-side-notes.css" />

<!-- Custom css --> 
<link href="../css/custom.css" rel="stylesheet">
<!-- /* Google recaptcha JS */ -->
<!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
<style type="text/css">


/*#success_message{ display: none;}*/
</style>
<style type="text/css">

#mybody{
    /*padding-top: 90px;*/
    background-color: #EDEFED;
    }
    
        #login-form-link, #register-form-link  {

    /*padding-top: 90px;*/
    background-color: rgba(255, 255, 255, 0);
}

/**/
</style>
<!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap-min.js"></script>
<script src="js/bootstrap-formhelpers-min.js"></script>
<script type="text/javascript" src="js/bootstrapValidator-min.js"></script>
<script type="text/javascript">



//   $(document).ready(function() {
//     $('#contact_form').bootstrapValidator({
//         // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
//         feedbackIcons: {
//             valid: 'glyphicon glyphicon-ok',
//             invalid: 'glyphicon glyphicon-remove',
//             validating: 'glyphicon glyphicon-refresh'
//         },
//         fields: {
//             first_name: {
//                 validators: {
//                         stringLength: {
//                         min: 2,
//                     },
//                         notEmpty: {
//                         message: 'Please supply your first name'
//                     }
//                 }
//             },
//              last_name: {
//                 validators: {
//                      stringLength: {
//                         min: 2,
//                     },
//                     notEmpty: {
//                         message: 'Please supply your last name'
//                     }
//                 }
//             },
//             email: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please supply your email address'
//                     },
//                     emailAddress: {
//                         message: 'Please supply a valid email address'
//                     }
//                 }
//             },
//             password: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please supply your password'
//                     },
//                     password: {
                        
//                         message: 'Please supply a vaild password'
//                     },
//                       stringLength: {
//                         min: 6,
//                         max: 20,
//                         message: 'The password must be more than 6 and less than 20 characters long'
//                     }
//                 }
//             },

//             phone: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Please supply your phone number'
//                     },
//                     // callback: {
//                     //     message: 'Use the "+" format. Ex: +336123456',
//                     //     callback: function(value, validator) {
                            
//                     //        return value.toString().startsWith("+");
//                     //     }
//                     // }, 
//                     stringLength: {
//                         min: 5,
//                         max: 20,
//                         //message: 'The password must be more than 6 and less than 20 characters long'
//                     }
//                 }
//             }
//             }
//         })
// .on('err.field.bv', function(e, data) {
//             if (data.fv.getSubmitButton()) {
//                 data.fv.disableSubmitButtons(false);
//             }
//         })
//         .on('success.field.bv', function(e, data) {
//             if (data.fv.getSubmitButton()) {
//                 data.fv.disableSubmitButtons(false);
//             }
//         })
//         .on('success.form.bv', function(e) {
         



//             $('#success_message').removeClass('hidden');
//                 $('#contact_form').data('bootstrapValidator').resetForm();

//             // Prevent form submission
//             e.preventDefault();

//             // Get the form instance 
//             var $form = $(e.target);

//             // Get the BootstrapValidator instance
//             var bv = $form.data('bootstrapValidator');

//             // Use Ajax to submit form data
//             $.post($form.attr('register.php'), $form.serialize(), function(result) {
//                 console.log(result);
//                 alert(result);
//             }, 'json');
//         });
// });


</script>

</head>
<body class="no-trans" id="mybody">


   <section style="
    padding-top: 10%;
">
    

    <div class="container">

    
</div>
    </div><!-- /.container -->
   </section>



</body>
</html>
