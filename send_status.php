<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$account = $_GET['account'];
$status  = $_GET['status'];
$owner   = $_GET['owner'];
$bearer  = $_GET['bearer'];

if ( $status == '' )
{
 $status = 'PHP' ;
}

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_account                  " ;
$sql .="   set status     = '".$status."'   " ;
$sql .="      ,d_status   = now()           " ;
$sql .="      ,owner      = '".$owner."'    " ;
$sql .="      ,bearer     = '".$bearer."'   " ;
$sql .=" where account    = '".$account."'  " ;

$result = $conn->query($sql);

$conn->close();
?>
