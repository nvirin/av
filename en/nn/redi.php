<?php 
var_dump($_SESSION['lang']);
if(isset($_POST['lang'])&&!empty($_POST['lang'])){
	if($_POST['lang']=='fr'){
		$_SESSION['lang']='fr';
	}elseif($_POST['lang']=='en'){
        $_SESSION['lang']='en';
	}
	
}

if($_SESSION['lang']=='en'){

header('Location: en/');
}elseif($_SESSION['lang']=='fr'){
	header('Location: /');

}else{
	header('Location: en/');

}


 ?>