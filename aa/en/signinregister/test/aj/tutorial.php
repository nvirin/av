<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ajax Php Demo w/ Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="./ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
  	  <a href="https://github.com/rantoine/Sandbox/tree/PhpAjaxCall" target="_blank"><img alt="Fork me on GitHub" src="http://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" style="position: absolute; top: 40px; right: 0px; border: 0;"></a>	  

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./">Ajax Php Demo</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="./">Home</a></li>
              <li class="active"><a href="tutorial.php">Tutorial</a></li>
              <li><a href="ajaxDemo1.php">Ajax Form 1</a></li>
              <li><a href="ajaxDemo2.php">Ajax Form 2</a></li>
              <li><a href="modalDemo.php">Modal Demo</a></li>
			  <li><a href="http://glennantoine.com/2012/08/11/phpajax-call-php-function/">Main Site - Tutorial</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
	<h2>PHP/AJAX: Call PHP function</h2>		
	
	  <!-- Left Column -->  
      <div class="row-fluid">
        <div class="span6">
        	<p>
			Recently, I was asked by a friend how to call a specific php function via an Ajax call.
			</p>
			
			<p>
			The challenge was that they originally set out to have specific functions handle different form posts throughout 
			the website, but wanted to have them all orgianized in a single php file.
			</p> 
			
			<p>
			Considering that for a number of years I have been using MVC frameworks (Zend Framework for PHP) I had forgotten 
			how I had achieved this prior to using a MVC architecture. Typically with a MVC framework and the associated 
			routing your url (/controller/method) your request is routed to the desired method. 
			</p>
			
			<p>
			After providing some assistance to get them on the right path, I decided to do a quick Google search since I 
			didn't expect it to be that difficult to find some good examples. Well, I was wrong. 
			</p>
			
			<p>
			For the most part every example that I came across showed all of the expected details for setting up the markup 
			for the form, the required javascript/jquery and of course the associated PHP file for the form processing. The 
			problem that I faced was that the majority of examples show the ajax call to a php file on the server, without 
			addressing how to limit the call to a specific function.
			</p>
			
			<p>
			With this revalation I decided that I would put a quick tutorial together showing a PHP/Ajax call to a specific 
			function. However, as a began down the path of putting this tutorial together I decided that I would leverage 
			Twitter Bootstrap. Then I decided that I would show a couple of different options. Shortly after which I 
			decided to show the posting of a form via Ajax from a Modal. Needless to say this has grown to be a bit larger 
			than I had orignally intended. 
			</p>
			
			<p>
			As a result there will be a considerable amount of the code that I won't show here. The good news is that you 
			can access the entire demo from Github. 
			</p>
			
			<p>
			Most developers are familiar with data added in form fields and sent to a script on the server, specified 
			in the "action" attribute of the <form> tag. However, with Ajax, the data of the forms can be sent with both 
			the GET and POST methods and does not require a page refresh in the process. However, considering that with 
			GET the data sent is limited and typically reserved for requesting information forms typically leverage the 
			Ajax Post method. 
			</p>
			
			<p>
			The process of sending data from forms using Ajax is very straight-forward, especially if you are leveraging 
			jQuery. Please keep in mind the following description is not all inclusive as the code should tell you 
			everything you need to know and then some.
			</p>
			
			<p>
			The short list of things that you will need to remember are:
			</p>
			<ul>
				<li>Ensure that you have included the jQuery library in your mark-up</li>
				<li>Create the mark-up for your form, ensuring each form element has a Name and an Id</li>
				<li>Ensure that your Form button is NOT a submit button if it inside of the form tags</li>
				<li>On page load create an click event on the save button for the form</li>
				<li>Using jQuery's Serialize function create the data object to posted to the php server script</li>
				<li>On the server side check which form has been posted, the call the appropriate function to process the posted data</li>
				<li>When processing is complete return the desired response/data to the client side</li>
				<li>Capture the response with the jQuery.ajax appropriate callback function (success, complete, error) and perform the desired actions on the client side browser</li>
				<li>If posting from a Modal and an error is return update form to direct the user's next step</li>
				<li>If posting from a Modal and success, you may want to close the modal and update the initiating page</li>
			</ul>
			
			<p>There are a few key pieces of code that you will want to understand in order to replicate posting a form via an Ajax call to a specific function in your PHP script. In all reality this is a much easier than you may have expected. The first key point to note is that each form has a hidden field that identifies the form. The second is the conditional check in your PHP script that looks for this hidden field and then calls the appropriate form processing function.
			</p>
			
			<p>The code required to identify the form is a very simple hidden form field:
			<div>
<pre>
&lt;input type="hidden" name="function" value="formOne"&gt;
</pre>
			</div>
			</p>
			
			<p>Here we have a simple hidden form field that is used to accomplish two things. First it identifies the form that has been posted via the Ajax call. Secondly the field value "formOne" is used to leverage PHP's variable function feature.
			</p>
			
			<p>
			On the server side I now want my PHP script to check that the request was a POST and that the POST array contains a from that I want to be handled by a specific PHP function. The code to handle that check follows:
			<div>
<pre>
//Check the Post variable to verify which form should be processed.
if(in_array($_POST['function'], array('formOne','formTwo'))){
	//Call the appropriate function associated
	//with the form post
	$_POST['function']();
}else{
	echo '<strong>ERROR: The Form Post was not captured!</strong>';
}
</pre>
			</div>
			
			<p>The above code segment looks in the POST array for one of two forms, formOne or formTwo. If the POST array contains either of these forms the code now uses the "function" form field to call the appropriate form processing method. PHP supports the concept of "Variable functions", which is what is being used here in this code segment. 
			</p>
			
			<p>
			From the PHP manual:
			<em>PHP supports the concept of variable functions. This means that if a variable name has parentheses appended to it, PHP will look for a function with the same name as whatever the variable evaluates to, and will attempt to execute it. Among other things, this can be used to implement callbacks, function tables, and so forth.</em>
			</p>
			
			<p>Here's a more complete sample of the core code required to understand how an Ajax script can get data from a form, send it to a specific function in your php script and finally display the response received. Php server side code required for the form processing of data posted via ajax:			
			</p>
			
			<p>
			In the right-hand column you will find a more complete sample of the core code required to understand how an Ajax script can get data from a form, send it to a specific function in your php script and finally display the response received:
			</p>
			
        </div><!--/span-->  
            
        <!-- Right Column -->
        <div class="span6 well">
        	<h2>Additional Details</h2>
			
			<ul>
              <li><a href="ajaxDemo1.php">Ajax Demo Form 1</a></li>
              <li><a href="ajaxDemo2.php">Ajax Demo Form 2</a></li>
              <li><a href="modalDemo.php">Modal Form Demo</a></li>
			</ul>
        	
        	<p>
        	Github: Download all the code for this tutorial 
        	<a href="https://github.com/rantoine/Sandbox/tree/PhpAjaxCall" target="_blank">here!</a>
        	</p>
        	
        	<p>Got some additional ideas on Ajax Calls, Php and form processing? Fork this Github Repository and 
        	provide an update.
        	</p>
        	
Php server side code required for the form processing of data posted via ajax:			
<div>
<pre>
//Form One Processing
function formOne(){
	$output = 'Output from Form One:<br />';
	foreach ($_POST as $key => $value) {
		$output .= $key . ': ' . $value . '<br />';
	}
	echo $output;
}

//Form Two Processing
function formTwo(){
	$output = 'Output from Form Two:<br />';
	foreach ($_POST as $key => $value) {
		$output .= $key . ': ' . $value . '<br />';
	}
	echo $output;
}

//Stub function for processing Modal Form
function modalForm(){
	return null;
}

//Check the Post variable to verify which form should be processed.
if(in_array($_POST['function'], array('formOne','formTwo'))){
	//Call the appropriate function associated
	//with the form post
	$_POST['function']();
}else{
	echo '<strong>ERROR: The Form Post was not captured!</strong>';
}
</pre>
</div>

Below you will see the Javascript/jQuery required to make this demo work:
<div>
<pre>

(function () {

    var formOne = function () {
    	var formData = $("#formOne").serialize();
    	
    	$.ajax({ url: '/ajax.php',
            data: formData,
            type: 'post',
            complete: function(output) {
                         $('#formOneResults').html(output.responseText);
                     }
    	});	  	
    };

    var formTwo = function () {
    	var formData = $("#formTwo").serialize();
    	
    	$.ajax({ url: '/ajax.php',
            data: formData,
            type: 'post',
            complete: function(output) {
                         $('#formTwoResults').html(output.responseText);
                     }
    	});	    	
    };

    $(document).ready(function () {
    	$("#formOneBtn").on("click", function(e){
    		e.preventDefault();
    		formOne();
    	});    	
    	
    	$("#formTwoBtn").on("click", function(e){
    		e.preventDefault();
    		formTwo();
    	});

    });

} ()); 
</pre>
</div>
        	
        	
        	
        </div><!--/span-->
       </div>		  
		  
		  <hr>
      <footer>
        <p>&copy; Glenn Antoine 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/thirdparty/jquery.js"></script>
    <script src="./js/thirdparty/bootstrap-transition.js"></script>
    <script src="./js/thirdparty/bootstrap-alert.js"></script>
    <script src="./js/thirdparty/bootstrap-modal.js"></script>
    <script src="./js/thirdparty/bootstrap-dropdown.js"></script>
    <script src="./js/site.js"></script>

  </body>
</html>
