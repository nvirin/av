<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 9/3/16
 * Time: 1:01 PM
 */

/**
 * This file handle POST request for forms. There are three scenario
 * 1. Request send by ajax. The script will do:
 *  - validate the posted data
 *  - save the posted data if valid
 *  - perform tasks such as send email notification, send auto reply to subscribers
 *  - send response to caller and let the caller handle subsequent tasks (such as redirect to other URL)
 *
 * 2. Request by normal form submit (js disabled, has attachment)
 *  - validate the posted data
 *  - save the posted data if valid
 *  - perform tasks such as send email notification, send auto reply to subscribers, send data to another URL
 *  - if requested, redirect the subscribers to requested URL
 */


include_once 'c37-submit.php';
include_once 'lib/gump.class.php';

/**
 * validate input (again) and insert to db if validation OK
 */
include_once 'c37-form-subscribers-manager.php';


add_action('wp', 'core37_lp_process_post_request');
function core37_lp_process_post_request()
{

	//only process the data if it is sent by core37 form
	if (isset($_POST['form_type'])  && $_POST['form_type'] == 'core37-lp-form')
	{
		//send file date to save_form_submit
		core37_lp_save_form_submit($_FILES, $_POST);
	}
}


function core37_lp_save_form_submit($fileUpload, $data)
{
	//if there is no form id passed, return
	if (!isset($data['form_id']))
	{
		return;
	}

	if (isset($data['g-recaptcha-response']))
	{
		//check if recaptcha available
		$recaptchaSecret = get_option('c37_lp_recaptcha_secret_key');
		$capResponse = $data['g-recaptcha-response'];
		$serverURL = "https://www.google.com/recaptcha/api/siteverify";

		$captchaData = array(
			'secret' => $recaptchaSecret,
			'response' => $capResponse
		);

		$options = array(
			'http' => array(
				'header' => "Content-type: application/x-www-form-urlencoded\r\n",
				'method' => 'POST',
				'content' => http_build_query($captchaData)
			)
		);

		$context = stream_context_create($options);

		$result = json_decode(file_get_contents($serverURL, false, $context));

		if ($result->success != true)
		{
			echo json_encode(array(
				'error' => 1,
				'message' => 'Your DID NOT solve the captcha'
			));

			die();
		}
	}


	//validate input data
	$validationRules = json_decode(get_post_meta($data['form_id'],C37LPManager::C37_LP_META_VALIDATION, true));
	$gump = new C37LPFormGump();
	$gumpRules = array();



	$data= $gump->sanitize($data);

	foreach($validationRules as $item=>$rule)
	{
		$name = $rule->name;
		$ruleString = '';
		foreach($rule->rules as $r => $content)
		{
			$ruleString.=$content . "|";
		}

		$ruleString = rtrim($ruleString, "|");

		//set rule
		if($ruleString!='')
			$gumpRules[$name] = $ruleString;
	}

//	var_dump($gumpRules);
	$gump->validation_rules($gumpRules);

	$validatedData = $gump->run($data);


	//the core37submit purpose is to convey the error message in non-ajax form submit
	$submit = Core37LPFormSubmit::getInstance();
	$submit->setFormID($data['form_id']);


	if ($validatedData === false)
	{
		//if the form is submitted by ajax, print the error out and stop script execution
		if (isset($data['by_ajax']))
		{
			echo json_encode(array(
				"error" => 1,
				"message" => $gump->get_readable_errors(false)
			));

			die();
		}


		//else, add the error to Submit array and display on site
		$submit->addErrorMessages($gump->get_readable_errors(false));
		//reload the page with error messages
//		header('Location: '. $_SERVER['HTTP_REFERER']);
		return;
	}


	$filesPath = array();
	$uploadFieldName = "";



	$formSettingsString = get_post_meta($data['form_id'], C37LPManager::C37_LP_META_PAGE_SETTINGS, true);
	$formSettings = json_decode($formSettingsString);


	//handle file upload
	if (count($fileUpload) > 0)
	{
		//there are two cases here, if there is one file uploaded, the data would be like this:
		//array(1) {
		// ["attachment"]=> array(5) {
		//      ["name"]=> string(36) "2a6d1ad4e27183d072f586e44ff54db2.jpg"
		//      ["type"]=> string(10) "image/jpeg"
		//      ["tmp_name"]=> string(36) "/Applications/MAMP/tmp/php/phpfp9a1k"
		//      ["error"]=> int(0)
		//      ["size"]=> int(41946)
		//      }
		// }

		//if there are more than 1 files, the data would be like this
		//array(1) {
		// ["attachment"]=> array(5) {
		//      ["name"]=> array(2) { [0]=> string(36) "f1.jpg" [1]=> string(38) "f2.png" }
		//      ["type"]=> array(2) { [0]=> string(10) "image/jpeg" [1]=> string(9) "image/png" }
		//      ["tmp_name"]=> array(2) { [0]=> string(36) "/Applications/MAMP/tmp/php/phpT9ES3X" [1]=> string(36) "/Applications/MAMP/tmp/php/phpr1IMVm" }
		//      ["error"]=> array(2) { [0]=> int(0) [1]=> int(0) }
		//      ["size"]=> array(2) { [0]=> int(41946) [1]=> int(50057) }
		// }
		// }


		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}
		$uploadOverrides = array( 'test_form' => false );

		/**
		 * These two array store the path and error messages (if any when saving files to WP)
		 */
		$uploadError = array();


		$uploadFieldName = key($fileUpload);
		$uploadData = reset($fileUpload);

		//if single file upload
		if (!is_array($uploadData['name']))
		{
			$singleFile = array(
				'name' => $uploadData['name'],
				'type' => $uploadData['type'],
				'tmp_name' => $uploadData['tmp_name'],
				'error' => $uploadData['error'],
				'size' => $uploadData['size']

			);

			$movefile = wp_handle_upload( $singleFile , $uploadOverrides );


			if ( $movefile && ! isset( $movefile['error'] ) ) {
				$filesPath[] = $movefile['url'];
			} else {

				$uploadError[] = array(
					'name' => $uploadData['name'],
					'message' => $movefile['error']
				);

			}
		} else
		{
			//check if any error available
			for ($i = 0; $i < count($uploadData['error']); $i++)
			{
				if ($uploadData['error'][$i] != 0)
					$submit->addErrorMessages(array(
						$uploadFieldName => $uploadData['name'][$i] .': '. $uploadData['error'][$i]
					));
			}

			//if there are error while uploading, stop the script
			if (count($submit->getMessages()) > 0)
				return;

			//if file upload OK, proceed to moving to upload folder
			for ($i = 0; $i < count($uploadData['name']); $i++)
			{
				$singleFile = array(
					'name' => $uploadData['name'][$i],
					'type' => $uploadData['type'][$i],
					'tmp_name' => $uploadData['tmp_name'][$i],
					'error' => $uploadData['error'][$i],
					'size' => $uploadData['size'][$i]

				);


				//move file to upload folder using php built-in function
				$movefile = wp_handle_upload( $singleFile , $uploadOverrides );


				if ( $movefile && ! isset( $movefile['error'] ) ) {
					$filesPath[] = $movefile['url'];
				} else {
					$uploadError[$uploadData['name'][$i]] =  $movefile['error'];
				}
			}
		}

		//if file upload error, send the error report and return
		if (count($uploadError) > 0)
		{
			$submit->addErrorMessages($uploadError);
			return;
		}

	}

	//if everything is OK, continue to process
	global $wpdb;


	$sessionID = C37LPSubscribersManager::insertSingleSession($data['form_id'], $wpdb);

	//when post data is sent, other non-valuable-to-user data will be sent too
	//list of parameters will be omitted when saving to db
	$omitKeys = array('undefined', 'action', 'by_ajax', 'form_id', 'form_type', 'pott', 'g-recaptcha-response', 'acceptance');


	//this is the body of the message sent to admin
	$notificationMessage = '';

	foreach ( $data as $key => $value )
	{
		if (in_array($key, $omitKeys))
			continue;

		if (is_array($value))
			$value = json_encode($value);

		$notificationMessage .= $key . ' : ' . $value . "\r\n";

		C37LPSubscribersManager::insertSingleDetail($data['form_id'], $sessionID, $key, $value, $wpdb);
	}

	//if file upload exists, save URL to form data
	if(count($filesPath) > 0)
	{
		C37LPSubscribersManager::insertSingleDetail($data['form_id'], $sessionID, $uploadFieldName, json_encode($filesPath), $wpdb);
	}


	/**
	 * now parse the form setting and perform the tasks required
	 * 1. send notification (only available in pro version)
	 * 2. send auto reply (only available in pro version)
	 * 3. send data to another URL (only available in pro version)
	 *
	 */


	/**
	 * If form submit by ajax, return the result as a JSON string
	 * If form submit normally (js disabled or have file to upload, reload the URL with notification)
	 */


	if ($formSettings->afterSubmitMessage == null)
	{
		$formSettings->afterSubmitMessage = 'Your form was successfully submitted!';
	}

	/**
	 * Send notification to user if it is set to be true
	 */
	if ($formSettings->sendNotification)
	{
		$toEmail = get_option('c37_lp_receiving_email');
		if ($toEmail == false)
			$toEmail = get_option('admin_email');

		$subject = '['.get_bloginfo('name').']A visitor has submitted a form';

		$message = "Hello, \r\n"
			."A visitor has submitted a form on your site. Here are the details: \r\n"
			.$notificationMessage . "\r\n"
			. "Thanks for using core37 form builder!";


		wp_mail(
			$toEmail,
			$subject,
			$message,
			'',
			array()
		);








	}
	//check if the form is sent via ajax or normal post
	if (isset($data['by_ajax']))
	{
		echo json_encode(array(
			'url'=> $formSettings->afterSubmitURL,
			'message' => $formSettings->afterSubmitMessage,
			'error' => 0
		));

		die();

	} else
	{

		if ($formSettings->afterSubmitURL != '')
			header('Location: '. $formSettings->afterSubmitURL);
	}
}

