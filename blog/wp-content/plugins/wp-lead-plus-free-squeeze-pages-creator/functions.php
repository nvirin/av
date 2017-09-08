<?php
define('c37LpDevMode',false);
define('c37LpNangCap',false);

include_once 'inc/c37-page-manager.php';
include_once 'inc/ajax.php';
include_once 'inc/shortcode.php';
include_once 'inc/c37-lp-template-manager.php';
include_once 'inc/c37-popup-manager.php';
include_once 'inc/c37-widget-manager.php';
include_once 'inc/display-manager.php';


add_filter('widget_text', 'do_shortcode');

add_action('init', 'core37_lp_create_post_type');

function core37_lp_create_post_type()
{
	C37LPManager::registerPostType();
	C37LPPopupManager::registerPopupOptionType();
	C37LPManager::registerTemplatePostType();
}

add_filter('template_include', 'c37_use_custom_template');

function c37_use_custom_template($page_template)
{
	//if the page is created by wp lead plus x, it will have this meta key
	$isC37LP = get_post_meta(get_the_ID(), C37LPManager::C37_LP_META_PAGE_SETTINGS);

	if ($isC37LP != false)
	{
		return plugin_dir_path(__FILE__) .'inc/c37-template.php';
	}
//	die();
	return $page_template;

}

define('C37_LP_FORM_MENU_SLUG', 'core37-lp-wp-lead-plus-x');
add_action('admin_menu', 'core37_lp_form_add_menu');

function core37_lp_form_add_menu()
{
	add_menu_page('WP Lead Plus X', 'WP Lead Plus X', 'manage_options', C37_LP_FORM_MENU_SLUG, 'core37_lp_form_ui_main');
	add_submenu_page(C37_LP_FORM_MENU_SLUG, 'Make Pages', 'Make Pages', 'manage_options', C37_LP_FORM_MENU_SLUG . '-make', 'core37_lp_form_ui_make_form');
	if (c37LpNangCap)
	{
		add_submenu_page(C37_LP_FORM_MENU_SLUG, 'Popups', 'Popups', 'manage_options', C37_LP_FORM_MENU_SLUG . '-popup', 'core37_lp_ui_popup_manager');
		add_submenu_page(C37_LP_FORM_MENU_SLUG, 'Widgets', 'Widgets', 'manage_options', C37_LP_FORM_MENU_SLUG . '-widget', 'core37_lp_ui_widget_manager');
	}

}

function core37_lp_form_enqueue_editor_styles()
{
	wp_enqueue_style('editor-styles', plugins_url('css/editor-styles.css', __FILE__));
}

function core37_lp_enqueue_popup_manager_styles()
{
	wp_enqueue_style('popup-manager-styles', plugins_url('css/back/popup-manager.css', __FILE__));
}

function core37_lp_enqueue_popup_manager_scripts()
{
	if (c37LpDevMode)
	{
		wp_enqueue_script('popup-manager-script1', plugins_url('js/back/messages.js', __FILE__));
		wp_enqueue_script('popup-manager-script2', plugins_url('js/back/toastr.min.js', __FILE__));
		wp_enqueue_script('popup-manager-script3', plugins_url('js/back/sweetalert.min.js', __FILE__));
		wp_enqueue_script('popup-manager-script5', plugins_url('js/back/global.js', __FILE__), array('jquery', 'underscore', 'backbone'));
		wp_enqueue_script('popup-manager-script5s', plugins_url('js/back/common.js', __FILE__));
		wp_enqueue_script('popup-manager-script6', plugins_url('js/back/popup-manager.js', __FILE__), array('jquery', 'underscore', 'backbone'));


	} else {
		wp_enqueue_script('popup-manager-script', plugins_url('js/pro/popup-manager.min.js', __FILE__), array('jquery', 'underscore', 'backbone'));
	}

}

function core37_lp_enqueue_widget_manager_styles()
{
	wp_enqueue_style('widget-manager-styles', plugins_url('css/back/widget-manager.css', __FILE__));
}

function core37_lp_enqueue_widget_manager_scripts()
{
	if (c37LpDevMode)
	{
		wp_enqueue_script('messages-script', plugins_url('js/back/messages.js', __FILE__), array('jquery', 'underscore'));
		wp_enqueue_script('toastr-script', plugins_url('js/back/toastr.min.js', __FILE__));
		wp_enqueue_script('swal-script', plugins_url('js/back/sweetalert.min.js', __FILE__));
		wp_enqueue_script('widget-global', plugins_url('js/back/global.js', __FILE__), array('jquery', 'underscore', 'backbone'));
		wp_enqueue_script('popup-manager-script5s', plugins_url('js/back/common.js', __FILE__));
		wp_enqueue_script('widget-manager-script', plugins_url('js/back/widget-manager.js', __FILE__), array('jquery', 'underscore', 'backbone'));
	} else
	{
		wp_enqueue_script('widget-manager-script', plugins_url('js/pro/widget-manager.min.js', __FILE__), array('jquery', 'underscore', 'backbone'));
	}

}




function core37_lp_form_enqueue_settings_page_styles()
{
	wp_enqueue_style('settings-page-styles', plugins_url('css/back/settings.css', __FILE__));
}
function core37_lp_form_enqueue_settings_page_script()
{

	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('jquery-effects-slide');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('underscore');
	wp_enqueue_script('backbone');

	if (c37LpDevMode)
	{
		wp_enqueue_script('messages-script', plugins_url('js/back/messages.js', __FILE__));
		wp_enqueue_script('toastr-script', plugins_url('js/back/toastr.min.js', __FILE__));
		wp_enqueue_script('global', plugins_url('js/back/global.js', __FILE__), array('backbone'));
		wp_enqueue_script('settings-page-script', plugins_url('js/back/settings.js', __FILE__));
	} else {
		wp_enqueue_script('settings-page-script', plugins_url('js/settings.min.js', __FILE__), array('jquery', 'backbone'));
	}

}




function core37_lp_form_enqueue_editor_scripts()
{

	wp_enqueue_script('jquery');
//	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');

	wp_enqueue_script('underscore');
	wp_enqueue_script('backbone');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('jquery-effects-slide');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-resizable');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-autocomplete');
	wp_enqueue_media();

	wp_enqueue_script('cke-script', plugins_url('js/lib/cke/ckeditor.js', __FILE__));
	wp_enqueue_script('cke-config', plugins_url('js/lib/cke/config.js', __FILE__));

	//in production mode
	if (c37LpDevMode)
	{
		//	//in dev mode
		wp_enqueue_script('editor-script1000', plugins_url('js/back/toastr.min.js', __FILE__));
		wp_enqueue_script('editor-script11231', plugins_url('js/lib/star-rating/jquery.barrating.js', __FILE__));
		wp_enqueue_script('editor-script1', plugins_url('js/back/messages.js', __FILE__));
		wp_enqueue_script('editor-script2', plugins_url('js/back/sweetalert.min.js', __FILE__));
		wp_enqueue_script('editor-script3212', plugins_url('js/back/editor-global.js', __FILE__), array('jquery', 'backbone'));
		wp_enqueue_script('editor-script3', plugins_url('js/back/global.js', __FILE__), array('jquery', 'backbone'));
		wp_enqueue_script('editor-script4s', plugins_url('js/back/validation.js', __FILE__));
		wp_enqueue_script('editor-script4', plugins_url('js/back/common.js', __FILE__));
		wp_enqueue_script('editor-script5', plugins_url('js/back/edit-forms.js', __FILE__));
		wp_enqueue_script('editor-script26', plugins_url('js/back/elements-views.js', __FILE__));
		wp_enqueue_script('editor-script6', plugins_url('js/back/elements-edit-views.js', __FILE__));
		wp_enqueue_script('editor-script7ds', plugins_url('js/back/editor.js', __FILE__));
		wp_enqueue_script('editor-script7s', plugins_url('js/back/edit-menus.js', __FILE__));
		wp_enqueue_script('editor-script7', plugins_url('js/back/save-form.js', __FILE__));
	} else
	{
		wp_enqueue_script('editor-script', plugins_url('js/backend.min.js', __FILE__), array('jquery', 'backbone'));
	}


}

add_action('wp_enqueue_scripts', 'core37_lp_form_load_frontend_scripts');

function core37_lp_form_load_frontend_scripts()
{
	wp_enqueue_style('c37-lpx-front-styles', plugins_url('css/front-styles.css', __FILE__));

	if (c37LpDevMode)
	{
		//dev mode
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-datepicker');

		wp_enqueue_script('front-script1', plugins_url('js/back/toastr.min.js', __FILE__));
		wp_enqueue_script('front-script2', plugins_url('js/front/global.js', __FILE__));
		wp_enqueue_script('front-script2221', plugins_url('js/lib/jquery.backstretch.min.js', __FILE__));
		wp_enqueue_script('front-script3', plugins_url('js/front/validator-parsley.js', __FILE__));
		wp_enqueue_script('front-script134', plugins_url('js/front/validate.js', __FILE__));
		wp_enqueue_script('front-script1231', plugins_url('js/front/actions.js', __FILE__));
		wp_enqueue_script('front-script12ss121', plugins_url('js/front/popup.js', __FILE__));
	} else
	{
		//production mode
		wp_enqueue_script('c37-lpx-front-script', plugins_url('js/frontend.min.js', __FILE__), array('jquery',  'jquery-ui-core','jquery-ui-datepicker', 'underscore', 'backbone' ));
	}

}

add_action('admin_enqueue_scripts', 'core37_lp_form_load_backend_scripts');

function core37_lp_form_load_backend_scripts()
{
	$currentScreen = get_current_screen();

	if (stripos($currentScreen->base, 'core37-lp-wp-lead-plus-x-make') !== false)
	{
		core37_lp_form_enqueue_editor_styles();
		core37_lp_form_enqueue_editor_scripts();
	} else if (stripos($currentScreen->base, 'toplevel_page_core37-lp-wp-lead-plus-x') !== false)
	{
		core37_lp_form_enqueue_settings_page_styles();
		core37_lp_form_enqueue_settings_page_script();
	} else if(stripos($currentScreen->base, 'core37-lp-wp-lead-plus-x-popup') !== false)
	{
		core37_lp_enqueue_popup_manager_styles();
		core37_lp_enqueue_popup_manager_scripts();
	}  else if(stripos($currentScreen->base, 'core37-lp-wp-lead-plus-x-widget') !== false)
	{
		core37_lp_enqueue_widget_manager_styles();
		core37_lp_enqueue_widget_manager_scripts();
	}

}

/*
 * function load the main page of plugin
 */
function core37_lp_form_ui_main()
{
	include_once(plugin_dir_path(__FILE__) .'pages/main-page.php');
}

function core37_lp_form_ui_make_form()
{
	include_once(plugin_dir_path(__FILE__) .'pages/make-form.php');

}

function core37_lp_ui_popup_manager()
{
	include_once(plugin_dir_path(__FILE__) .'pages/popup-manager.php');
}

function core37_lp_ui_widget_manager()
{
	include_once(plugin_dir_path(__FILE__) .'pages/widget-manager.php');
}



/**
 * This filter is used to display popup on posts/pages only. To display the popup on homepage
 * There is a different filter (below)
 */
add_filter('the_content', array('C37_Display_Manager','display_popup_on_post'));

//filter to display popup on front page
add_filter('wp_footer', array('C37_Display_Manager','display_popup_front_page'));


add_filter('the_content', array('C37_Display_Manager','display_widget_on_post'));