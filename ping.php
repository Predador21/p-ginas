<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$account = $_GET['account'] ;
$version = $_GET['version'] ;

$account = str_replace("_", ".", $account) ;

$account = $account.'@gmail.com' ;

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_account                 " ;
$sql .="   set d_ping  = now()             " ;
$sql .="     , version = '".$version."'    " ;
$sql .=" where account = '".$account."'    " ;

$result = $conn->query($sql);

$conn->close();
?>
