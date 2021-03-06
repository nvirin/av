<?php 

	//Global var
	$rootURL		= "../../../index.php";
	$xmlControls 	= "../../../controls.xml";
	$controlsURL 	= "../../..";
	$cssURL 		= "../../../Resources/css";
	$imgURL 		= "../../../Resources/images";
	$resourcesURL 	= "../../../Resources";
	$xmlNav 		= "../nav.xml";
	$navURL			= "..";
	$xmlLog 		= "changelog.xml";
	$xmlOverview 	= "../overview.xml";
	$log 			= array();
	
	$linkId			= "changelog";
	
	$xml = simplexml_load_file($xmlNav);
	$control["id"] = $xml["id"];
	
	$xml = simplexml_load_file($xmlOverview);
	$control["name"]				= $xml->name;
	$control["description"] 		= $xml->description;
	
	//load Doc.xml
	$xml = simplexml_load_file($xmlLog);	
	$log["id"] = $xml["id"];
	$log["meta-description"] = $xml["metadescription"];
	$log["meta-keywords"] = $xml["metakeywords"];
	$log["id"] = $xml["id"];
	
	
	$totalLog = count($xml->log);
	for($i = 0; $i < $totalLog; $i++) {
		$log_html .= "<tr><td class='tbl-title text_emNX'>".$xml->log[$i]["date"].": Version ".$xml->log[$i]["version"]."</td></tr>\n";
		$xml->log[$i] = trim($xml->log[$i]);
		$xml->log[$i] = str_replace("\n","<br>",$xml->log[$i]);
		$log_html .= "<tr><td>".$xml->log[$i]."<div class='break20px'></div></td></tr>\n";
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $log["meta-description"]?>" />
<meta name="keywords" content="<?php echo $log["meta-keywords"]?>" />
<link rel="stylesheet" href="<?php echo $cssURL?>/main.css" />
<!--[if IE 6]><link rel="stylesheet" href="<?php echo "$resourcesURL/ie6.css.php?imgURL=$imgURL";?>" /><![endif]-->
<link rel="stylesheet" href="<?php echo $cssURL?>/tab-view.css" />
<title><?php echo $control["id"];?>'s Documentation - ChangeLog</title>

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
                	<?php include($resourcesURL."/nav.php");?>
                </div>
                <div class="break10px"></div>
                <div id="controls">
                        <?php include($resourcesURL."/controls.php");?>
                </div>
        	</td>
            <td class="content-R">
             <div id="main-content">
             	<table><tr><td class="tl"><img src="<?php echo $imgURL?>/none.gif" /></td><td class="tc"><div>&nbsp;</div></td><td class="tr"><img src="<?php echo $imgURL?>/none.gif" /></td></tr></table>
                <div id="middle">
                	<div id="main">
                    	<div class="component-title fix-float"><h1><span class="left"><img src="../Images/icon.png" align="absbottom" /><?php echo $control["name"];?></span></h1></div>
                        <div class="summary">
                        	<div class="header"><h4>Changelog</h4></div>
							<div class="break20px"></div>
                            <div class="show-it">
                            	<table class="list-summary">
                                <?php echo $log_html?>

                                </table>
                            </div>
                        </div>
                        
                        <div class="clear-this"></div>
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