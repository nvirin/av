<?php

class C37LPManager
{
	const C37_LP_POST_TYPE = 'core37_lp';
	const C37_LP_TEMPLATE_POST_TYPE = 'core37_lp_template';
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
					'name' => __('WP Lead Plus X Landing Pages'),
					'singular_name' => __('WP Lead Plus X Landing Page')
				),
				'public' => true,
				'rewrite' => false,
				'show_ui' => false,
				'supports'       => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
			)

		);
	}

	//register a post type to save template
	public static function registerTemplatePostType()
	{
		register_post_type(
			self::C37_LP_TEMPLATE_POST_TYPE,
			array(
				'labels' => array(
					'name' => __('WP Lead Plus X Template', self::C37_LP_TEMPLATE_POST_TYPE),
					'singular_name' => __('WP Lead Plus X Template', self::C37_LP_TEMPLATE_POST_TYPE)
				),
				'public' => true,
				'rewrite' => false,
				'show_ui' => false,
				'supports'       => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
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

	public static function loadPageHTML($pageID)
	{
		//check if post exists
		if ( get_post($pageID) == null)
			return "";

		$pageContent = get_post( $pageID, ARRAY_A, 'raw');
		$pageSettingsString = get_post_meta( $pageID, self::C37_LP_META_PAGE_SETTINGS, true);

		if ($pageSettingsString == "")
			return "";

		$pageSettings = json_decode($pageSettingsString);

		//check the elements action here, if there are popups to be open, load them all with page content
//		var_dump($pageSettings->elementsActions);

		$pageContent = rawurldecode($pageContent['post_content']);

		//check if the page has background image
		if ($pageSettings->backgroundImage != '')
		{
			$pageContent .= '<script>jQuery(function(){   jQuery("#'.$pageSettings->cssID.'").backstretch("'.$pageSettings->backgroundImage.'")  })</script>';
		}
		return $pageContent;
	}

	public static function escapeJS($string)
	{
		return str_replace("'", "\x27", $string);
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

		$page = get_post( $pageID, ARRAY_A, 'raw');

		return array(
			"pageData" => $page,
			"elementsActions" => get_post_meta( $pageID, self::C37_LP_META_ELEMENT_ACTIONS),
			"pageSettings" => get_post_meta( $pageID, self::C37_LP_META_PAGE_SETTINGS),
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

		$pages = array();

		foreach($result->posts as $post)
		{
			if (get_post_type($post->ID) == 'page')
			{
				$url = get_page_link($post->ID);
			} else {
				$url = get_permalink($post->ID);
			}

			$pages[] = array(
				'title' => $post->post_title,
				'id' =>$post->ID,
				'url' => $url

			);
		}

		return $pages;
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
		update_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS, $content['formCSSCode']);
		update_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS_OBJECT, $content['pageCSSObject']);

		return json_encode(array(
			'pageID' => $pageID,
			'pageURL' => get_permalink($pageID)
		));
	}

	public static function deletePage($pageID)
	{
		wp_delete_post($pageID, true);
		delete_post_meta($pageID, self::C37_LP_META_PAGE_SETTINGS);
		delete_post_meta($pageID, self::C37_LP_META_ELEMENT_ACTIONS);
		delete_post_meta($pageID, self::C37_LP_META_VALIDATION);
		delete_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS);
		delete_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS_OBJECT);
	}

	public static function getPageCustomCSS($pageID)
	{
		return rawurldecode(get_post_meta($pageID, self::C37_LP_META_CUSTOM_CSS, true));
	}

	public static function getElementsActions($pageID, $pageCSSID)
	{
		if ( get_post_meta($pageID, self::C37_LP_META_ELEMENT_ACTIONS, true) == "")
			return "";
		return '<script class="hidden">var elementsActions = elementsActions || {}; elementsActions["' . $pageCSSID . '"] = ' . rawurldecode(get_post_meta($pageID, self::C37_LP_META_ELEMENT_ACTIONS, true)) . '</script>';
	}

	public static function getFormValidationRules($formID)
	{
		return '<script class="hidden">var formsValidation = formsValidation || {}; formsValidation['.$formID.'] = '.rawurldecode(get_post_meta($formID, self::C37_LP_META_VALIDATION, true)) . '</script>';
	}

	/**
	| Function to print importable string of a particular page to console.
	 * @param $pageID, page ID
	*/

	public static function exportToTemplateString($pageID)
	{
			$pageData = get_post( $pageID, OBJECT, 'raw');

			$page = array(
				"pageContent" => $pageData->post_content,
				"pageTitle"  => $pageData->post_title,
				"elementsActions" => get_post_meta( $pageID, self::C37_LP_META_ELEMENT_ACTIONS, true),
				"pageSettings" => get_post_meta( $pageID, self::C37_LP_META_PAGE_SETTINGS, true),
				"pageCSSObject" => get_post_meta( $pageID, self::C37_LP_META_CUSTOM_CSS_OBJECT, true),
				"pageCSSCode" => get_post_meta( $pageID, self::C37_LP_META_CUSTOM_CSS, true)
			);

			//write the template to file
			$fileName = str_replace(' ', '_', strtolower($pageData->post_title)) . '.txt';
			file_put_contents(plugin_dir_path(__FILE__) . "templates/" .$fileName, rawurlencode(json_encode($page)));
	}

	public static function getPopupByElementsActions($pageID)
	{
		$elementsAction = json_decode(get_post_meta($pageID, self::C37_LP_META_ELEMENT_ACTIONS, true));
		$popupString = '';
		foreach($elementsAction as $a)
		{
			if ($a->action == 'open-popup')
			{

				//passing the action object
				$popupString .= C37LPPopupManager::getPopupHTMLContent($a->{'popup-id'}, $a);
			}
		}

		return $popupString;
	}

	//get css of the popups to print out to the template file
	public static function getPopupCSSByElementActions($pageID)
	{
		$elementsAction = json_decode(get_post_meta($pageID, self::C37_LP_META_ELEMENT_ACTIONS, true));
		$customCSSString = '';
		foreach($elementsAction as $a)
		{
			if ($a->action == 'open-popup')
			{
//				var_dump($a);
				//passing the action object
				$customCSSString .= C37LPPopupManager::getPageCSSByPopupID($a->{'popup-id'});
			}
		}

		return $customCSSString;
	}


}
