<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Local guide with AirdvenTour</title>
		<meta name="description" content="Adventurun, particular sightseeing tour">
		
		

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="images/favicon.ico">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="css/datepicker.css">

		<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
		
		 <!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
    <link href="client/fine-uploader-gallery.css" rel="stylesheet">
	
	 <!-- Fine Uploader JS file
    ====================================================================== -->
    <script src="client/fine-uploader.js"></script>
	
	<!-- Fine Uploader Gallery template
    ====================================================================== -->
    <script type="text/template" id="qq-template-gallery">
        <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Upload a file</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <div class="qq-thumbnail-wrapper">
                        <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                    </div>
                    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                        <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                        Retry
                    </button>

                    <div class="qq-file-info">
                        <div class="qq-file-name">
                            <span class="qq-upload-file-selector qq-upload-file"></span>
                            <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                        </div>
                        <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                        <span class="qq-upload-size-selector qq-upload-size"></span>
                        <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                            <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                            <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                            <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                        </button>
                    </div>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>
		
		
		<link rel="stylesheet" href="css/runnable.css" />
	</head>
	
	

	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="images/logo.png" alt="Worthy"></a>
							</div>

							<!-- name-and-slogan -->
							<div class="site-name-and-slogan smooth-scroll">
								<div class="site-name"><a href="#banner">Airdven<span class="text-colored">Tour</span></a></div>
								<div class="site-slogan"> <a target="_blank" href="http://htmlcoder.me"> </a></div>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-8">

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

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li><a class="btn btn-sm" data-toggle="modal" data-target="#sign">Register</a></li>
												
												
												<li>
												
												<a  class="btn btn-sm" data-toggle="modal" data-target="#sign">Sign in</a>
												</li>
												
												<li class="">
												
												
												<!--<a  class="btn btn-sm" href="result.php" target="blank" ><span class="text-colored">Publish announce</span></a>-->
												</li>
												
												
												
												
											</ul>
										</div>
										
										
										<!-- Modal -->
								<div class="modal fade" id="sign" tabindex="-1" role="dialog" aria-labelledby="sign-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<h4 class="modal-title" id="sign-label">Paragliding</h4>
											</div>
											<div class="modal-body">
												<h3>Paragliding</h3>
												<div class="row">
													<div class="col-md-6">
														
														<p>Hi I'd like you to cometo discover our passion: Paragliding</p>
													</div>
													<div class="col-md-6">
														<img src="images/portfolio-1.jpg" alt="">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->

									</div>
								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>
		<!-- header end -->

		
		
				

		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
					<!--<img src="images/section-image-1.png" alt="">-->
						
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->
		

		

		

		

		

		<!-- footer start -->
		<!-- ================ -->
		<footer id="footer">

			<!-- .footer start -->
			<!-- ================ -->
			<div class="footer section">
				<div class="container">
					<h1 class="title text-center" id="contact"></h1>
					<div class="space"></div>
					
					<!--<div class="row">
						<div class="col-md-10 col-md-offset-1 object-non-visible" data-animation-effect="fadeIn">
						
						<form role="form" action = "result.php" method="post">
											<div class="col-md-4">
												<div class="form-group">
												<label class="sr-only" for="location">Location</label>
												
												<select id="location" name="location" class="form-control">
												  <option value="1">Paris</option>
												  <option value="2">Reunion Island</option>
												  
											  </select>
												</div>
											</div>
											<div class="col-md-3">
												<div class='input-group' >
												
												<div class="input-group">
													<input  class="form-control"  id="datepicker" placeholder="When ?" name="datepicker">
													<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
													
												</div>
												
												
												</div>
												
												
											</div>
                      
										  <div class="col-md-2">
											<div class="form-group">
											  <label class="sr-only" for="tourist">Tourist</label>
											  <select id="tourist" name="tourist" class="form-control">
												  <option value="1">1 Tourist</option>
												  <option value="2">2 Tourists</option>
												  <option value="3">3 Tourists</option>
												  <option value="4">4 Tourists</option>
												  <option value="5">5 Tourists</option>
												  <option value="6">6 Tourists</option>
												  <option value="7">7 Tourists</option>
												  <option value="8">8 Tourists</option>
												  <option value="9">9 Tourists</option>
												  <option value="10">10 Tourists</option>
												  <option value="11">11 Tourists</option>
												  <option value="12">12 Tourists</option>
												  <option value="13">13 Tourists</option>
												  <option value="14">14 Tourists</option>
												  <option value="15">15 Tourists</option>
												  <option value="16">16+ Tourists</option>
											  </select>
											</div>
										  </div>
										  <div class="col-md-1">
										  <a href="result.php" target="_blank">
											<button type="submit" class="btn btn-default btn-primary">Search</button>
											</a>
										  </div>
										</form>
							
						
					</div>
					
				</div>-->
					<div class="row">
					
					
							
							<div class="col-sm-12">
							
							<!--<form action="saveimage.php" enctype="multipart/form-data" method="post">

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>
<input name="uploadedimage" type="file">
</td>

</tr>

<tr>
<td>
<input name="Upload Now" type="submit" value="Upload Image">
</td>
</tr>


</tbody></table>

</form>

<img class="img-responsive" src="<--?php
try{
//$bdd = new PDO('mysql:host=localhost;dbname=pornckys_tes;charset=utf8', 'pornckys_moi', 'test123');

$bdd = new PDO('mysql:host=localhost;dbname=saveimage;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT saveimage FROM saveimage WHERE images_id = ?');
$req->execute(array($_GET['id']));
while ($donnees = $req->fetch())
{
	echo $donnees['images_path'];
	
}
$req->closeCursor(); 

?>" alt="" >-->


<!-- Fine Uploader DOM Element
    ====================================================================== -->
    <div id="fine-uploader-gallery"></div>

    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script>
        var galleryUploader = new qq.FineUploader({
            element: document.getElementById("fine-uploader-gallery"),
            template: 'qq-template-gallery',
            request: {
                endpoint: '/server/php/UploadHandler.php'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '/source/placeholders/waiting-generic.png',
                    notAvailablePath: '/source/placeholders/not_available-generic.png'
                }
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
            }
        });
    </script>







							</div>
							
							
							
							
							
							
						<div class="col-sm-12">
						
						
       
            
           
    
						

						
						
							<div class="footer-content">
								<form role="form" id="footer-form">
								
								<div class="form-group "  data-toggle="buttons-checkbox">
										<label class="sr-only" for="email2">theme</label>
										
										<!--<span class="button-checkbox">
        <button type="button" class="btn" data-color="info">Info</button>
        <input type="checkbox" class="hidden" checked />
    </span>
	<span class="button-checkbox">
        <button type="button" class="btn" data-color="info">Info</button>
        <input type="checkbox" class="hidden" unchecked />
    </span>
	<span class="button-checkbox">
        <button type="button" class="btn" data-color="info">Info</button>
        <input type="checkbox" class="hidden" unchecked />
    </span>
	<span class="button-checkbox">
        <button type="button" class="btn" data-color="info">Info</button>
        <input type="checkbox" class="hidden" unchecked />
    </span>
	<span class="button-checkbox">
        <button type="button" class="btn" data-color="info">Info</button>
        <input type="checkbox" class="hidden" unchecked />
    </span>
	<span class="button-checkbox">
        <button type="button" class="btn" data-color="info">Info</button>
        <input type="checkbox" class="hidden" unchecked />
    </span>-->
	
	
	
	
	
										
						
										
										
										
										<!--<i class="fa fa-envelope form-control-feedback"></i>-->
									</div>
								
									
									
									<div class="form-group">
											  <label class="sr-only" for="tourist">Tourist</label>
											  <select id="tourist" name="tourist" class="form-control" placeholder="rjghduris" >
												  <option value="1">1 Tourist</option>
												  <option value="2">2 Tourists</option>
												  <option value="3">3 Tourists</option>
												  <option value="4">4 Tourists</option>
												  <option value="5">5 Tourists</option>
												  <option value="6">6 Tourists</option>
												  <option value="7">7 Tourists</option>
												  <option value="8">8 Tourists</option>
												  <option value="9">9 Tourists</option>
												  <option value="10">10 Tourists</option>
												  <option value="11">11 Tourists</option>
												  <option value="12">12 Tourists</option>
												  <option value="13">13 Tourists</option>
												  <option value="14">14 Tourists</option>
												  <option value="15">15 Tourists</option>
												  <option value="16">16+ Tourists</option>
											  </select>
											</div>
									
									<div class="form-group has-feedback">
										<label class="sr-only" for="message2">Comments</label>
										<textarea class="form-control" rows="8" id="message2" placeholder="What? Where? When? How?" name="message2" required></textarea>
										<!--<i class="fa fa-pencil form-control-feedback"></i>-->
									</div>
									
									<div class="form-group has-feedback">
										<label class="sr-only" for="email2">Number people</label>
										<input type="email" class="form-control" id="email2" placeholder="Number people" name="email2" required>
										<!--<i class="fa fa-envelope form-control-feedback"></i>-->
									</div>
									
									
									<div class="form-group has-feedback">
										<label class="sr-only" for="name2">Other suggest?</label>
										<input type="text" class="form-control" id="name2" placeholder="Price" name="name2" required>
										<!--<i class="fa fa-user form-control-feedback"></i>
									</div>
									
									
									<input type="submit" value="Publish" class="btn btn-default">
								</form>
							</div>
						</div>
						
						<div class="col-md-2">
											
										  </div>
						
						<div class="col-sm-3">
							<!-- videeeeeeeeeeeeeee-->
						</div>
					</div>
				</div>
			</div>
			<!-- .footer end -->

			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Copyright © 2015 AirdvenTour.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- .subfooter end -->

		</footer>
		<!-- footer end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script src="js/jquery-1.11.3.min.js"></script>
		<!--<script type="text/javascript" src="plugins/jquery.min.js"></script>-->
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
		<script type="text/javascript" src="js/templatepublish.js"></script>
		<script type="text/javascript" src="js/templatepublishcheckboxbutton.js"></script>
		

		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>
		
		<script src="js/bootstrap-datepicker.js"></script>
		
		<!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="js/script.js"></script>
		
		<script> $(function(){
				
				$('.datepicker').datepicker()
				
				});</script>
				
				<!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

	</body>
</html>
