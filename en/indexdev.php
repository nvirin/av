<?php 
session_start();

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $email and $password
$username=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("aventour.net", "avent651693", "NSKQy6Fv","users");
//mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123'
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($connection, $email);
$password = mysqli_real_escape_string($connection, $password);
// Selecting Database
//$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query( $connection, "select * from login where password='$password' AND mail='$email'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$email; // Initializing Session
//header("location: index.php"); // Redirecting To Other Page
echo "coucou1 ".$_SESSION['login_user'];
} else {
$error = "Email or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}

if(isset($_SESSION['login_user'])){
//header("location: index.php");
echo "coucou ".$_SESSION['login_user'];
}
?>

<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
<meta name="robots" content="noindex">

	<meta charset="utf-8">
	<title>Visite touristique avec un particulier: Paris, Ile de La Réunion,... - AvenTour</title>

	<META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, Visites touristiques avec des particuliers">
<META NAME="KEYWORDS" CONTENT="visites touristiques, particuliers, aventures, découvertes, voyages">



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
<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


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

</head>

<body class="no-trans">

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5&appId=731663666968594";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

	<!-- header start -->
	<!-- ================ --> 
	<header class="header fixed clearfix navbar navbar-fixed-top" >
		<div class="container" style="
   margin-right: 20px;
   margin-left: 20px;
   width: 98%;
   ">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-3">

					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">

						<!-- logo -->
						<div class="logo smooth-scroll">
							<a href="#banner"><img id="logo" src="images/logo.png" alt="AvenTour"></a>
						</div> 

						<!-- name-and-slogan -->
						<!-- <div class="site-name-and-slogan smooth-scroll">
							<div class="site-name" id="mSiteName"><a href="#banner"></a></div>
							<div class="site-slogan"> <a target="_blank" href="http://aventour.net"> </a></div>
						</div> -->


					</div>
					<!-- header-left end -->

				</div>
				<div class="col-md-9 col-sm-9 col-xs-9">

					<!-- header-right start -->
					<!-- ================ -->
					<div class="header-right clearfix">

						<!-- main-navigation start -->
						<!-- ================ -->
						<div class="main-navigation animated">

							<!-- navbar start -->
							<!-- ================ -->
							<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">
									<div class="row">

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												
												
											</button>
										</div>
									

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">

									<ul class="nav navbar-nav navbar-right">
										

										<div class="col-md-4">
											<li class="active"><a href="" class="btn" data-toggle="modal" data-target="#project-10" id="monConectInscris">S'enregistrer</a></li>
										</div>

										



										<div class="col-md-4">
											<!-- <li><a href="" class="btn" data-toggle="modal" data-target="#project-10" id="monConectInscris">Se connecter</a></li> -->


											<li><a href="" class="btn" data-toggle="modal" data-target="#project-12" id="monConectInscris">Se connecter</a></li>

										</div>
										<div class="col-md-4">
										<li><a href="" class="btn" data-toggle="modal" data-target="#project-11" id="monCQuoi">C'est quoi AvenTour <i class="fa fa-1x fa-question"></i>
</a></li>

											
										</div>
										


									




</ul>
</div>

</div> <!-- row -->
								</div> <!-- container-fluid -->

</nav>

</div><!-- main-navigation end -->




</div><!-- header right clearfix-->
</div> <!-- ol-md-9 col-sm-9 col-xs-9 -->

</div> <!-- row -->
</div> <!-- container -->



</header>
<!-- header end -->

<!-- banner start -->
<!-- ================ -->
<div id="banner" class="banner">
	<!-- <div class="banner-image"></div> -->
	<div class="video-container">
		
		<video preoload="true" autoplay="false" loop="loop" volume="0" poster="images/bg/2.jpg">
		<source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.mp41" type="video/mp4">
		<source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.webm1" type="video/webm"> 
			
		</video>
	</div>

	<!-- end video-container -->
	

	<div class="banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12 object-non-visible" data-animation-effect="fadeIn">
					<h1 class="text-center">Pars à l'Aven<span>Tour</span> avec moi</h1>
					<p class="lead text-center"><span>Visite touristique avec un particulier</span>  </p>



<!--<form role="form">
  <div class="form-group">
	<label for="email">Which town do you want to discove ? </label>
	<input type="email" class="form-control" id="email">
  </div>
  
  
  <button type="submit" class="btn btn-default">Search</button>
</form>-->
                </div>
                <div class="col-md-12">

                </div>

              


	<div class="col-md-12 object-non-visible" data-animation-effect="fadeIn" >


		<form role="form" action = "searchresult.php" method="post">
		<!-- <form role="form" action = "searchresult.php" method="post"> -->
		<!-- <div role="form" action = "" method="post"> -->
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
					<label class="sr-only" for="location">Location</label>
					<!--<input type="email" class="form-control" id="location" placeholder="Where ?">-->
					<select id="location" name="location" class="form-control">
						<option value="1">Paris (Lancement Avril 2016!)</option>
						<option value="2">La Réunion (Lancement Bientôt!)</option>

					</select>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class='input-group' >
					<label class="sr-only" for="checkin">Quand?</label>
					<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
						<input type="text" class="form-control"  placeholder="Quand ?" id="dtp_input2" name="datepicker">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

					</div>


				</div>


			</div>

			<div class="col-md-3 col-xs-6">
				<div class="form-group">
					<label class="sr-only" for="tourist">Tourist</label>
					<select id="tourist" name="tourist" class="form-control">
						<option value="1">1 Touriste</option>
						<option value="2">2 Touristes</option>
						<option value="3">3 Touristes</option>
						<option value="4">4 Touristes</option>
						<option value="5">5 Touristes</option>
						<option value="6">6 Touristes</option>
						<option value="7">7 Touristes</option>
						<option value="8">8 Touristes</option>
						<option value="9">9 Touristes</option>
						<option value="10">10 Touristes</option>
						<option value="11">11 Touristes</option>
						<option value="12">12 Touristes</option>
						<option value="13">13 Touristes</option>
						<option value="14">14 Touristes</option>
						<option value="15">15 Touristes</option>
						<option value="16">16+ Touristes</option>
					</select>
				</div>
			</div>
			<div class="col-md-2 col-xs-12">
				<a href="searchresult.php" target="_blank">
				<!-- <a href="searchresult.php" target="_blank"> -->
				<!-- <a href="#"> -->


					<button type="submit" class="btn btn-primary">Rechercher</button>
					<!-- <button  class="btn btn-default btn-primary" data-toggle="modal" data-target="#project-10">Rechercher</button> -->
				</a>
			</div>
			</form>
		</div> <!-- end col-md-12 object-non-visible" data-animation-effect="fadeIn" -->



	</div> <!-- end of class="row" -->



</div> <!-- end of div class="container" -->

</div> <!-- end of div class="banner-caption" -->

</div> 
<!-- banner end -->



<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px;">

<!-- section start -->
<!-- ================ -->
	


	<!-- section end -->

<!-- section start -->
<!-- ================ -->
	<section class="bg-primary" id="monsectionAvis">
		<div class="container" id="mail">
			<div class="row">

				<div class="col-md-4 text-center">
					<!-- <h2 class="section-heading" style="color:#428BCA;">A l'aventure pour l'Ile Intense!</h2> -->
					<!-- <hr class="primary"> -->
					<img src="images/martine.png" alt="" class="img-responsive center-block"> 
					
				</div>
				<div class="col-md-4 text-center">
				<img src="images/melanie.png" alt="" class="img-responsive center-block"> 
					
				</div>

				<div class="col-md-4 text-center">
					<!-- <h2 class="section-heading" style="color:#428BCA;">Paris by Night, La Ville Lumière! (Bientôt)</h2> -->
					<!-- <hr class="primary"> -->
					<!-- <iframe width="500" height="250" src="images/To_be_continued.jpg" frameborder="0" allowfullscreen></iframe> -->
					<img src="images/jean.png" alt="" class="img-responsive center-block"> 
					<p></p>
				</div>


			</div>
		</div>
	</section>


	<!-- section end -->



<!-- section start -->
<!-- ================ -->
<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px;">
	<section class="bg-primary" id="monsectionVideo">

		<div class="container" id="mail">
			<div class="row">

			<div class="col-md-6 text-center" style="
    z-index: 3;">
					<h2 class="section-heading">Paris, La Ville Lumière! (Bientôt)</h2>
					<hr class="primary">
					<!-- <iframe width="500" height="250" src="images/To_be_continued.jpg" frameborder="0" allowfullscreen></iframe> -->
					<!-- <img id="videoParis" src="images/To_be_continued.jpg" alt="" class="img-responsive center-block">  -->
					<iframe style="
    z-index: 3;" id="videoReunion" src="https://www.youtube.com/embed/97IYfZ8dx7o" frameborder="0" allowfullscreen></iframe>
					<p></p>
				</div>

				<div class="col-md-6 text-center">
					<h2 class="section-heading">A l'aventure pour l'Ile Intense!</h2>
					<hr class="primary">
					<iframe id="videoReunion" src="https://www.youtube.com/embed/kPJQPLvxrjA" frameborder="0" allowfullscreen></iframe>
					<p></p>
				</div>
				<div class="col-md-0 text-center">
					
				</div>

				


			</div>
		</div>
	</section>
	</div>


	<!-- section end -->





	<section class="bg-primary" style="background-color: #EDEFED;">
		<div class="row">
				<div class="col-md-12 text-center" style="padding-top: 50px;" padding-bottom: "50px;">
				          <?php include 'mailNewsletter.php' ?>
				 </div>
		</div>
	</section>




	<!-- footer start -->
	<!-- ================ -->
	<footer id="footer">

		<?php include 'footer.php' ?>

		</footer>
		<!-- footer end -->

		</div><!-- end class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px; -->

</body>
		
							<!-- Modal -->
							<div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="project-10-label">AvenTour : Version Beta- Lancement 2016</h4>
										</div>
										<div class="modal-body" style="background-color: rgb(245, 245, 245);">
											<h3></h3>

											<div class="row">
												<div class="col-md-12">
													
													<section class="bg-primary" style="background-color: rgb(245, 245, 245);">

													<div class="container"  id="mail">
													  <div class="row">
													    <div class="col-md-12 text-center" style="padding-top: 5px;" padding-bottom: "50px;">

														<?php include 'mailNewsletter.php' ?>
														</div>
													  </div>
													</div>
															
													</section>
												</div>
											</div>
										</div>
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									</div>
								</div>
							</div>
							<!-- Modal end -->




							<!-- Modal -->
							<div class="modal fade" id="project-11" tabindex="-1" role="dialog" aria-labelledby="project-11-label" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header" style="background-color: rgb(1, 2, 21);">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="project-11-label">AvenTour : Visite touristique avec un particulier</h4>
										</div>
										<div class="modal-body" style="background-color: rgb(1, 2, 21);">
											<h3></h3>

											<div class="row">
												<div class="col-md-12">
													
													<section class="bg-primary" id="monsectionQuoi">

													<div class="container" id="mail">
			<div class="row">

				 <div class="col-md-5 text-center">
                    <div class="service-box">
                        <!-- <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i> -->
                        <img src="images/adventourIcon2.png" alt="" data-wow-delay=".3s" width="150" height="150" class="img-responsive center-block">
                        <h5 style="color:#428BCA;">Laissez vous surprendre par l'aventure en tant que touriste</h3>
                        
                    </div>
                </div>

                 <div class="col-md-2 text-center">
                    <div class="service-box">
                    <!-- <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i> -->
                        <!-- <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i> -->
                        <h1 style="color:#428BCA;">OU</h3>
                        
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="service-box">
                        <!-- <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i> -->
                        <img src="images/adventourIcon1.png" alt="" data-wow-delay=".3s" width="150" height="150" class="img-responsive center-block">
                        <h5 style="color:#428BCA;">Soyez rémunéré en faisant découvrir vos activités touristiques</h3>
                        
                    </div>


			</div>
		</div>

														
													</section>
												</div>
											</div>
										</div>
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									</div>
								</div>
							</div>
							<!-- Modal end -->

							<!-- Modal -->
							<div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
											<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Se connecter</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="" method="post">

          <!-- <input id="name" name="username" placeholder="username" type="text">
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login "> -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="email" name ="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value=" Login ">Se connecter</button>
              <!-- <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span> -->
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button> -->
		  </div>	
      </div>
									</div>
								</div>
							</div>
							<!-- Modal end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		
		<!-- Jquery and Bootstap core js files -->
		<script src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>

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
