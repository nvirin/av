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
              <li class="active"><a href="./">Home</a></li>
              <li><a href="tutorial.php">Tutorial</a></li>
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
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">References</li>
              <li><a href="http://php.net/manual/en/index.php" target="_blank">PHP Manual</a></li>
              <li><a href="http://docs.jquery.com/Main_Page" target="_blank">jQuery</a></li>
              <li><a href="http://api.jquery.com/jQuery.ajax/" target="_blank">jQuery.ajax()</a></li>
              <li><a href="http://api.jquery.com/serialize/" target="_blank">jQuery.serialize()</a></li>
              <li><a href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Bootstrap</a></li>
			  <li><a href="https://github.com/rantoine/Sandbox/tree/PhpAjaxCall" target="_blank">Github Repo</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Ajax w/ PHP Demo</h1>
            <p>On the next couple of pages there are a series of forms that can be submitted to a single PHP file that contains
            specific functions for the handling of each form. </p>
            <p><a href="tutorial.php" class="btn btn-success btn-large">Checkout the Tutorial Now &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div>
              <h2>Why this demo?</h2>
              <p>Recently I was asked how to submit a form via Ajax to a specific PHP function. Considering that for some time 
              now most of my development has been with the use of Zend Framework, I had to stop and think about how I use to 
              accomplish this task. For those using a MVC Framework such as Zend Framework 2.0 this is a trival matter as the 
              routing (/controller/action/) handles ensuring the post gets to the correct method. If for whatever reason you 
              are not using a MVC Framework with controller/action routing there are some additional steps that you 
              will need to take.</p>
              <p><a class="btn" href="tutorial.php">View Tutorial &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>jQuery</h2>
              <p>jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, 
              animating, and Ajax interactions for rapid web development.</p>
              <p><a class="btn" href="http://docs.jquery.com/Main_Page" target="_blank">Visit jQuery Website &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>PHP</h2>
              <p>PHP is a widely-used general-purpose scripting language that is especially suited for Web development and 
              can be embedded into HTML. If you are new to PHP, check out the online manual. </p>
              <p><a class="btn" href="http://php.net/manual/en/index.php" target="_blank">PHP Online Manual &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Twitter Bootstrap</h2>
              <p>Bootstrap provides simple and flexible HTML, CSS, and Javascript for popular user interface components and 
              interactions. In other words, it's a front-end toolkit for faster, more beautiful web development. It's 
              created and maintained by Mark Otto and Jacob Thornton at Twitter. </p>
              <p><a class="btn" href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Bootstrap Website &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

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
