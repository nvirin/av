<?php
	$pageID       = get_the_ID();
	$pageSettings = json_decode(get_post_meta($pageID, C37LPManager::C37_LP_META_PAGE_SETTINGS, true));

?>

<!DOCTYPE html>
<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
		<title><?php echo get_the_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- include the css rules here-->
		<link href="<?php echo str_replace('inc/', '',plugin_dir_url(__FILE__)). 'css/front-styles.css'; ?>" rel="stylesheet" />

		<style>
			<?php
				echo rawurldecode(get_post_meta($pageID, C37LPManager::C37_LP_META_CUSTOM_CSS, true));
            ?>

			<?php
				if ($pageSettings->backgroundColor != '#fffffa'){
				?>
			body {
				background-color: <?php echo $pageSettings->backgroundColor; ?>;
			}
				<?php }

			 ?>

			<?php echo rawurldecode(C37LPManager::getPopupCSSByElementActions($pageID)); ?>

		</style>
<!--	Tracking code	-->
		<?php
		if (isset($pageSettings->trackingCode))
		{
			echo rawurldecode($pageSettings->trackingCode);
		}
		?>

		<?php
		if (get_post_type() == 'core37_lp' || get_post_type() == 'core37_lp_template')
		{
			echo '<meta name="robots" content="noindex, nofollow" />';
		}

		 ?>

	</head>

	<body>
	<?php
		$post = get_post();

		echo do_shortcode(rawurldecode($post->post_content));

	?>

	<script>
		<?php echo 'var ajaxurl = "' . admin_url('admin-ajax.php') . '";'; ?>
	</script>

	<script src="<?php echo str_replace('inc/', '',plugin_dir_url(__FILE__)). 'js/frontend.min.js';  ?>"></script>
<!--	<script src="--><?php //echo str_replace('inc/', '',plugin_dir_url(__FILE__)). 'js/pro/popup-manager.min.js';  ?><!--"></script>-->



	<script>

		<?php if ($pageSettings->backgroundImage != '') { ?>
		jQuery.backstretch("<?php echo $pageSettings->backgroundImage; ?>");

		<?php } ?>

		<?php echo "var elementsActions = {};  elementsActions['".$pageSettings->cssID."'] = ". rawurldecode(get_post_meta($pageID, C37LPManager::C37_LP_META_ELEMENT_ACTIONS, true)); ?>


	</script>

<!--	Popup, if any -->
	<?php echo C37LPManager::getPopupByElementsActions($pageID); ?>

	</body>

</html>
