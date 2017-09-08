<?php 
	$docs["id"]					= "Install_Instruction";
	$docs["title"] 				= "Install Instruction";
	$docs["meta-description"] 	= "This page will guide you how to use and install KoolPHP components ...";
	$docs["meta-keywords"] 		= "install instruction";

	ob_start();
?>

<div class="example">
    <div class="desc">
        This page will guide you how to use and install KoolPHPSuite.
    </div>
    <div class="break20px"></div>
    <div class="detail">
    <div class="header"><h4>Simple steps</h4></div>
        <div class="show-it" style="padding-left:10px;line-height:18px;">
			<div>1. Unzip <b>KoolPHPSuite.zip</b> file.</div>
			<div>2. Copy <b>KoolPHPSuite</b> folder inside unzipped directory to your localhost folder.</div>
			<div>3. Make sure that you have installed <b>PHP5</b>.</div>
			<div>4. Start browsing the suite in web browser with url <b>"http://localhost/KoolPHPSuite/index.php"</b>.</div>
        </div>
    </div>
    <div class="break20px"></div>

</div>

<?php 
	$docs["content"] = ob_get_clean();
	$resourcesURL 	= "../../../../Resources";
	include $resourcesURL."/show_tutorial.php";
?>