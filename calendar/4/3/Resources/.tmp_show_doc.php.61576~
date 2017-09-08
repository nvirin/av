<?php 

	//Global var
	$rootURL		= "../../../../index.php";
	$xmlControls 	= "../../../../controls.xml";
	$controlsURL 	= "../../../..";
	$cssURL 		= "../../../../Resources/css";
	$imgURL 		= "../../../../Resources/images";
	$resourcesURL 	= "../../../../Resources";
	$installURL 	= "../../../../Install";
	$xmlNav 		= "../../nav.xml";
	$navURL			= "../..";
	$controlImgUrl	= "../../Images";
	
	$xmlDocs 		= "doc.xml";
	$docs 			= array();
	//load Code Highighter
	include($resourcesURL."/geshi.php");
	
	$xmlOverview 	= "../../overview.xml";
	
	$xml = simplexml_load_file($xmlNav);
	$control["id"] = $xml["id"];	
	
	$xml = simplexml_load_file($xmlOverview);
	$control["name"]				= $xml->name;
	$control["description"] 		= $xml->description;
	
	//load Doc.xml
	$xml = simplexml_load_file($xmlDocs);
	$docs["id"]					= $xml["id"];
	$docs["title"]				= $xml->title;
	$docs["meta-description"] 	= $xml->metadescription;
	$docs["meta-keywords"] 		= $xml->metakeywords;
	$docs["description"] 		= $xml->description;
	//Parse Properties
	$totalProperties = count($xml->properties->property);
	$parr=array();
	for($i = 0; $i < $totalProperties; $i++) {
		$p_name = strtolower(trim($xml->properties->property[$i]["name"]));
		$parr[] = $p_name;
		$parr_id[$p_name] = $i;
	}
	sort($parr);
	$p_html = "";
	$pd_html = "";	
	for($k = 0; $k < $totalProperties; $k++) {
		$i = $parr_id[$parr[$k]];
		$p_name = $xml->properties->property[$i]["name"];
		if($k % 2 == 1)
			$p_html .= "<tr bgcolor='#f5fdf0'>";
		else
			$p_html .= "<tr>";
		$p_html .= "<td><img src='".$imgURL."/property.gif' align='absbottom'></td><td class='name'>";
		$p_html .= "<a href='#".$p_name."' onclick=\"Highlight('".$p_name."',currentId())\">".$p_name."</a>";
		$p_html .= "</td><td>";
		$p_html .= $xml->properties->property[$i]->shortdesc;
		$p_html .= "</td></tr>";
		$geshi	 =& new GeSHi(trim($xml->properties->property[$i]->samplecode));
		$pd_html .= "<a name='".$p_name."'></a><div id='".$p_name."' class='property'>";
		$pd_html .= "<p class='fix-float p-name'>";
		$pd_html .= "<span class='left'>".$p_name."</span>";
		$pd_html .= "<span class='right'><a href='#' onclick=\"Highlight('',currentId())\">Top</a></span></p>";
		$pd_html .= "<p class='clearer p-type'><span class='p-type-name'>";
		$pd_html .= $xml->properties->property[$i]->type."</span>&nbsp;".$p_name."</p>";
		$pd_html .= "<p class='p-type-desc'>".$xml->properties->property[$i]->longdesc."</p>";
		
		
		if (isset($xml->properties->property[$i]->defaultvalue))
		{
			$pd_html .= "<p class='p-type-desc'><span class='text_emNX'>Default value : </span><i>".$xml->properties->property[$i]->defaultvalue."</i></p>";
		}
		
		$totalAllowedValues = count($xml->properties->property[$i]->allowedvalues->value);
		if($totalAllowedValues>0)
		{
			$pd_html .= "<p class='p-type-desc'><span class='text_emNX'>Allowed values : </span><br/><ul>";
			for($j = 0; $j < $totalAllowedValues; $j++){
				$pd_html .= "<li class='list-demo'>";
				$pd_html .= "<i>".$xml->properties->property[$i]->allowedvalues->value[$j]."</i> : ";
				$pd_html .= $xml->properties->property[$i]->allowedvalues->value[$j]["desc"];
				$pd_html .= "</li>";
			}
			$pd_html .= "</ul></p>";			
		}
		
		
		$totalDemos = count($xml->properties->property[$i]->demos->demo);
		if($totalDemos>0)
		{
			$pd_html .= "<p class='p-type-desc'><span class='text_emNX'>Demo : </span><br /><ul>";
			for($j = 0; $j < $totalDemos; $j++){
				
				$pd_html .= "<li class='list-demo'> - <a href='".$xml->properties->property[$i]->demos->demo[$j]["link"]."'>";
				$pd_html .= $xml->properties->property[$i]->demos->demo[$j];
				$pd_html .= "</a></li>";
			}
			$pd_html .= "</ul> <br /></p>";
		}
		
		$pd_html .= "<p class='p-type-desc'><img src='".$imgURL."/code_red.png' align='absbottom'> <a href='javascript:void(0)'";
		$pd_html .= "onclick=\"ShowHide('code_".$p_name."')\">Show/Hide Code</a>";
		$pd_html .= "<div id='code_".$p_name."' class='code-zone' style='display:none'> ".$geshi->parse_code();
		$pd_html .= "</div></p><p class='a-right version'>Supported from version: ";
		$pd_html .= $xml->properties->property[$i]->supportversion;
		$pd_html .= "</p></div>";
	}

	//Parse Method
	$totalMethods = count($xml->methods->method);
	$marr=array();
	$m_html = "";
	$md_html = "";	
	
	for($i = 0; $i < $totalMethods; $i++) {
		$m_name = strtolower(trim($xml->methods->method[$i]["name"])); 
		$marr[] = $m_name;
		$marr_id[$m_name] = $i;
	}
	sort($marr);
	for($k = 0; $k < $totalMethods; $k++) {
		$i = $marr_id[$marr[$k]];
		$m_name = $xml->methods->method[$i]["name"];
		if($k % 2 == 1)
			$m_html .= "<tr bgcolor='#f5fdf0'>";
		else
			$m_html .= "<tr>";
		$m_html .= "<td><img src='".$imgURL."/method.gif' align='absbottom'></td><td class='name'>";
		$m_html .= "<a href='#".$m_name."' onclick=\"Highlight('".$m_name."',currentId())\">".$m_name."</a>";
		$m_html .= "</td><td>";
		$m_html .= $xml->methods->method[$i]->shortdesc;
		$m_html .= "</td></tr>";
		$geshi	 =& new GeSHi(trim($xml->methods->method[$i]->samplecode));
		$md_html .= "<a name='".$m_name."'></a><div id='".$m_name."' class='property'>";
		$md_html .= "<p class='fix-float p-name'>";
		$md_html .= "<span class='left'>".$m_name."</span>";
		$md_html .= "<span class='right'><a href='#' onclick=\"Highlight('',currentId())\">Top</a></span></p>";
		$md_html .= "<p class='clearer p-type'>";
		
		$totalPara = count($xml->methods->method[$i]->parameters->param);
		
		$md_html .= "<span class='p-type-name'>".$xml->methods->method[$i]->type."</span>&nbsp;";
		$md_html .= $m_name."(";
		for($j = 0; $j < $totalPara; $j++) {
			$md_html .= ($xml->methods->method[$i]->parameters->param[$j]["optional"]=="true")?"[":"";
			$md_html .= "<span class='p-type-name'>".$xml->methods->method[$i]->parameters->param[$j]["type"]."</span>&nbsp;";
			$md_html .= $xml->methods->method[$i]->parameters->param[$j];
			$md_html .= ($xml->methods->method[$i]->parameters->param[$j]["optional"]=="true")?"]":"";
			if($j<$totalPara-1)
				$md_html .=", ";
		}
		$md_html.=")";
		$md_html .= "</p><p class='p-type-desc'>".$xml->methods->method[$i]->longdesc."</p>";
		
		$totalDemos = count($xml->methods->method[$i]->demos->demo);
		if ($totalDemos>0)
		{
			$md_html .= "<p class='p-type-desc'><span class='text_emNX'>Demo : </span><br /><ul>";	
			for($j = 0; $j < $totalDemos; $j++){
				
				$md_html .= "<li class='list-demo'> - <a href='".$xml->properties->property[$i]->demos->demo[$j]["link"]."'>";
				$md_html .= $xml->methods->method[$i]->demos->demo[$j];
				$md_html .= "</a></li>";
			}
			$md_html .= "</ul><br /></p>";
		}
		$md_html .= "<p class='p-type-desc'><img src='".$imgURL."/code_red.png' align='absbottom'> <a href='javascript:void(0)'";
		$md_html .= "onclick=\"ShowHide('code_".$m_name."')\">Show/Hide Code</a>";
		$md_html .= "<div id='code_".$m_name."' class='code-zone' style='display:none'> ".$geshi->parse_code();
		$md_html .= "</div></p><p class='a-right version'>Supported from version: ";
		$md_html .= $xml->methods->method[$i]->supportversion;
		$md_html .= "</p></div>";
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $docs["meta-description"]?>" />
<meta name="keywords" content="<?php echo $docs["meta-keywords"]?>" />
<link rel="stylesheet" href="<?php echo $cssURL?>/main.css" />
<!--[if IE 6]><link rel="stylesheet" href="<?php echo "$resourcesURL/ie6.css.php?imgURL=$imgURL";?>" /><![endif]-->
<link rel="stylesheet" href="<?php echo $cssURL?>/tab-view.css" />
<script language="javascript" src="<?php echo $resourcesURL?>/js/showhide.js"></script>
<title><?php echo $control["id"];?>'s Documentation - <?php echo $docs["title"];?></title>

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
                    	<div class="component-title fix-float"><h1><span class="left"><img src="<?php echo $controlImgUrl; ?>/icon.png" align="absbottom" /><?php echo $docs["title"];?></span></h1></div>
                        <div class="description">
                        	<?php echo $docs["description"];?>
                        </div>
						<div class="summary">
                        	<div class="header"><h4>Summary</h4></div>
                            <div class="show-it">
								<?php if($p_html!=""){ ?>
								<table class="list-summary">
	                                <tr>
	                                	<td class="tbl-title" style="width:20px;">
	                                	<td class="tbl-title" style="width:130px;">Properties</td>
	                                    <td class="tbl-title">Description</td>
	                                </tr>
	                            	<?php echo $p_html?>
                                </table>
								<div class="break10px"></div>
								<?php }?>
								
                                <?php if($m_html!=""){ ?>
                                <table class="list-summary">
	                                <tr>
	                                	<td class="tbl-title" style="width:20px;">
	                                	<td class="tbl-title" style="width:130px;">Methods</td>
	                                    <td class="tbl-title">Description</td>
	                                </tr>
	                            	<?php echo $m_html?>
                                </table>
								<?php }?>
								
								
                            </div>
                        </div>
						
						<?php if($pd_html!=""){ ?>
						<div class="break20px"></div>
                        <div class="detail">
                        	<div class="header"><h4>Properties Detail</h4></div>
                            <div class="show-it">
                            	<?php echo $pd_html?>
                            </div>
                        </div>
						<?php }?>
						
						<?php if($md_html!=""){ ?>
                        <div class="break20px"></div>
                        <div class="detail">
                        	<div class="header"><h4>Methods Detail</h4></div>
                            <div class="show-it">
                            	<?php echo $md_html?>
                            </div>
                        </div>
                        <?php }?>
						
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
<script type="text/javascript">
	Highlight(currentId(),"");
</script>
</body>
</html>