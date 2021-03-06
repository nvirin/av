<?php
	//Register KoolSlideMenu component to your page
    require $resourcesURL."/ksmenu/ksmenu.php";

    //Create slidemenu object.
    $navSM = new KoolSuiteMenu("navSM");

    //Set properties for slidemenu
    $navSM->styleFolder = $resourcesURL."/ksmenu";
		
	$navSM->singleExpand = true;
    //load Nav.xml
	$xml = simplexml_load_file($xmlNav);
	
	$nav = $xml["id"];
	
	buildNavigation($xml->category);
	
	/*
	$totalLinks = count($xml->category->link);
	for($i = 0; $i < $totalLinks; $i++) {
		$_id = $xml->category->link[$i]["id"];
		$_text = $xml->category->link[$i]["text"];
		$_link = $xml->category->link[$i]["link"];
		if(substr($_link,0,7) != "http://")
			$_link = $navURL."/".$_link;
		$navSM->AddChild("root","$_id","$_text","$_link",false);//add Parent
	}
	$navSM->selectedId = $linkId;
	
	$totalCat = count($xml->category->category);
	for($i = 0; $i < $totalCat; $i++) {
		$id = $xml->category->category[$i]["id"];
		$text = $xml->category->category[$i]["text"];	
		$navSM->addParent("root","$id","$text");//add Parent
		//Get total child
		$totalLink = count($xml->category->category[$i]->link);
		if($totalLink > 0)
		{
			for($j = 0; $j < $totalLink; $j++) {
				$childId 	= $xml->category->category[$i]->link[$j]["id"];
				$childText 	= $xml->category->category[$i]->link[$j]["text"];
				$childLink 	= $navURL."/".$xml->category->category[$i]->link[$j]["link"];
				$child 		= $navSM->AddChild("$id","$childId","$childText","$childLink");//add Child
				if(strtolower($docs["id"]) == strtolower($childId))
				{
					$child->parent->expand = true;	
					$navSM->selectedId = $childId;
				}
			}
		}
	}
	*/
	function buildNavigation($cat)
	{
		global $navURL;
		global $navSM;
		$parentid = $cat["id"];
		$totalLinks = count($cat->link);
		for($i = 0; $i < $totalLinks; $i++) {
			$_id = $cat->link[$i]["id"];
			$_text = $cat->link[$i]["text"];
			$_link = $cat->link[$i]["link"];
			if(substr($_link,0,7) != "http://")
				$_link = $navURL."/".$_link;
			$child = $navSM->addChild("$parentid","$_id","$_text","$_link",false);			
			if ($parentid=="root")
			{
				global $linkId;
				$navSM->selectedId = $linkId;
			}
			else
			{
				global $docs;
				if(strtolower($docs["id"]) == strtolower($_id))
				{
					$child->parent->expand = true;
					if($child->parent->parent!==null)
					{
						$child->parent->parent->expand = true;
					}
					$navSM->selectedId = "$_id";
				}							
			}
		
		}
		
		$totalCat = count($cat->category);
		for($i = 0; $i < $totalCat; $i++) {
			$id = $cat->category[$i]["id"];
			$text = $cat->category[$i]["text"];			
			$navSM->addParent("$parentid","$id","$text");//add Parent				
			//Get total child
			buildNavigation($cat->category[$i]);
		}
	}	
?>
<div class="control"><img src="<?php echo $imgURL;?>/none.gif" class="small_logo <?php echo $nav;?>" align="absbottom" /> <?php echo $nav?></div>
<?php echo $navSM->Render();?>
