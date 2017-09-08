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
              <li><a href="tutorial.php">Tutorial</a></li>
              <li class="active"><a href="ajaxDemo1.php">Ajax Form 1</a></li>
              <li><a href="ajaxDemo2.php">Ajax Form 2</a></li>
              <li><a href="modalDemo.php">Modal Demo</a></li>
			  <li><a href="http://glennantoine.com/2012/08/11/phpajax-call-php-function/">Main Site - Tutorial</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
	<h1>Ajax PHP Demo</h1>
	
		<!-- First Form Starts Here -->
			<form name="formOne" id="formOne" class="well">
				<input type="hidden" name="function" value="formOne">
			        <fieldset>  
			          <legend>Demo Form 1</legend>  
			          <div class="control-group">  
			            <label class="control-label" for="input01">Text input</label>  
			            <div class="controls">  
			              <input type="text" class="input-xlarge" id="input01" name="f1Input">    
			            </div>  
			          </div>  
			          <div class="control-group">  
			            <label class="control-label" for="select01">Select list</label>  
			            <div class="controls">  
			              <select id="select01" name="f1Select">  
			                <option>Please Select...</option>  
			                <option value="1">1</option>  
			                <option value="2">2</option>  
			                <option value="3">3</option>  
			                <option value="4">4</option>  
			              </select>  
			            </div>  
			          </div>  
			          <div class="form-actions">  
			            <button id="formOneBtn" class="btn btn-primary">Save changes</button>  
			            <button class="btn">Cancel</button>  
			          </div>  
			        </fieldset>  
			</form>
		<!-- First Form Ends Here -->
	  <div id="formOneResults">
	  </div>
	  
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
