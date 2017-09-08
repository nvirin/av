<?php

/*	FACEBOOK LOGIN BASIC - PHP SDK V4.0

 *	file 			- index.php

 * 	Developer 		- Krishna Teja G S

 *	Website			- http://packetcode.com/apps/fblogin-basic/

 *	Date 			- 27th Sept 2014

 *	license			- GNU General Public License version 2 or later

*/



/* INCLUSION OF LIBRARY FILEs*/

	require_once( 'lib/Facebook/FacebookSession.php');

	require_once( 'lib/Facebook/FacebookRequest.php' );

	require_once( 'lib/Facebook/FacebookResponse.php' );

	require_once( 'lib/Facebook/FacebookSDKException.php' );

	require_once( 'lib/Facebook/FacebookRequestException.php' );

	require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');

	require_once( 'lib/Facebook/FacebookAuthorizationException.php' );

	require_once( 'lib/Facebook/GraphObject.php' );

	require_once( 'lib/Facebook/GraphUser.php' );

	require_once( 'lib/Facebook/GraphSessionInfo.php' );

	require_once( 'lib/Facebook/Entities/AccessToken.php');

	require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );

	require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');

	require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');



/* USE NAMESPACES */

	

	use Facebook\FacebookSession;

	use Facebook\FacebookRedirectLoginHelper;

	use Facebook\FacebookRequest;

	use Facebook\FacebookResponse;

	use Facebook\FacebookSDKException;

	use Facebook\FacebookRequestException;

	use Facebook\FacebookAuthorizationException;

	use Facebook\GraphObject;

	use Facebook\GraphUser;

	use Facebook\GraphSessionInfo;

	use Facebook\FacebookHttpable;

	use Facebook\FacebookCurlHttpClient;

	use Facebook\FacebookCurl;



/*PROCESS*/

	

	//1.Stat Session

	 session_start();

	//2.Use app id,secret and redirect url

	 $app_id = '731663666968594';

	 $app_secret = 'd72fd809c3d15380514316bc81080bb1';

	 $redirect_url='http://www.aventour.io/signinregister/facebook.php';  

// 	 $fb = new Facebook\Facebook([
//   'app_id' => '{731663666968594}',
//   'app_secret' => '{d72fd809c3d15380514316bc81080bb1}',
//   'default_graph_version' => 'v2.5',
// ]); 
 
	 

	 //3.Initialize application, create helper object and get fb sess

	 FacebookSession::setDefaultApplication($app_id,$app_secret);

	 $helper = new FacebookRedirectLoginHelper($redirect_url);

	 if(isset($_SESSION)&&(isset($_SESSION['fb_token']))){

	 	 $sess= new FacebookSession($_SESSION['fb_token']);
	 }else{
  $sess = $helper->getSessionFromRedirect();

	 }

	 

	



	//4. if fb sess exists echo name 

	 	if(isset($sess)){



	 		try {   
	 			 $_SESSION['fb_token']=$sess->getToken();

	 		//create request object,execute and capture response

		$request = new FacebookRequest($sess, 'GET', '/me');

		// from response get graph object

		$response = $request->execute();

		$graph = $response->getGraphObject(GraphUser::className());

		// use graph object methods to get user details
		//var_dump($request);

		$name= $graph->getName();
		$id= $graph->getId();
		$image='https:/graph.facebook.com'.$id.'/picture?width=300';
		$email=$graph->getProperty('email');
		/// database!!!! id+ mail+...
		var_dump($email);

		echo "hi $name $email $id";
		echo "<img src='$image'/>";
	 			
	 		} catch (Exception $e) {
	 			$_SESSION=null;
	 			session_destroy();
	 			header('Location: facebook.php');

	 			
	 		}
	 		

	}else{

		//else echo login

		echo '<a href='.$helper->getReRequestUrl(['email']).'>Login with facebook</a>';

	}

	

	?>
