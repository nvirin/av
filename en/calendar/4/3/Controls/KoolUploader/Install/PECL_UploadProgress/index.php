<?php 
	$docs["id"]					= "PECL_UploadProgress";
	$docs["title"] 				= "Install PECL UploadProgress";
	$docs["meta-description"] 	= "KoolUploader is amazing PHP Ajax File Upload with Real-Time Progress Tracking capability. This is an art of power and simplicity";
	$docs["meta-keywords"] 		= "php ajax file upload, php upload progress, ajax file upload";

	ob_start();
?>

<div class="example">
	<style>
		.codebox
		{
			border:solid 1px gray;
			background-color:#FBEDBB;
			padding-top:5px;
			padding-bottom:5px;
			padding-left:15px;
			padding-right:15px;
			margin:0px;
			font: 9pt "Courier New", Courier, mono;
			white-space: pre;
			overflow:auto !important;	
		}		
	</style>
    <div class="desc">
        If you want to enable the cool Progress Tracking feature, you need to get PECL UploadProgess extension installed. More information about this extension you may find <a href="http://pecl.php.net/package/uploadprogress" target="_blank">here</a>. Lastly, please try to have PHP version 5.2.x 
    </div>
    <div class="break20px"></div>
    <div class="detail">
    <div class="header"><h4>If you are use Linux, do as follow:</h4></div>
        <div class="show-it">
	<ol>
		<li>Run the following command:
<pre class="codebox" style="width:300px;">
<b>pecl install uploadprogress</b>
</pre>
<br/>
		</li>
		<li>Open your <code><b>php.ini</b></code> and register the extension:
<pre class="codebox" style="width:300px;">
<b>extension=uploadprogress.so</b>
</pre>
<br/>
		</li>
		<li>Restart server.</li>	
	</ol>
	
		
        </div>
    </div>
	<div class="break20px"></div>
    <div class="detail">
    	
    <div class="header"><h4>If you are use Window, do as follow:</h4></div>
        <div class="show-it">
	<ol>
		<li>Download this <a href="php_uploadprogress.dll"><code>php_uploadprogress.dll</code></a><br/><br/></li>
		<li>Copy <code>php_uploadprogress.dll</code> into <code>{PHP_PATH}\ext</code> folder<br/><br/></li>
		<li>Open <code>php.ini</code> and add the following:
<pre class="codebox" style="width:500px;">
extension=php_uploadprogress.dll
uploadprogress.file.filename_template="C:\WINDOWS\TEMP\upt_%s.txt"
</pre>
<br/>
		</li>
		<li>Restart server.</li>
	</ol>
        </div>
    </div>	
	
    <div class="break20px"></div>
</div>

<?php 
	$docs["content"] = ob_get_clean();
	$resourcesURL 	= "../../../../Resources";
	include $resourcesURL."/show_tutorial.php";
?>