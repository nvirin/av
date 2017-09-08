<?php 
	$html = "<li class='first'>&nbsp;</li>";
	$xml = simplexml_load_file($xmlControls);
	$total = count($xml->control);
	$latest_html = "";
	for($i = 0; $i < $total; $i++) {
		$html .= "<li>";
		$html .= "<a href='".$controlsURL."/".$xml->control[$i]["link"]."'><span class='inner'>";
		
		$html .= "<img src='".$imgURL."/none.gif' class='small_logo ".$xml->control[$i]["name"]."' align='absbottom'> ";
		$html .= "<span>".$xml->control[$i]["name"]."</span>";
		if($xml->control[$i]["new"]=="true")
			$html .= " <span class='new'>new</span>";
		
		$html .= "</span></a>";		
		$html .= "</li>";
		
		
		if($i!=0)
		{
			if($i % 2 == 0)
				$latest_html .= "<tr bgcolor='#f5fdf0'><td class='name'>";
			else
				$latest_html .= "<tr><td class='name'>";
			//$latest_html .="<a href='".$controlsURL."/Controls/".$xml->control[$i]["name"]."/ChangeLog/index.php'>".$xml->control[$i]["name"]."</a>";
			$latest_html .=$xml->control[$i]["name"];
			$latest_html .="</td><td>";
			$latest_html .=$xml->control[$i]["version"];
			$latest_html .= "</td><td>";
			$latest_html .=$xml->control[$i]["releasedate"];
			$latest_html .= "</td><td>";
			$latest_html .="<a href='".$controlsURL."/Controls/".$xml->control[$i]["name"]."/Changelog/index.php'>ChangeLog</a>";
			$latest_html .="</td><tr>";			
		}
		
	}
?>
<ul>
    <?php echo $html?>
</ul>
