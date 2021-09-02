<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$refresh = $_GET['refresh'];
$status  = $_GET['status'];
$owner   = $_GET['owner'];

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_account                      " ;
$sql .="   set status         = '".$status."'   " ;
$sql .="      ,d_status       = now()           " ;
$sql .="      ,owner          = '".$owner."'    " ;
$sql .=" where refresh_token  = '".$refresh."'  " ;

$result = $conn->query($sql);

$conn->close();
?>
