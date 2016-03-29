<?php
session_start();
require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '449962168526522',
  'app_secret' => 'a5b013d2e69359c562c8ecb65409d870',
  'default_graph_version' => 'v2.5',
]);

if(isset($_SESSION['fb_access_token'])) {
	// unset($_SESSION['fb_access_token']);
	try {
		$response = $fb->get('/me/groups', $_SESSION['fb_access_token']);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

	// $response = $request->execute();
// $graphObject = $response->getGraphObject();
	var_dump($response);
} else {
	header('location:login.php');
}
