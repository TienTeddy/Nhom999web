<?php
session_start();
require_once 'Facebook/autoload.php';
$fb = new Facebook\Facebook ([
  'app_id' => '457359878174835', 
  'app_secret' => 'f1aff67640c36141a73ed39fbeb31b2b',
  'default_graph_version' => 'v5.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
    
if (! isset($accessToken)) {
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl('http://localhost:81/Doanwed/Home.php', $permissions);
    header("Location: ".$loginUrl);  
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email');
  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo '<br />Faceook ID: ' . $user['id'];
echo '<br />Faceook Name: ' . $user['name'];
echo '<br />Faceook Emailđâsd: ' . $user['email'];

?>