<?php

include_once 'c37-submit.php';
class C37LPManager
{
	const C37_LP_POST_TYPE = 'core37_lp';
	const C37_LP_PAGE_TYPE_META_KEY = 'c37_page_type';//this is the meta key used in update_post_meta, the plugin will base on this key to retrieve list of pages to edit
	const C37_LP_META_ELEMENT_ACTIONS = 'elements_actions';
	const C37_LP_META_PAGE_SETTINGS = 'c37_lp_form_settings';
	const C37_LP_META_VALIDATION = 'c37_lp_form_validation';
	const C37_LP_META_CUSTOM_CSS = 'c37_lp_form_css_code';//this contains pure code, use in front
	const C37_LP_META_CUSTOM_CSS_OBJECT = 'c37_lp_form_css_object';//this meta stores a JS object, use to edit later in editor


	public static function registerPostType()
	{
		register_post_type(
			self::C37_LP_POST_TYPE,
			array(
				'labels' => array(
					'name' => __('WP Lead Plus X', 'core37-lp'),
					'singular_name' => __('WP Lead Plus X', 'core37-lp')
				),
				'public' => true,
				'has_archive' => true,
				'show_ui' => false,

				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
			)

		);
	}

	/**
	 * Load a form to display to end user, mainly use in shortcode
	 *
*@param $pageID
	 *
	 * @return string
	 */

	public static function loadPageHTML( $pageID)
	{
		//check if post exists
		if ( get_post($pageID) == null)
			return "";

		$pageContent = get_post( $pageID, ARRAY_A, 'raw');
		$formSettingsString = get_post_meta( $pageID, self::C37_LP_META_PAGE_SETTINGS, true);

		if ($formSettingsString == "")
			return "";

		$pageSettings = json_decode($formSettingsString);

		$pageContent = rawurldecode($pageContent['post_content']);
		//check if the page has background image
		if ($pageSettings->backgroundImage != '')
		{
			$pageContent .= '<script>jQuery(function(){   jQuery("#'.$pageSettings->cssID.'").backstretch("'.$pageSettings->backgroundImage.'")  })</script>';
		}
		return $pageContent;
	}

	/**
	 * Load single form for editing, this one is different from the @link loadSingleForm
	 *
*@param $pageID
	 *
	 * @return array
	 */
	public static function loadSinglePageForEditing( $pageID)
	{

		$form = get_post( $pageID, ARRAY_A, 'raw');

		return array(
			"pageData" => $form,
			"elementsActions" => get_post_meta( $pageID, self::C37_LP_META_ELEMENT_ACTIONS),
			"pageSettings" => get_post_meta( $pageID, self::C37_LP_META_PAGE_SETTINGS),
//			"formValidation" => get_post_meta( $pageID, self::c37_lp_FORM_META_VALIDATION),
			"pageCSSObject" => get_post_meta( $pageID, self::C37_LP_META_CUSTOM_CSS_OBJECT),
			"pageCSSCode" => get_post_meta( $pageID, self::C37_LP_META_CUSTOM_CSS)
		);

	}

	public static function getAllPages()
	{
		$data = array(
			'post_type' => array('page', self::C37_LP_POST_TYPE),
			'meta_key' => self::C37_LP_META_PAGE_SETTINGS,
			'meta_query' =>
			array(
				array(
					'key' => C37LPManager::C37_LP_META_PAGE_SETTINGS,
					'compare' => 'EXISTS'
				)
			),
			'orderby'          => 'date',
			'order'            => 'DESC',
			'posts_per_page' => -1,
		);

		$result = new WP_Query($data);

		$forms = array();

		foreach($result->posts as $post)
		{
			$url = $post->guid;

			if (get_post_type($post->ID) == 'page')
			{
				$url = get_page_link($post->ID);
			}

			$forms[] = array(
				'title' => $post->post_title,
				'id' =>$post->ID,
				'url' => $url

			);
		}




		return $forms;
	}

	/**
	 * Save form when user click on save form button
	 * @param $content
	 *
	 * @return mixed
	 */
	public static function savePage($content)
	{

		//the variable isPage decide whether to store the post as a page or not,
		$postType = isset($content['isPage']) && $content['isPage'] == 'true' ? 'page' : C37LPManager::C37_LP_POST_TYPE;


		//insert post to dp
		$pageID = wp_insert_post(
			array(
				'ID' => $content['pageID'],
				'post_content' => $content['pageContent'],
				'post_type' => $postType,
				'post_name' => $content['pageTitle'],
				'post_title' => $content['pageTitle'],
				'post_status' => 'publish',
			)
		);

		update_post_meta($pageID, self::C37_LP_META_ELEMENT_ACTIONS, $content['elementsActions']);
		update_post_meta($pageID, self::C37_LP_META_PAGE_SETTINGS, $content['pageSettings']);
//		update_post_meta($formID, self::c37_lp_FORM_META_VALIDATION, $content['formValidation']);
		update_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS, $content['formCSSCode']);
		update_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS_OBJECT, $content['pageCSSObject']);

		//save a post meta, this meta key is used to get all the post later for editing
//		update_post_meta($pageID, self::C37_LP_PAGE_TYPE_META_KEY, self::C37_LP_POST_TYPE);


		return json_encode(array(
			'pageID' => $pageID,
			'pageURL' => get_permalink($pageID)
		));
	}

	public static function deletePage($formID)
	{
		wp_delete_post($formID, true);
		delete_post_meta($formID, self::C37_LP_META_PAGE_SETTINGS);
		delete_post_meta($formID, self::C37_LP_META_ELEMENT_ACTIONS);
		delete_post_meta($formID, self::C37_LP_META_VALIDATION);
		delete_post_meta($formID, self::C37_LP_META_CUSTOM_CSS);
		delete_post_meta($formID, self::C37_LP_META_CUSTOM_CSS_OBJECT);
	}

	public static function getFormCustomCSS($formID)
	{
		return rawurldecode(get_post_meta($formID, self::C37_LP_META_CUSTOM_CSS, true));
	}

	public static function getElementsActions($formID)
	{
		if ( get_post_meta($formID, self::C37_LP_META_ELEMENT_ACTIONS, true) == "")
			return "";
		return '<script class="hidden">var elementsActions = elementsActions || {}; elementsActions['.$formID.'] = '.rawurldecode(get_post_meta($formID, self::C37_LP_META_ELEMENT_ACTIONS, true)) . '</script>';
	}

	public static function getFormValidationRules($formID)
	{
		return '<script class="hidden">var formsValidation = formsValidation || {}; formsValidation['.$formID.'] = '.rawurldecode(get_post_meta($formID, self::C37_LP_META_VALIDATION, true)) . '</script>';
	}
}