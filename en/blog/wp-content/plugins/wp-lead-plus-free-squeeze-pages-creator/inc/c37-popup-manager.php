<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/5/16
 * Time: 6:38 AM
 */

class C37LPPopupManager
{
	const C37_LP_POPUP_OPTION_POST_TYPE = "c37-popup-option";
	const C37_LP_POPUP_META_WHERE_TO_DISPLAY = 'c37_lp_popup_where_to_display';

	public static function registerPopupOptionType()
	{
		register_post_type(
			self::C37_LP_POPUP_OPTION_POST_TYPE,
			array(
				'labels' => array(
					'name' => __('C37 Popup Option', self::C37_LP_POPUP_OPTION_POST_TYPE),
					'singular_name' => __('C37 Popup Option', self::C37_LP_POPUP_OPTION_POST_TYPE)
				),
				'public' => false,
				'has_archive' => false,
				'show_ui' => false,

				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
			)

		);
	}

	public static function saveOption($content)
	{
		//insert post to dp
		$optionID = wp_insert_post(
			array(
				'ID' => $content['optionID'],
				'post_content' => $content['optionContent'],
				'post_type' => self::C37_LP_POPUP_OPTION_POST_TYPE,
				'post_name' => $content['optionName'],
				'post_title' => $content['optionName'],
				'post_status' => 'publish',
			)
		);

		update_post_meta($optionID, self::C37_LP_POPUP_META_WHERE_TO_DISPLAY, $content['whereToDisplay']);

		return $optionID;
	}


	//delete an option
	public static function deleteOption($optionID)
	{
		wp_delete_post($optionID);
		delete_post_meta($optionID, self::C37_LP_POPUP_META_WHERE_TO_DISPLAY);
	}

	public static function loadSingleOption($optionID)
	{
		$option = get_post( $optionID, ARRAY_A, 'raw');
//		return $option;
		return array(
			'content' => $option['post_content'],
			'title' => $option['post_title']
		);
	}

	public static function getAllOptions($title = 'title')
	{
		$data = array(
			'post_type' => self::C37_LP_POPUP_OPTION_POST_TYPE,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'posts_per_page' => -1,
		);

		$result = new WP_Query($data);

		$options = array();

		foreach($result->posts as $post)
		{
			$options[] = array(
				$title => $post->post_title, //use text instead of title
				'id' =>$post->ID,
			);
		}

		return $options;


	}

	/**load the popup HTML to print on the page, this is for shortcode or option created on the option page
	 * @param $pageID: page id
	 * @param $popupOption: the object that determine how the popup to show up on the page, created
	 * in popup manager page
	 * @param $trigger: by default, this is set to option, that means the popup will be shown depending on the
	 * options set when creating popup option. If it set to 'click', that means the popup is triggered by
	 * click on page element
	 * @return null
	 */
	public static function loadPageHTMLForPopup($pageID, $popupOption, $trigger = 'option')
	{
		//check if post exists
		if ( get_post($pageID) == null)
			return "";

		$pageContent = get_post( $pageID, ARRAY_A, 'raw');
		$pageSettingsString = get_post_meta( $pageID, C37LPManager::C37_LP_META_PAGE_SETTINGS, true);

		if ($pageSettingsString == "")
			return "";

		$pageSettings = json_decode($pageSettingsString);

		$pageContent = do_shortcode(rawurldecode($pageContent['post_content']));



		$style = '';

		switch($popupOption->positionOnPage)
		{
			case 'top_left':
				$style .= 'position: fixed; top: 0; left: 0';
				break;
			case 'top_right':
				$style .= 'position: fixed; top: 0; right: 0';
				break;
			case 'bottom_left':
				$style .= 'position: fixed; bottom: 0; left: 0';
				break;
			case 'bottom_right':
				$style .= 'position: fixed; bottom: 0; right: 0';
				break;
			case 'center':
				$style = 'margin: auto; text-align: center';
				break;
			default:
				$style = '';
				break;
		}

		$outerDivStyle = '';

		//check if the page has background image
		if ($pageSettings->backgroundImage != '')
		{
			$pageContent .= '<script>jQuery(function(){   jQuery("#'.$pageSettings->cssID.'").closest(".c37-lp-popup-outer").backstretch("'.$pageSettings->backgroundImage.'")  })</script>';
		} else if ($pageSettings->backgroundColor != '')
		{
			$outerDivStyle = 'style="background: '.$pageSettings->backgroundColor.';"';

		}

		$pageCustomCSS = C37LPManager::getPageCustomCSS($pageID);

		$pageContent .=  '<script>jQuery("head").append(\'' . '<style class="c37-popup-css">'.str_replace("'", '\x27', str_replace('"', '\x22',$pageCustomCSS)).'</style>' .'\')</script>';

		$pageContent .= C37LPManager::getElementsActions($pageID, $pageSettings->cssID);
		//generate a random ID so the popup.js can display the right popup, this is unique across all popups on a page
		$randomID = "c37-popup-". rand(1,10000);
		//add a close button to the popup
		$pageContent.= '<script> jQuery(function(){ jQuery("<div class=\'c37-lp-close-popup\'></div>").insertBefore(jQuery("#'.$pageSettings->cssID.' .c37-step > div").first()) }) </script>';

		//print the display object so the script in front/popup.js can display the popup
		if ($trigger == 'option')
		{
			$pageContent .= "<script> var howToShowUp = JSON.parse('".json_encode($popupOption->howToShowUp)."'); howToShowUp.popupID = '".$randomID."'; howToShowUp.afterClose = JSON.parse('".json_encode($popupOption->afterClose)."');   </script>";
		}
		else //if there the trigger is an action object,
		{
			$pageContent .= "<script>var c37PopupTrigger = c37PopupTrigger || {}; c37PopupTrigger['".$trigger->{'element-id'}."'] = '".$randomID."';</script>";
		}


		//include $popupOption->positionOnPage to outer class solely for positioning the close button
		$pageContent =
			'<div id="'.$randomID.'" class="c37-lp-popup-outer '.$popupOption->positionOnPage.'" '.$outerDivStyle.' ><div style="'.$style.'" class="c37-lp-popup-inner">'.$pageContent.'</div></div>';

		return $pageContent;
	}

	//load popup content, ready to display on any page
	public static function getPopupHTMLContent($optionID, $trigger = 'option')
	{
		$option = get_post($optionID);

		if (!is_object($option))
			return '';

		$popupOption = json_decode(rawurldecode($option->post_content));
		if (!is_object($popupOption))
			return '';

		return self::loadPageHTMLForPopup($popupOption->contentID, $popupOption, $trigger);
	}

	/**
	 * This function get the custom css content of the page (content) of the popup
	 * The content returned will be used on the landing page created by this plugin
	 * (@see c37-template.php)
	 * @param $optionID: Popup option ID
	 *
	 * @return string
	 */
	public static function getPageCSSByPopupID($optionID)
	{
		$option = get_post($optionID);

		if (!is_object($option))
			return '';

		$popupOption = json_decode(rawurldecode($option->post_content));
		if (!is_object($popupOption))
			return '';

		return C37LPManager::getPageCustomCSS($popupOption->contentID);

	}

}