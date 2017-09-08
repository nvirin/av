<?php
	function mapurl($url,$priority="0.5",$lastmod="2009-07-11",$changefreq="weekly")
	{
		$xml = "<url>";
		$xml .= "<loc>$url</loc>";
		$xml .= "<changefreq>$changefreq</changefreq>";
		$xml .= "<lastmod>$lastmod</lastmod>";
		$xml .= "<priority>$priority</priority>";		
		$xml .= "</url>";
		return $xml;		
	}
	header("content-type: text/xml");
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

	$root = "http://doc.koolphp.net/";
	$xmlControls = simplexml_load_file("controls.xml");
	$total = count($xmlControls->control);
	for($i = 0; $i < $total; $i++) 
	{
		echo mapurl($root.$xmlControls->control[$i]["link"],"1.0");
		$xmlNavigation = simplexml_load_file("Controls/".$xmlControls->control[$i]["name"]."/nav.xml");
		$totalCat = count($xmlNavigation->category->category);
		for($j = 0; $j < $totalCat; $j++)
		{
			$totalLink = count($xmlNavigation->category->category[$j]->link);
			for($m = 0; $m < $totalLink; $m++)
			{
				echo mapurl($root."Controls/".$xmlControls->control[$i]["name"]."/".$xmlNavigation->category->category[$j]->link[$m]["link"],"0.5");				
			}
		}
	}
	echo '</urlset>';
?>

