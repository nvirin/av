<!DOCTYPE html>
<html>
<head>
	
	<!-- Add jQuery library -->
	 <script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>
	 <script src="js/jquery-1.11.3.min.js"></script>
	<!-- // <script type="text/javascript" src="plugins/jquery.min.js"></script> -->

	<!-- Add mousewheel plugin (this is optional) -->
	<!-- // <script type="text/javascript" src="../lib/jquery.mousewheel-3.0.6.pack.js"></script> -->

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

	

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			

			

			
			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			



		});
	</script>
	
</head>
<body>
	
	
		<a class="fancybox-thumbs" data-fancybox-group="thumb" href="demo/4_b.jpg"><img src="demo/4_s.jpg" alt="" /></a>

		

	
	
	<a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo">Youtube</a>

	

	
</body>
</html>