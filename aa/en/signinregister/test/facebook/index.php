<?php

require 'src/Facebook-fixed/autoload.php';
session_start();

$fb = new Facebook\Facebook([
  'app_id' => '731663666968594',
  'app_secret' => 'd72fd809c3d15380514316bc81080bb1',
  'default_graph_version' => 'v2.5',
  //'allowSignedRequest' => false 
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['user_friends','user_website','publish_pages'];
$loginUrl = $helper->getReRequestUrl('http://www.aventour.net/en/signinregister/test/facebook/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';  