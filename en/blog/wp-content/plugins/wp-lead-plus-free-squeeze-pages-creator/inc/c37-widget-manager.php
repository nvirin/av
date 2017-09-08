<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/5/16
 * Time: 6:38 AM
 */

class C37LPWidgetManager
{
	const C37_LP_WIDGET_OPTION_POST_TYPE = "c37-widget-option";
	const C37_LP_WIDGET_META_WHERE_TO_DISPLAY = 'c37_lp_widget_where_to_display';

	public static function registerPopupOptionType()
	{
		register_post_type(
			self::C37_LP_WIDGET_OPTION_POST_TYPE,
			array(
				'labels' => array(
					'name' => __('C37 Widget Option', self::C37_LP_WIDGET_OPTION_POST_TYPE),
					'singular_name' => __('C37 Widget Option', self::C37_LP_WIDGET_OPTION_POST_TYPE)
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
				'post_type' => self::C37_LP_WIDGET_OPTION_POST_TYPE,
				'post_name' => $content['optionName'],
				'post_title' => $content['optionName'],
				'post_status' => 'publish',
			)
		);

		update_post_meta($optionID, self::C37_LP_WIDGET_META_WHERE_TO_DISPLAY, $content['whereToDisplay']);

		return $optionID;
	}


	//delete an option
	public static function deleteOption($optionID)
	{
		wp_delete_post($optionID);
		delete_post_meta($optionID, self::C37_LP_WIDGET_META_WHERE_TO_DISPLAY);
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
			'post_type' => self::C37_LP_WIDGET_OPTION_POST_TYPE,
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
	 * in popup manager page
	 * options set when creating popup option. If it set to 'click', that means the popup is triggered by
	 * click on page element
	 * @return null
	 */
	public static function loadPageHTMLForWidget($pageID, $widgetOption)
	{
//		var_dump($widgetOption->alignment);
		//check if post exists
		if ( get_post($pageID) == null)
			return "";

		$pageContent = get_post( $pageID, ARRAY_A, 'raw');
		$pageSettingsString = get_post_meta( $pageID, C37LPManager::C37_LP_META_PAGE_SETTINGS, true);

		if ($pageSettingsString == "")
			return "";

		$pageSettings = json_decode($pageSettingsString);

		$pageContent = (rawurldecode($pageContent['post_content']));

		$pageContent.= C37LPManager::getElementsActions($pageID, $pageSettings->cssID);

		$pageCustomCSS = C37LPManager::getPageCustomCSS($pageID);

		$pageContent .=  '<script>jQuery("head").append(\'' . '<style class="c37-popup-css">'.str_replace("'", '\x27', str_replace('"', '\x22',$pageCustomCSS)).'</style>' .'\')</script>';


		$outerDivStyle = '';

		//check if the page has background image
		if ($pageSettings->backgroundImage != '')
		{
			$pageContent .= '<script>jQuery(function(){   jQuery("#'.$pageSettings->cssID.'").closest(".c37-lp-popup-outer").backstretch("'.$pageSettings->backgroundImage.'")  })</script>';
		} else if ($pageSettings->backgroundColor != '')
		{
			$outerDivStyle = 'style="background: '.$pageSettings->backgroundColor.';"';

		}

		//alignment for the widget based on alignment option
		$alignmentClass = '';
		if ($widgetOption->alignment == 'right')
		{
			$alignmentClass = 'child-align-right';
		} else if ($widgetOption->alignment == 'center')
		{
			$alignmentClass = 'child-align-center';
		} else
		{
			$alignmentClass = 'child-align-left';
		}

		//generate a random ID so the popup.js can display the right popup, this is unique across all popups on a page
		$randomID = "c37-widget-". rand(1,10000);



		//include $popupOption->positionOnPage to outer class solely for positioning the close button
		$pageContent =
			'<div  id="'.$randomID.'" class="c37-lp-widget-outer '.$alignmentClass.' " '.$outerDivStyle.' ><div class="c37-lp-widget-inner">'.$pageContent.'</div></div>';

		return do_shortcode($pageContent);
	}

	//load widget content, ready to display on any page
	public static function getWidgetHTMLContent($optionID)
	{
		$option = get_post($optionID);

		if (!is_object($option))
			return '';

		$widgetOption = json_decode(rawurldecode($option->post_content));
		if (!is_object($widgetOption))
			return '';

		return self::loadPageHTMLForWidget($widgetOption->contentID, $widgetOption);
	}

	//get page CSS by popup option
	public static function getPageCSSByPopupID($optionID)
	{
		$option = get_post($optionID);

		if (!is_object($option))
			return '';

		$widgetOption = json_decode(rawurldecode($option->post_content));
		if (!is_object($widgetOption))
			return '';

		return C37LPManager::getPageCustomCSS($widgetOption->contentID);

	}

}