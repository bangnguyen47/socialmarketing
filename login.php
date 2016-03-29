<?php
session_start();
require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '449962168526522',
  'app_secret' => 'a5b013d2e69359c562c8ecb65409d870',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_posts']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost:8080/socialmarketing/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) .'">Log in with Facebook!</a>';