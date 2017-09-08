/* Theme Name: Worthy - Free Powerful Theme by HtmlCoder

 * Author:HtmlCoder

 * Author URI:http://www.htmlcoder.me

 * Version:1.0.0

 * Created:November 2014

 * License: Creative Commons Attribution 3.0 License (https://creativecommons.org/licenses/by/3.0/)

 * File Description: Initializations of plugins 

 */



(function($){

	$(document).ready(function(){
// 		



 
// note: unlike Webkit and the W3C proposal, 
// Mozilla fires its mozfullscreenchange event on the *document* object
// instead of the element going fullscreen


	

		$(".banner-image").backstretch('images/banner.jpg');
		
		 


 //            var textToggle = function(text) { $("#toggle").text("currently at " + text);                      };
 //            //var banner = document.getElementById('banner-caption');
            

 //            $(window).bind('fullscreen-toggle', function(e, state) { textToggle(state);       });

 //            $(function() {
 //                textToggle($(window).data('fullscreen-state'));
 //            });

 //             if(GetIsFullScreen()){
 // //banner.style.zIndex="0";
 // //banner.addClass("zindexzero");
 // alert($(window).data('fullscreen-state'));
 // //$('.banner-caption').css({'z-index':'0'});:
 // //document.getElementsByClassName('banner-caption').style.zIndex="0";
 // $('.banner-caption').removeClass('zindexdeux').addClass('zindexzero');
 //     }else{
 //     	alert($(window).data('fullscreen-state'));
 //     	//banner.style.zIndex="2";{"css property name":"css property value"}
 //     	//banner.removeClass("zindexzero");
 //     	//$('.banner-caption').css({'z-index':'2'});
 //     	$('.banner-caption').removeClass('zindexzero').addClass('zindexdeux');

 //    };

		  

		 



		 //var fullScreenMode = document.mozFullScreen || document.webkitIsFullScreen || document.fullScreen;
// 		 $(window).bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
//     if(document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen){
// banner.style.zIndex='0';
//     }else{
//     	banner.style.zIndex='2';

//     };
   

       
// });


		 // var fullScreenMode = document.mozFullScreen || document.webkitIsFullScreen || document.fullScreen;
		 // this.fullScreenMode = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen; // This will return true or false depending on if it's full screen or not

//  $('.videoReunion').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
//     if (document.mozFullScreen || document.webkitIsFullScreen || document.fullScreen;) {
//        /* make it look good for fullscreen */
//        banner.style.zIndex='0';
//     } else {
//        /* return to the normal state in page */
//        banner.style.zIndex='2';
//     }
// }, true);

// $(document).on ('mozfullscreenchange webkitfullscreenchange fullscreenchange',function(){
//        this.fullScreenMode = !this.fullScreenMode;

//       //-Check for full screen mode and do something..
//       //simulateFullScreen();
//       if(this.fullScreenMode){
//  		 	banner.style.zIndex='0';

//  		 }else{
//  		 	banner.style.zIndex='2';


//  		 }
//  });
// 		 if(isFullScreen){
// 		 	banner.style.zIndex='0';

// 		 }else{
// 		 	banner.style.zIndex='2';

// 		 }
// 		 document.addEventListener('fullscreeneventchange', function(e) {
//     if (isFullScreen) {
//        /* make it look good for fullscreen */
//        banner.style.zIndex='0';
//     } else {
//        /* return to the normal state in page */
//        banner.style.zIndex='2';
//     }
// }, true);

		

		// Fixed header

		//-----------------------------------------------


   


		$(window).scroll(function() {

			if (($(".header.fixed").length > 0)) { 

				if(($(this).scrollTop() > 0) && ($(window).width() > 767)) {

					$("body").addClass("fixed-header-on");
					// banner.style.zIndex='2';
					$("#myTopBar").addClass("col-md-12").removeClass('hidden');

				} else {

					$("body").removeClass("fixed-header-on");
					// banner.style.zIndex='0';
					$("#myTopBar").addClass("hidden").removeClass('col-md-12');

				}

			};



		});

		$(window).load(function() {

			if (($(".header.fixed").length > 0)) { 

				if(($(this).scrollTop() > 0) && ($(window).width() > 767)) {

					$("body").addClass("fixed-header-on");
					 //banner.style.zIndex='2';
					 $("#myTopBar").addClass("col-md-12").removeClass('hidden');


				} else {

					$("body").removeClass("fixed-header-on");
					// banner.style.zIndex='0';
					$("#myTopBar").addClass("hidden").removeClass('col-md-12');

				}

			};

		});
		////////////////
		// $(window).scroll(function() {

		// 	if (($(".header.fixed").length > 0)) { 

		// 		if(($(this).scrollTop() > 200) && ($(window).width() > 767)) {

		// 			$("body").addClass("fixed-header-on");
		// 			 banner.style.zIndex='0';

		// 		} else {

		// 			$("body").removeClass("fixed-header-on");
		// 			 banner.style.zIndex='2';

		// 		}

		// 	};

		// });


		// $(window).load(function() {

		// 	if (($(".header.fixed").length > 0)) { 

		// 		if(($(this).scrollTop() > 200) && ($(window).width() > 767)) {

		// 			$("body").addClass("fixed-header-on");
		// 			 banner.style.zIndex='0';

		// 		} else {

		// 			$("body").removeClass("fixed-header-on");
		// 			 banner.style.zIndex='2';

		// 		}

		// 	};

		// });

		///////////////





		


// z-index banner content- youtube 

		//-----------------------------------------------

		
		
//       function onYouTubeIframeAPIReady() {
//         var player = new YT.Player( 'videoReunion', {
//           events: { 'onStateChange': onPlayerStateChange }
//         });
//       }

     


//       function onPlayerStateChange(event) {
//       	 var banner = document.getElementById('banner-caption');
//       	var iframe = document.getElementById('videoReunion');
//       //anner.style.zIndex='2';
//       	//alert("Hello\nHow are you?1");

//       	if (event.data != YT.PlayerState.BUFFERING && event.data != YT.PlayerState.CUED && event.data != YT.PlayerState.PLAYING)
//                 return -1;
           
//       	var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
//   if (requestFullScreen) {
//     //requestFullScreen.bind(iframe)();
//     banner.style.zIndex='0';
//     //alert("Hello\nHow are you?2");

//   }else{
//   	banner.style.zIndex='2';
//   	//alert("Hello\nHow are you?3");

//   }
	
// }

            // var player = document.getElementById("videoReunion");
            // var banner = document.getElementById("banner-caption");
            // if (event.data != YT.PlayerState.BUFFERING && event.data != YT.PlayerState.CUED && event.data != YT.PlayerState.PLAYING)
            //     return -1;

            // if (player.requestFullScreen) {
            //   console.log("1()");
            //   player.requestFullScreen();
            //   banner.z-index="0";
            // }
            // else if (player.mozRequestFullScreen) {
            //   console.log("2()");
            //   player.mozRequestFullScreen();
            //   banner.z-index="0";
              
              
              

            // }
            // else if (player.webkitRequestFullScreen) {
            //   console.log("3()");
            //   player.webkitRequestFullScreen();
            //   banner.z-index="0";
            // }
            // else{
            // 	 banner.z-index="2";

            // }
        

        
    


		//Scroll Spy

		//-----------------------------------------------

		if($(".scrollspy").length>0) {

			$("body").addClass("scroll-spy");

			$('body').scrollspy({ 

				target: '.scrollspy',

				offset: 152

			});

		}



		//Smooth Scroll

		//-----------------------------------------------

		if ($(".smooth-scroll").length>0) {

			$('.smooth-scroll a[href*=#]:not([href=#]), a[href*=#]:not([href=#]).smooth-scroll').click(function() {

				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

					var target = $(this.hash);

					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

					if (target.length) {

						$('html,body').animate({

							scrollTop: target.offset().top-151

						}, 1000);

						return false;

					}

				}

			});

		}



		// Animations

		//-----------------------------------------------

		if (($("[data-animation-effect]").length>0) && !Modernizr.touch) {

			$("[data-animation-effect]").each(function() {

				var $this = $(this),

				animationEffect = $this.attr("data-animation-effect");

				if(Modernizr.mq('only all and (min-width: 768px)') && Modernizr.csstransitions) {

					$this.appear(function() {

						setTimeout(function() {

							$this.addClass('animated object-visible ' + animationEffect);

						}, 400);

					}, {accX: 0, accY: -130});

				} else {

					$this.addClass('object-visible');

				}

			});
 
		};



		// Isotope filters

		//-----------------------------------------------

		if ($('.isotope-container').length>0) {

			$(window).load(function() {

				$('.isotope-container').fadeIn();

				var $container = $('.isotope-container').isotope({

					itemSelector: '.isotope-item',

					layoutMode: 'masonry',

					transitionDuration: '0.6s',

					filter: "*"

				});

				// filter items on button click

				$('.filters').on( 'click', 'ul.nav li a', function() {

					var filterValue = $(this).attr('data-filter');

					$(".filters").find("li.active").removeClass("active");

					$(this).parent().addClass("active");

					$container.isotope({ filter: filterValue });

					return false;

				});

			});

		};



		//Modal

		//-----------------------------------------------

		if($(".modal").length>0) {

			$(".modal").each(function() {

				$(".modal").prependTo( "body" );

			});

		}



	}); // End document ready

})(this.jQuery);