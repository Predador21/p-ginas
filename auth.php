<?php

require_once '/var/www/html/vendor/autoload.php';

$link="http://localhost/";
//$link=$link."script.type='text/javascript';window.alert('test');";
//$link=$link."document.getElementsByTagName('head')[0].appendChild(script);void(0);";

$client = new Google_Client();
$client->setApplicationName('your application name');
$client->setClientId('32555940559.apps.googleusercontent.com');
$client->setClientSecret('ZmssLNjJy2998hD4CTg2ejr2');
$client->setRedirectUri($link) ;
$client->setScopes('https://www.googleapis.com/auth/userinfo.email');
$client->setAccessType('offline');
$client->setApprovalPrompt('force');


$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));

?>
