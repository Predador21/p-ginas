<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$session='SESSION' ;
$account=bin2hex(random_bytes(5)) ;

$myObj = new stdClass();
$myObj->session = $session;
$myObj->account = $account;

$myJSON = json_encode($myObj);

echo $myJSON;

$conn->close();
?>
