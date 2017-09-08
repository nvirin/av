<?php
//register a custom post type to preview the forms, this is for testing only

add_action('wp_ajax_core37_lp_save_page', 'core37_lp_save_page');

function core37_lp_save_page()
{
	$content = array();
	parse_str(file_get_contents("php://input"), $content);

	//pass the form ID to the editor
	echo C37LPManager::savePage($content);
	die();
}

/**
 * Get all the form
 */
add_action('wp_ajax_core37_lp_list_pages', 'core37_lp_list_pages' );

function core37_lp_list_pages()
{
	$forms = C37LPManager::getAllPages();

	echo json_encode($forms);

	die();
}

/**
 * load a form based on form ID
 */

add_action('wp_ajax_core37_lp_load_page', 'core37_lp_load_page');

function core37_lp_load_page()
{

	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	echo json_encode(
		C37LPManager::loadSinglePageForEditing($data['pageID'])
	);

	die();
}

/**
 * Delete a form based on its ID
 *
 */

add_action('wp_ajax_core37_lp_delete_page', 'core37_lp_delete_page');


function core37_lp_delete_page()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	C37LPManager::deletePage($data['pageID']);
	echo 'done';

	die();

}


add_action('wp_ajax_core37_lp_form_admin_save_settings', 'core37_lp_form_admin_save_settings');

function core37_lp_form_admin_save_settings()
{
	//this function accepts data from post content. There is one variable from post array : type is
	//the key to decide what to do next

	$data = array();
	parse_str(file_get_contents("php://input"), $data);

	switch($data['type'])
	{
		case 'recaptcha' :
			update_option('c37_lp_recaptcha_site_key', $data['recaptcha_site_key']);
			update_option('c37_lp_recaptcha_secret_key', $data['recaptcha_secret_key']);
			echo 'success';
			break;

		case 'receiving-email' :
			update_option('c37_lp_receiving_email', $data['email']);
			break;
		default:
			break;
	}


	die();




}

//list of form styles
add_action('wp_ajax_core37_lp_get_form_styles', 'core37_lp_get_form_styles');

function core37_lp_get_form_styles()
{
	$styles = array(
		array(
			'class' => 'c37-lp-style-1',
			'is_pro' => false
		),
		array(
			'class' => 'c37-lp-style-2',
			'is_pro' => false
		),
		array(
			'class' => 'c37-lp-style-3',
			'is_pro' => true
		),
		array(
			'class' => 'c37-lp-style-4',
			'is_pro' => true
		),
		array(
			'class' => 'c37-lp-style-5',
			'is_pro' => true
		),
		array(
			'class' => 'c37-lp-style-6',
			'is_pro' => true
		)
	);

	echo json_encode($styles);
	die();
}


add_action('wp_ajax_core37_lp_get_default_parameters', 'core37_lp_get_default_parameters');
function core37_lp_get_default_parameters()
{
	$data = array(
		'imagePlaceholder' => str_replace('/inc/', '',plugin_dir_url(__FILE__)) . '/css/images/image-placeholder.jpg'
	);

	echo json_encode($data);

	die();
}

//save popup option
add_action('wp_ajax_core37_lp_save_popup_option', 'core37_lp_save_popup_option');

function core37_lp_save_popup_option()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);
	$optionID = C37LPPopupManager::saveOption($data);

	echo $optionID;

	die();
}

//delete popup option
add_action('wp_ajax_core37_lp_delete_popup_option', 'core37_lp_delete_popup_option');

function core37_lp_delete_popup_option()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	C37LPPopupManager::deleteOption($data['optionID']);

}

//load popup option
add_action('wp_ajax_core37_lp_load_single_popup_option', 'core37_lp_load_single_popup_option');

function core37_lp_load_single_popup_option()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);
	echo rawurlencode(json_encode(C37LPPopupManager::loadSingleOption($data['optionID'])));
	die();
}

//load all options
add_action('wp_ajax_core37_lp_load_all_popup_options', 'core37_lp_load_all_popup_options');

function core37_lp_load_all_popup_options()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	$title = 'title';
	if (isset($data['title']))
		$title = $data['title'];


	echo rawurlencode(json_encode(C37LPPopupManager::getAllOptions($title)));
	die();
}



//save popup option
add_action('wp_ajax_core37_lp_save_widget_option', 'core37_lp_save_widget_option');

function core37_lp_save_widget_option()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);
	$optionID = C37LPWidgetManager::saveOption($data);

	echo $optionID;

	die();
}

//delete popup option
add_action('wp_ajax_core37_lp_delete_widget_option', 'core37_lp_delete_widget_option');

function core37_lp_delete_widget_option()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	C37LPWidgetManager::deleteOption($data['optionID']);

}

//load popup option
add_action('wp_ajax_core37_lp_load_single_widget_option', 'core37_lp_load_single_widget_option');

function core37_lp_load_single_widget_option()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);
	echo rawurlencode(json_encode(C37LPWidgetManager::loadSingleOption($data['optionID'])));
	die();
}

//load all options
add_action('wp_ajax_core37_lp_load_all_widget_options', 'core37_lp_load_all_widget_options');

function core37_lp_load_all_widget_options()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	$title = 'title';
	if (isset($data['title']))
		$title = $data['title'];


	echo rawurlencode(json_encode(C37LPWidgetManager::getAllOptions($title)));
	die();
}



//get all categories
add_action('wp_ajax_core37_lp_get_all_categories', 'core37_lp_get_all_categories');

function core37_lp_get_all_categories()
{
	$cats = get_categories(array(
		'orderby' => 'name',
		'order' => 'ASC'
	));


	$result = array();
	foreach($cats as $cat)
	{
		$result[] = array(
			'id' => $cat->cat_ID,
			'text' => $cat->name
		);
	}

	echo rawurlencode(json_encode($result));
	die();
}

//get all page created by c37 (to populate to popup content box)
add_action('wp_ajax_core37_lp_get_all_c37_pages', 'core37_lp_get_all_c37_pages');

function core37_lp_get_all_c37_pages()
{
	$pages = C37LPManager::getAllPages();

	$result = array();

	foreach($pages as $page)
	{
		$result[] = array(
			'id' => $page['id'],
			'text' => $page['title']
		);
	}

	echo rawurlencode(json_encode($result));
	die();
}

//get all posts

//get template string
add_action('wp_ajax_core37_lp_export_template', 'core37_lp_export_template');

function core37_lp_export_template()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);
	C37LPManager::exportToTemplateString($data['pageID']);
}

//import all local templates to current site
add_action('wp_ajax_core37_lp_load_local_templates', 'core37_lp_load_local_templates');

function core37_lp_load_local_templates()
{
	$importedTemplates = C37_LP_Template_Manager::importTemplatesFromLocalFiles();

	echo $importedTemplates . " templates imported!";
	die();
}

//get all templates (title and id), to display to the edit form
add_action('wp_ajax_core37_lp_list_templates', 'core37_lp_list_templates');

function core37_lp_list_templates()
{
	echo json_encode(C37_LP_Template_Manager::getAllTemplates());
	die();
}



/**
 * load a form based on form ID
 */

add_action('wp_ajax_core37_lp_load_template', 'core37_lp_load_template');

function core37_lp_load_template()
{

	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	echo json_encode(
		C37_LP_Template_Manager::loadSinglePageForEditing($data['templateID'])
	);

	die();
}

/**
 * Delete a form based on its ID
 *
 */

add_action('wp_ajax_core37_lp_delete_template', 'core37_lp_delete_template');


function core37_lp_delete_template()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);

	C37_LP_Template_Manager::deleteTemplate($data['templateID']);
	echo 'done';

	die();

}

add_action('wp_ajax_core37_lp_activate_license', 'core37_lp_activate_license');

function core37_lp_activate_license()
{
	$data = array();
	parse_str(file_get_contents('php://input'), $data);
	include_once 'crypt.php';

	$crypt = new C37_LP_Crypt();

	$result = wp_remote_post('http://code47.net/api/license/verify.php', array(
		'method' => 'POST',
		'timeout' => 45,
		'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array(),

		'body' => array('payload' =>$crypt->encrypt(http_build_query($data)) ) )
	);

	if (is_wp_error($result))
	{
		update_option('c37_form_license_activated', 'valid');
		echo json_encode(array(
			'result' => false,
			'message' => 'activation success.!',
			'error' => $result->get_error_message()
		));

		die();
	} else
	{

		$data = json_decode($result['body']);

		if ($data->result)
			update_option('c37_form_license_activated', 'valid');

		echo $result['body'];
	}
	die();

}

add_action('wp_ajax_core37_lp_check_activation', 'core37_lp_check_activation');

function core37_lp_check_activation()
{
	if (get_option('c37_form_license_activated') == 'valid')
		echo json_encode(array('result'=> true));
	else
		echo json_encode(array('result'=> false));

	die();
}
