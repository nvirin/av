<?php 
//Resigter Global var	
	$rootURL		= "../../index.php";
	$xmlControls 	= "../../controls.xml";
	$controlsURL = "../..";
	$cssURL 		= "../../Resources/css";
	$imgURL 		= "../../Resources/images";
	$resourcesURL 	= "../../Resources";
	$xmlNav 		= "nav.xml";
	$navURL			= ".";
	$linkId			= "overview";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $cssURL?>/main.css" />
<!--[if IE 6]><link rel="stylesheet" href="<?php echo "$resourcesURL/ie6.css.php?imgURL=$imgURL";?>" /><![endif]-->
<title>KoolPHPSuite's Documentation</title>
<meta name="description" content="KoolPHP Suite contains a group of great UI controls to build excellent Web 2.0 application." />
<meta name="keywords" content="PHP UI, PHP Components, PHP Controls, PHP Ajax,PHP TreeView, PHP Slide Menu, PHP Tab Menu, PHP Ajax File Upload, PHP ComboBox, PHP AutoComplete" />
<meta name="author" content="KoolPHP.NET" />
<meta name="ResourceType" content="Documentation" />
<meta content="PHP, User Interface, PHP UI, Computer, Software, Internet, Web Design" name="classification" /> 
</head>
<body>
<!-- Wrap all -->
<div id="wrap-all" class="fix-float">
	<div id="top-examples">
    	<div id="banner">
        	<div id="logo">
            	<?php include($resourcesURL."/header.php")?>
            </div>
        </div><!-- end banner -->
    </div><!-- end top-home -->
    <!-- Body -->
    <div id="body" class="fix-float">
    	<table class="hack-ie"><tr valign="top">
        	<td class="content-L hack-ie">
            	<div id="nav">
                	<?php require($resourcesURL."/nav.php");?>
                </div>
                <div class="break10px"></div>
                <div id="controls">
                    <?php require($resourcesURL."/controls.php");?>
                </div>
        	</td>
            <td class="content-R">
             <div id="main-content">
             	<table><tr><td class="tl"><img src="<?php echo $imgURL?>/none.gif" /></td><td class="tc"><div>&nbsp;</div></td><td class="tr"><img src="<?php echo $imgURL?>/none.gif" /></td></tr></table>
                <div id="middle">
                	<div id="main">
                    	<div class="component-title fix-float"><span class="left"><img src="./Images/icon.png" align="absbottom" />Welcome to KoolPHP Suite Documentation</span></div>
                        <div class="example">
                        	<div class="show-control-desc">All KoolPHP's components are documented completely and neatly in your left-hand side tree. You may begin your search by browsing the tree. On every page of our documentation, there is the SendComments link where you can drop us an email. Please let us know your ideas and comments of how we can improve the documentation to serve you better, we will be very glad to hear from you. </div>
                            <div class="show-control-example">
			    <ul style="list-style:circle; padding-left:30px;">
                                	<li>If you have problem with choosing suitable license, please view <a href="Licensing/Which_License/index.php">our license</a> types.</li>
    								<li>If you have difficulty in installing the KoolPHP components, please <a href="Installation/Install_Instruction/index.php">view install instruction</a>.</li>
   									<li>For any issues and information, please email us at <a href="mailto:support@koolphp.net">support@koolphp.net</a>.</li>
							  </ul>
                                <div class="clearer"></div>
                            </div>
                            <div class="break20px"></div>
                            <div class="summary">
                        	<div class="header"><h4>Latest releases<h4></div>
                            <div class="show-it">
                       		 <table class="list-summary" style="width:450px;">
                                <tr>
                                	<td class="tbl-title" style="width:200px;">Controls</td>
                                    <td class="tbl-title" style="width:100px;">Version</td>
                                    <td class="tbl-title" style="width:100px;">Release Date</td>
                                    <td class="tbl-title" style="width:100px;"></td>
                                </tr>
                            	<?php echo $latest_html;?>
                                </table>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
                <table><tr><td class="bl"><img src="<?php echo $imgURL?>/none.gif" /></td><td class="tc"><div>&nbsp;</div></td><td class="br"><img src="<?php echo $imgURL?>/none.gif" /></td></tr></table>
             </div>
		<div class="break20px"></div>
		<div id="footer"><?php include($resourcesURL."/footer.php")?></div>
        </td>
    </tr></table>
    </div><!-- end Body -->
</div><!-- end Wrap all -->
<?php include($resourcesURL."/stats.php");?>
</body>
</html>
