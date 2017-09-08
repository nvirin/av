<?php 
session_start();
?>

<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>My tours- Tourism activities with local-... - AvenTour</title>

	<META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, My tours- Tourism activities with local">
<!-- <META NAME="KEYWORDS" CONTENT="visites touristiques, particuliers, aventures, découvertes, voyages"> -->
<META NAME="ROBOTS" CONTENT="noindex,nofollow">
<!-- <META NAME="REVISIT-AFTER" CONTENT="15"> -->


	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/icone.png">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<!-- <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> 

<?php 

// require_once __DIR__ . '/lib/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
// $fb = new Facebook\Facebook([
//   'app_id' => '{731663666968594}',
//   'app_secret' => '{d72fd809c3d15380514316bc81080bb1}',
//   'default_graph_version' => 'v2.5',
//   ]);
?>
<!-- Web Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="css/datepicker.css"> -->



<!-- Font Awesome CSS -->
<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- social buttons 3 CSS -->
<link href="css/social-buttons-3.css" rel="stylesheet">

<!-- Plugins -->
<link href="css/animations.css" rel="stylesheet">

<!-- Worthy core CSS file -->
<link href="css/style.css" rel="stylesheet">

<!-- <!-- Custom css --> 
<!-- <link href="css/custom.css" rel="stylesheet"> --> 



<!-- Custom css --> 

<link href="css/custom.css" rel="stylesheet">
<link href="css/cust.css" rel="stylesheet">

</head>

<body class="no-trans">

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top" style="
    background-color: rgb(0, 0, 0);
">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://aventour.net/en/">AvenTour.net</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <!--  <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li> -->
                    <li>
                        <a href="http://aventour.net/en/creationaventoursuite.php">Create a tour</a>
                    </li>
                    <li style="
    margin-right: 10px;
    margin-top: 5px;
">
                        <?php //include '../conectionoupas.php' ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	


	

	







<!-- section start -->
<!-- ================ -->
	


	<!-- section end -->

<!-- section start -->
<!-- ================ -->
	<section class="bg-primary" id="monsectionAvis">
		<div class="container" id="mail">
			
    
    

    <div class="row">
        <div class="col-xs-12 col-sm-offset-0 col-sm-12">

          <?php include 'result.php' ?>
            
        </div>
	</div>
    
    
    <!-- JavaScrip Search Plugin -->
    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
		</div>
	</section>


	<!-- section end -->









	<section class="bg-primary" style="background-color: #EDEFED;">
		<div class="row">
				<div class="col-md-12 text-center" style="padding-top: 50px;" padding-bottom: "50px;">
				          <?php include 'mail.php' ?>
				 </div>
		
	</section>

	</div>






		
							

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		
		<!-- Jquery and Bootstap core js files -->
		<script src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>
		<script type="text/javascript" src="js/cust.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>

		<!-- Custom Scripts -->
		<!--script type="text/javascript" src="js/custom.js"></script>

		<!-- Load SCRIPT.JS which will create datepicker for input field  -->
		<script src="js/script.js"></script>
		
		
		<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>  
		<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
		
		
		
		<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>



		<!-- Load jQuery from Google's CDN -->
		<!-- Load jQuery UI CSS  -->
		

		<!-- Load jQuery JS -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<!-- Load jQuery UI Main JS  -->
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

		<!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->

		<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script> -->

		<!--<script src="js/index.js"></script>-->





	</body>
	</html>
