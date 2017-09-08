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
              <li><a href="ajaxDemo1.php">Ajax Form 1</a></li>
              <li><a href="ajaxDemo2.php">Ajax Form 2</a></li>
              <li class="active"><a href="modalDemo.php">Modal Demo</a></li>
			  <li><a href="http://glennantoine.com/2012/08/11/phpajax-call-php-function/">Main Site - Tutorial</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
	<h1>Modal Demo</h1>		  
      <div class="row-fluid">
        <div class="span6">
	  <!-- Modal Form Post Results -->
	  <div id="formOneResults">
	  </div>
          <p> Twitter Bootstrap Modal are created using a custom Jquery Plugin. It may be used to create modal windows to 
          enrich user experience or to add functionality to users.</p>
          
          <p>Additionally, to improve your end users experience Twitter Bootstrap gives you the ability to use popovers and 
          tooltips within Modals.</p>
          
          <p>In this demo we are primarily using the Twitter Bootstrap modal plugin to display the form for the purpose of 
          discussing the posting of form data from within a modal. </p>
          
          <p>While not the primary focus of this demo I will provide a few details below on setting up your first modal 
          using Twitter Bootstrap's modal plugin.</p>
          <!-- sample modal content -->
          <div id="myModal" class="modal hide fade">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Modal Heading</h3>
            </div>
            <div class="modal-body">
              <p><strong>This form has not been wired up to post the changes to the php server side function to process the form</strong></p>
              <p>There is an empty function in place that will need to be completed to handle the form processing in a manner of
              your choosing.</p>
              <p>A couple of things that you will want to keep in mind:</p>
              <ul>
              	<li>On success you may want to close the modal</li>
              	<li>On error you will want to pass the error messages back to the modal without closing</li>
              	<li>Considering providing both Save and Save & Close options for your users</li>
              </ul>
              <hr>

              <h4>Modal Form</h4>
				<!-- Modal Form Starts Here -->
					<form name="modalForm" id="modalForm">
						<input type="hidden" name="function" value="modalForm">
					        <fieldset>  
					          <div class="control-group">  
					            <label class="control-label" for="input1">Text input</label>  
					            <div class="controls">  
					              <input type="text" class="input-xlarge" id="input1" name="f1Input">    
					            </div>  
					          </div>  
					          <div class="control-group">  
					            <label class="control-label" for="select1">Select list</label>  
					            <div class="controls">  
					              <select id="select1" name="f1Select">  
					                <option>Please Select...</option>  
					                <option value="1">1</option>  
					                <option value="2">2</option>  
					                <option value="3">3</option>  
					                <option value="4">4</option>  
					              </select>  
					            </div>  
					          </div>  
					        </fieldset>  
					</form>
				<!-- Modal Form Ends Here -->
            </div>
            <div class="modal-footer">
              <a class="btn" data-dismiss="modal" >Close</a>
              <a id="modalFormSaveBtn" class="btn btn-success">Save changes</a>
            </div>
          </div>
          <a data-toggle="modal" href="#myModal" class="btn btn-success btn-large">Launch Modal Form</a>	
        </div><!--/span-->      
      
        <div class="span6 well">
        	<h2>Twitter Bootstrap Modals</h2>
        	<p>The Twitter Bootstrap Modals are created via a custom Jquery Plugin. This allows you to create modal windows to 
        	improve the user experience of those visiting your website and for added functionality.
        	</p>
        	
        	<p>This is not an in-depth tutorial  as that is not the primary focus of this page. However, at this point you 
        	have a fully functional modal with a form and I may over time add additional modals to demonstrate additional 
        	form processing strategies. I will show some of the various options available for customization so that you 
        	can test these options if you desire.
        	</p>
        	
        	<hr>
        	<h3>What is required</h3>
        	<p>In order to use the Twitter Bootstrap Modal plugin you will need to have Jquery, Twitter Bootstrap CSS and 
        	the JavaScript file bootstrap-modal.js. All of these resources are available in the Twitter Bootstrap Download.
        	</p>
        	
        	<p>You have a couple of options for getting Jquery loaded into your website. First of all the Jquery library is 
        	available under docs -> assets -> js of your Twitter Bootstrap folder in the file jquery.js. Secondly, you can 
        	can load Jquery from <strong>https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js</strong>.
        	</p>
        	
        	<p>If you are interested in viewing a Twitter Bootstrap Modal launch the Modal Form demo 
        	</p>
        	<a data-toggle="modal" href="#myModal" class="btn btn-success btn-large">Launch Modal Form</a>
        	
        	<hr>
          <h2>Using bootstrap-modal</h2>
          <p>Call the modal via javascript:</p>
<pre class="prettyprint linenums">$('#myModal').modal(options)</pre>        	
	
          <h3>Options</h3>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 100px;">Name</th>
               <th style="width: 50px;">type</th>
               <th style="width: 50px;">default</th>
               <th>description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>backdrop</td>
               <td>boolean</td>
               <td>true</td>
               <td>Includes a modal-backdrop element. Alternatively, specify <code>static</code> for a backdrop which doesn't close the modal on click.</td>
             </tr>
             <tr>
               <td>keyboard</td>
               <td>boolean</td>
               <td>true</td>
               <td>Closes the modal when escape key is pressed</td>
             </tr>
             <tr>
               <td>show</td>
               <td>boolean</td>
               <td>true</td>
               <td>Shows the modal when initialized.</td>
             </tr>
            </tbody>
          </table>
          <h3>Markup</h3>
          <p>You can activate modals on your page easily without having to write a single line of javascript. Just set <code>data-toggle="modal"</code> on a controller element with a <code>data-target="#foo"</code> or <code>href="#foo"</code> which corresponds to a modal element id, and when clicked, it will launch your modal.</p>
          <p>Also, to add options to your modal instance, just include them as additional data attributes on either the control element or the modal markup itself.</p>
<pre class="prettyprint linenums">
&lt;a class="btn" data-toggle="modal" href="#myModal" &gt;Launch Modal&lt;/a&gt;
</pre>

<pre class="prettyprint linenums">
&lt;div class="modal hide" id="myModal"&gt;
  &lt;div class="modal-header"&gt;
    &lt;button type="button" class="close" data-dismiss="modal"&gt;&times;&lt;/button&gt;
    &lt;h3&gt;Modal header&lt;/h3&gt;
  &lt;/div&gt;
  &lt;div class="modal-body"&gt;
    &lt;p&gt;One fine body...&lt;/p&gt;
  &lt;/div&gt;
  &lt;div class="modal-footer"&gt;
    &lt;a href="#" class="btn" data-dismiss="modal"&gt;Close&lt;/a&gt;
    &lt;a href="#" class="btn btn-primary"&gt;Save changes&lt;/a&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>

          <h3>Methods</h3>
          <h4>.modal(options)</h4>
          <p>Activates your content as a modal. Accepts an optional options <code>object</code>.</p>
<pre class="prettyprint linenums">
$('#myModal').modal({
  keyboard: false
})</pre>
          <h4>.modal('toggle')</h4>
          <p>Manually toggles a modal.</p>
          <pre class="prettyprint linenums">$('#myModal').modal('toggle')</pre>
          <h4>.modal('show')</h4>
          <p>Manually opens a modal.</p>
          <pre class="prettyprint linenums">$('#myModal').modal('show')</pre>
          <h4>.modal('hide')</h4>
          <p>Manually hides a modal.</p>
          <pre class="prettyprint linenums">$('#myModal').modal('hide')</pre>
          <h3>Events</h3>
          <p>Bootstrap's modal class exposes a few events for hooking into modal functionality.</p>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 150px;">Event</th>
               <th>Description</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>show</td>
               <td>This event fires immediately when the <code>show</code> instance method is called.</td>
             </tr>
             <tr>
               <td>shown</td>
               <td>This event is fired when the modal has been made visible to the user (will wait for css transitions to complete).</td>
             </tr>
             <tr>
               <td>hide</td>
               <td>This event is fired immediately when the <code>hide</code> instance method has been called.</td>
             </tr>
             <tr>
               <td>hidden</td>
               <td>This event is fired when the modal has finished being hidden from the user (will wait for css transitions to complete).</td>
             </tr>
            </tbody>
          </table>

<pre class="prettyprint linenums">
$('#myModal').on('hidden', function () {
  // do something...
})</pre>
        </div>
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
