<?php
//*****************************************
//This setup would come in handy if you have a number of forms in your website
//that need form processing and you would like to keep all form handling in a single
//file. When adding additional forms remember to update the array in the "if" statement below.
//Author: Glenn Antoine
//Url: http://glennantoine.com


//Form One Processing
function formOne(){
	$output = 'Output from Form One:<br />';
	foreach ($_POST as $key => $value) {
		$output .= $key . ': ' . $value . '<br />';
	}
	echo $output;
}

//Form Two Processing
function formTwo(){
	$output = 'Output from Form Two:<br />';
	foreach ($_POST as $key => $value) {
		$output .= $key . ': ' . $value . '<br />';
	}
	echo $output;
}

//Stub function for processing Modal Form
function modalForm(){
	return null;
}

//Check the Post variable to verify which form should be processed.
if(in_array($_POST['function'], array('formOne','formTwo'))){
	//Call the appropriate function associated
	//with the form post
	$_POST['function']();
}else{
	echo '<strong>ERROR: The Form Post was not captured!</strong>';
}