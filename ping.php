<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$account = $_GET['account'] ;
$version = $_GET['version'] ;

$account = str_replace("_", ".", $account) ;

$account = $account ;

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_account                                                      " ;
$sql .="   set d_ping  = now()                                                  " ;
$sql .="     , version = '".$version."'                                         " ;
$sql .=" where substr(account,1,position('@'in account)-1)  = '".$account."'    " ;


$result = $conn->query($sql);

$conn->close();
?>
