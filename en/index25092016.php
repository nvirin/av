<?php 
session_start();

//var_dump($_SESSION);
//$_SESSION['myid']='';

//echo "ca marche! Bonjour ".$_SESSION['login_user_nom']." ".$_SESSION['login_user_prenom'];
if($_GET['coucou']!='coucou'){
	//die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Mise � jour en cours... ;)<br><br>Allez les bleus!</h1></div></html');
}

	
?>



<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html ng-app="myApp" lang="fr">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Activit� touristique avec l'habitant: Paris, Ile de La R�union,... - AvenTour</title>

	<META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, activit�s touristiques avec des habitants">
<META NAME="KEYWORDS" CONTENT="activit�s touristiques, locaux, particuliers, aventures, d�couvertes, voyages, que faire � paris, que faire � la reunion">
<META NAME="ROBOTS" CONTENT="index,follow">
<META NAME="REVISIT-AFTER" CONTENT="15">


	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" alt="Aventour, visites Paris Ile de La R�union" href="images/icone.png">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script src="js/jquery.browserLanguage.js" type="text/javascript" charset="utf-8"></script>	

<?php 
// if(isset($_SESSION['lang'])){

// 	if($_SESSION['lang']=='fr'){


// 	}elseif($_SESSION['lang']=='en'){

// 	}else{
// 		echo'<script type="text/javascript">

// 		$.browserLanguage(function(language){
// 			if(language!="fr"){
//       document.location.href="en/";
//       }
//     });
// </script>';
// 	}
// }else{echo'<script type="text/javascript">

// 		$.browserLanguage(function(language){
// 			if(language!="fr"){
//       document.location.href="en/";
//       }
//     });
// </script>';


// }

?>




		
		<!-- // <script type="text/javascript" src="plugins/jquery.min.js"></script> -->
		<!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->


<!-- Web Fonts -->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
 -->

<!-- Bootstrap core CSS -->

<!-- <link rel="stylesheet" href="css/datepicker.css"> -->
<!-- <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> -->


<!-- Font Awesome CSS -->
<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- social buttons 3 CSS -->
<link href="css/social-buttons-3.css" rel="stylesheet">

<!-- Plugins -->
<!-- <link href="css/animations.css" rel="stylesheet"> -->
<link href="css/style.css" rel="stylesheet">



<!-- Custom css --> 
<link href="css/custom.css" rel="stylesheet"> 
<!-- <link href="css/custom1.css" rel="stylesheet">  -->



	
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">


    




</head>

<body class="no-trans" ng-app="myApp">



	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

	<!-- header start -->
	<!-- ================ --> 
	<header class="header fixed clearfix navbar navbar-fixed-top" style="
    padding-top: 0px;
" >
	<!-- <div class="hidden myTopBar" id="myTopBar" style="
    
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 0px;
    background-color: #EDEFED;
        height: 2vw;
        font-size: 15px;
            font-size: 1vw;
   
">
				<marquee> <h4 style="font-size: 15px;
            font-size: 1vw;">Lancement des 1�res inscriptions d�but 2016! <?php
// R�p�ter 122 fois un espace
//echo str_repeat('&nbsp;',90);
//echo "Hey ".$_SESSION['login_user_prenom']."!";
?> Inscris-toi � la Newsletter, on te tiendras au jus pour la date ;)</h4></marquee>

			</div> -->
		<div class="container" style="
   margin-right: 20px;
   margin-left: 20px;
   width: 98%;
   ">


			<div class="row">
			
			
				<div class="col-md-3 col-sm-3 col-xs-1">

					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">

						<!-- logo -->
						<div class="logo smooth-scroll">
							<a href="/"><img id="logo" src="images/logo.png" alt="AvenTour logo"></a>

						</div> 


						<!-- name-and-slogan -->
						<!-- <div class="site-name-and-slogan smooth-scroll">
							<div class="site-name" id="mSiteName"><a href="#banner"></a></div>
							<div class="site-slogan"> <a target="_blank" href="http://aventour.net"> </a></div>
						</div> -->


					</div>
					<!-- header-left end -->

				</div>
				<div class="col-md-9 col-sm-9 col-xs-11">

					<!-- header-right start -->
					<!-- ================ -->
					<div class="header-right clearfix">

						<!-- main-navigation start -->
						<!-- ================ -->
						<!-- <div class="main-navigation animated"> -->
						<div class="main-navigation">

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
								<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1" style="padding-top: 3px;">

									<ul class="nav navbar-nav navbar-right">
								<!-- 	<div class="col-md-4"> 
										
									

									</div>
									<div class="col-md-8"> <li><div class="fb-like" data-href="https://facebook.com/goaventour" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div></li>
 </div>
									<div class="col-md-12"> </div> -->


									<div class="col-md-4">
									<?php include 'deveniroucreer.php' ?>

									<!-- <li><a href="" class="btn" data-toggle="modal" data-target="#project-11" id="monCQuoi">Creer Tour!

</a></li> -->

										<!-- <li><a href="" class="btn" data-toggle="modal" data-target="#project-11" id="monCQuoi">{{ 'CreateTour' | translate }}

</a></li>
 -->


											 
										</div>
										

										<div class="col-md-8">
											<?php include 'conectionoupas.php' ?>
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

<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

</header>
<!-- header end -->

<!-- banner start -->
<!-- ================ -->
<div id="banner" class="banner">
	<!-- <div class="banner-image"></div> -->
	<div class="video-container">
		
		<video preoload="true" autoplay="false" loop="loop" volume="0" poster="images/bg/2.jpg">
		<!-- <source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.mp41" type="video/mp4">
		<source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.webm1" type="video/webm"> --> 
			
		</video>
	</div>

	<!-- end video-container -->
	

	<div class="banner-caption zindexdeux" id="banner-caption">
		<div class="container">
			<div class="row">
				<!-- <div class="col-md-12 object-non-visible" data-animation-effect="fadeIn"> -->
				<div class="col-md-12">
					<h1 class="text-center">Pars � l'Aven<span>Tour</span> avec moi</h1>
					<h2 class="lead text-center">Activit� touristique avec un habitant</h2>

                </div>
                <div class="col-md-12">
 
                </div>
 
              


	<!-- <div class="col-md-12 object-non-visible" data-animation-effect="fadeIn" > -->
	<div class="col-md-12" >


		<!-- <form role="form" action = "searchresult.php" method="post"> -->
		<form role="form" action = "searchresult.php" method="get">
		<!-- <div role="form" action = "" method="post"> -->
			<div class="col-md-7 col-md-offset-2 col-xs-12"> 
				<div class="form-group">
					<label class="sr-only" for="location">Location</label>
					<!--<input type="email" class="form-control" id="location" placeholder="Where ?">-->
					<select id="location" name="location" class="form-control">
						<option value="paris">Paris</option>
						<option value="reunion">La R�union</option>
						
      <!-- <option value="Maisons-Laffitte">Maisons-Laffitte (Lancement 2016!)</option>
       -->
    
						

					</select>
				</div>
			</div>
			<!-- <div class="col-md-3 col-xs-6">
				<div class='input-group' >
					<label class="sr-only" for="checkin">Quand?</label>
					<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
						<input type="text" class="form-control"  placeholder="Quand ?" id="dtp_input2" name="datepicker">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

					</div>


				</div>


			</div> -->
<!-- 
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
			</div> -->
			<div class="col-md-3 col-xs-12">
				<!-- <a href="searchresult.php" target="_blank"> -->
				<a href="searchresult.php" target="_blank">
				<!-- <a href="#"> -->


					<button type="submit" class="btn btn-default btn-primary">D�couvrir</button>
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



<!-- <div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px;"> -->
<div class="section" style="padding: 0px;">

<!-- section start -->
<!-- ================ -->
	


	<!-- section end -->

<!-- section start -->
<!-- ================ -->
	<section class="bg-primary" id="monsectionAvis">
		<!-- <div class="container" id="mail">
			<div class="row">

				<div class="col-md-4 text-center">
					
					<img src="images/martine.png" alt="avis tour touristique � Paris" class="img-responsive center-block"> 
					
				</div>
				<div class="col-md-4 text-center">
				<img src="images/melanie.png" alt="avis activit� touristique culinaire et insolite" class="img-responsive center-block"> 
					
				</div>

				<div class="col-md-4 text-center">
					
					<img src="images/jean.png" alt="avis activit� touristique � l'ile de La R�union" class="img-responsive center-block"> 
					<p></p>
				</div>


			</div>
		</div> -->
	<!-- </section> -->


	<!-- section end -->



<!-- section start -->
<!-- ================ -->
<!-- <div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px;"> -->
	<div class="bg-primary" id="monsectionVideo">

		<div class="container" id="mail">
			<div class="row">

			<div class="col-md-6 text-center" style="
    z-index: 3;">
					<h2 class="section-heading">Aventour.net: L'Ile de La R�union, l'Ile Intense!</h2>
					<hr class="primary">
					<div id="videoReunion0"></div>


					<p></p>
				</div>

				<div class="col-md-6 text-center">
					<h2 class="section-heading">Aventour.net: Paris, La Ville Lumi�re!</h2>
					<hr class="primary">
					<iframe style="
    z-index: 30;" id="videoReunion" src="https://www.youtube.com/embed/97IYfZ8dx7o?rel=0&showinfo=0" frameborder="0" allowfullscreen controls="0" ></iframe>
   <!--  <iframe style="
    z-index: 30;" id="videoReunion" src="https://www.youtube.com/embed/kPJQPLvxrjA?rel=0&showinfo=0" frameborder="0" allowfullscreen controls="0" ></iframe> -->
				<!-- 	<p id="toggle"></p>
				97IYfZ8dx7o
        <p id="state"></p>
        <p id="key"></p>
 -->
				</div>
				<div class="col-md-0 text-center">
					
				</div>

				


			</div>
		</div>
		</div>
	</section>
	</div>

	
    <!--/.SLIDESHOW END-->


	<!-- section end -->

	<!-- <section class="bg-primary" style="background-color: #EDEFED;">
		<div class="row">
				<div class="col-md-12 text-center" style="padding-top: 50px; padding-bottom:50px;">
				          <?php //include 'app.php' ?>
				 </div>
		</div>
	</section> -->


	

	<!--  -->

	<!-- <section class="bg-primary" style="background-color: #EDEFED;"><div class="row">
		
		<div class="col-md-12">
		<h1></h1>
		<div class="fb-comments" data-href="https://aventour.net" data-numposts="3"></div>
			
		</div>
	</div></section> -->



	<section class="bg-primary" style="background-color: #EDEFED;">
		<div class="row">
				<div class="col-md-12 text-center" style="padding-top: 50px; padding-bottom:50px;">
				          <?php include 'mail.php' ?>
				 </div>
		</div>
	</section>
	<!-- <section><div class="row">
		
		<div class="col-md-12">
		<div class="fb-comments" data-href="https://aventour.net" data-numposts="1"></div>
			
		</div>
	</div></section> -->

	 <!--  <section id="home" class="text-center"> 
         
                <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="assets/img/1.jpg" alt="" />
                            <div class="carousel-caption" >
                                <h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc.</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/2.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc.</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/3.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc.</h4>
                            </div>
                        </div>
                    </div>

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                </div>
           
       </section> -->

      
	

<!-- <a href="http://hannuaire.fr/" class="hidden" title="Annuaire r�f�rencement"><img src="http://hannuaire.fr/i/bleu.png" alt="Hannuaire, annuaire referencement gratuit"/></a> -->


	<!-- footer start -->
	<!-- ================ -->
	<footer class="footer-distributed" id="end">

		<?php include 'footer.php' ?>

		</footer>
		<!-- footer end -->

		
<!-- </body> -->
		
							<!-- Modal -->
							<div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
								<div class="modal-dialog modal-lg" style="margin-top: 9%;">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
											<h4 class="modal-title" id="project-10-label">AvenTour : Que faire � Paris? A La R�union? Activit� touristique avec un habitant </h4>
										</div>
										<div class="modal-body" style="background-color: rgb(245, 245, 245);">
											<h3></h3>

											<div class="row">
												<div class="col-md-12">
													
													<section class="bg-primary" style="background-color: rgb(245, 245, 245);">

													<div class="container"  id="mail">
													  <div class="row">
													    <div class="col-md-12 text-center" style="padding-top: 5px;" padding-bottom: "50px;">
													    <h3>Tu veux devenir un Aventoureur? (Guide)</h3>

													     <a class = "btn btn-primary clear" href="aventourer.php">Clique ici <span class="glyphicon glyphicon-send"></span></a>
													     <hr>
													     <br> 

														<?php include 'mail.php' ?>
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
										<!-- <div class="modal-header" style="background-color: rgb(1, 2, 21);">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="project-11-label">AvenTour : Visite touristique avec un particulier</h4>
										</div> -->
										<!-- <div class="modal-body" style="background-color: rgb(1, 2, 21);">
											<h3></h3>
 -->
											<!-- <div class="row">
												<div class="col-md-12"> -->
													
													<!-- <section class="bg-primary" id="monsectionQuoi">

													<div class="container" id="mail"> -->
			

				 
 <?php include 'creationaventour.php' ?>

			
		<!-- </div>

														
													</section> -->
												<!-- </div>
											</div> -->
										<!-- </div> -->
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									</div>
								</div>
							</div>
							<!-- Modal end -->

							<!-- 8888888888888888888888888888888888888888888
							8888888888888888888888888888888888888888888
							8888888888888888888888888888888888888888888 -->


							<!-- Modal -->
							<div class="modal fade" id="project-13" tabindex="-1" role="dialog" aria-labelledby="project-13-label" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<!-- <div class="modal-content"> -->
										<!-- div class="modal-header" style="background-color: rgb(1, 2, 21);">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											
										</div> -->
										<!-- <div class="modal-body" style="background-color: rgb(1, 2, 21);"> -->
											

											
			
                                                            <?php //include 'sign.php' ?>
														
													
												
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									<!-- </div> -->
								</div>
							</div>
							<!-- Modal end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->

		<!-- Initialization of Plugins -->
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6&appId=731663666968594";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


		


		<!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
		<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

		 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 

		<!-- Modernizr javascript -->
		<!-- // <script type="text/javascript" src="plugins/modernizr.js"></script> -->

		<!-- Isotope javascript -->
		<!-- // <script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script> -->
		
		<!-- Backstretch javascript -->
		 <script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<!-- // <script type="text/javascript" src="plugins/jquery.appear.js"></script> -->
		<script src="lib/waypoint/noframework.waypoints.min.js"></script>
<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>
		
		<script type="text/javascript" src="js/template1.js"></script>

<script type="text/javascript" charset="utf-8">
           var textToggle = function(text) { $("#toggle").text("currently at " + text);                      };
            //var banner = document.getElementById('banner-caption');
            

            $(window).bind('fullscreen-toggle', function(e, state) { textToggle(state); 
            	//isFullScreen=state; 
                 myFunction(state);
                        
              });

            $(function() {
                textToggle($(window).data('fullscreen-state'));
                //isFullScreen=$(window).data('fullscreen-state'); 
                 myFunction($(window).data('fullscreen-state'));
            });

            var tag = document.createElement('script');
      tag.src = "http://www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubePlayerAPIReady() {
        player = new YT.Player('videoReunion0', {
          playerVars: { 'autoplay': 0, 'controls': 1,'autohide':1,'wmode':'opaque', 'rel': 0,  'showinfo': 0 },
          // videoId: '97IYfZ8dx7o',https://www.youtube.com/watch?v=LTdI_LQVVJg
           videoId: 'LTdI_LQVVJg',
          events: {
            'onReady': onPlayerReady}
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.mute();
        //player.destroy();
      }
      function mymodal(){
      	//alert('You have scrolled to a thing');
      	$("#project-10").modal("show");
      	//$('#project-10').modal();
      	//$("#project-10").show();



      }



            

             var waypoint = new Waypoint({
  element: document.getElementById('monsectionVideo'),
  handler: function(direction) {
    //alert('You have scrolled to a thing');
    //document.getElementById("videoReunion0").src = "https://www.youtube.com/embed/97IYfZ8dx7o?rel=0&autoplay=1";
    //var player =  iframe.getElementById('videoReunion0');
   // $("#project-10").modal("show");
   <?php 

  if((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid']))){
  	//echo 'mymodal();';
   
   	

}elseif(isset($_SESSION['deja0'])){
	//echo 'mymodal();';
	

}else{
	echo 'mymodal();';
	$_SESSION['deja0']='true';

}

?>
   
     player.playVideo();

    waypoint.destroy();

  }
})



//              var waypoint1 = new Waypoint({
//   element: document.getElementById('end'),
//   handler: function(direction) {
//     //alert('You have scrolled to a thing');
//     //document.getElementById("videoReunion0").src = "https://www.youtube.com/embed/97IYfZ8dx7o?rel=0&autoplay=1";
//     //var player =  iframe.getElementById('videoReunion0');
//    // $("#project-10").modal("show");
//    mymodal();
//      //player.playVideo();

//     //waypoint1.destroy();

//   }
// })

            

         

        </script>

		<script src="https://www.youtube.com/iframe_api"></script>
		<!-- // <script src="lib/jquery.fullscreen.js" type="text/javascript" charset="utf-8"></script> -->

		
		



		<!-- Custom Scripts -->
		<!--script type="text/javascript" src="js/custom.js"></script>

		<!-- Load SCRIPT.JS which will create datepicker for input field  -->
		<!-- // <script src="js/script.js"></script> -->
		
		
		<!-- // <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>   -->
		<!-- // <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script> -->

	

		
		
		
		<script type="text/javascript">
 //    $('.form_datetime').datetimepicker({
 //        //language:  'fr',
 //        weekStart: 1,
 //        todayBtn:  1,
	// 	autoclose: 1,
	// 	todayHighlight: 1,
	// 	startView: 2,
	// 	forceParse: 0,
 //        showMeridian: 1
 //    });
	// $('.form_date').datetimepicker({
 //        language:  'fr',
 //        weekStart: 1,
 //        todayBtn:  1,
	// 	autoclose: 1,
	// 	todayHighlight: 1,
	// 	startView: 2,
	// 	minView: 2,
	// 	forceParse: 0
 //    });
	// $('.form_time').datetimepicker({
 //        language:  'fr',
 //        weekStart: 1,
 //        todayBtn:  1,
	// 	autoclose: 1,
	// 	todayHighlight: 1,
	// 	startView: 1,
	// 	minView: 0,
	// 	maxView: 1,
	// 	forceParse: 0
 //    });
</script> 





		<!-- Load jQuery from Google's CDN -->
		<!-- Load jQuery UI CSS  -->
		

		<!-- Load jQuery UI Main JS  -->
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

		<!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->

		<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script> -->

		<!--<script src="js/index.js"></script>-->

		<script>
//   (function() {var s=document.createElement('script');
//     s.type='text/javascript';s.async=true;
//     s.src=('https:'==document.location.protocol?'https':'http') +
//     '://aventournet.groovehq.com/widgets/5992f0e3-3344-4690-b86e-8f60ec4fce76/ticket.js'; var q = document.getElementsByTagName('script')[0];q.parentNode.insertBefore(s, q);})();
// </script>

<!-- <script src="assets/js/custom.js"></script> -->


<!-- 
		<script>
  (function() {var s=document.createElement('script');
  	
    s.type='text/javascript';s.async=true;
    s.src=('https:'==document.location.protocol?'https':'http') +
    '://aventour.groovehq.com/widgets/0106ec5e-e381-49e8-b8b0-f05fc9046c15/ticket.js';
     var q = document.getElementsByTagName('script')[0];
     if(($(window).width() > 767)) {
     q.parentNode.insertBefore(s, q); 
 }else{

 	q.parentNode.removeChild(s);
 }

 })();


</script>


 -->
 

 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77808821-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PBFV3K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PBFV3K');</script>
<!-- End Google Tag Manager -->




</div><!-- end class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px; -->




	</body>
	</html> 


