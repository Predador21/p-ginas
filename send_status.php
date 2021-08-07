<?php

include 'config.php';

$refresh = $_GET['refresh'];
$status  = $_GET['status'];
$owner   = $_GET['owner'];

$data_hora = date('d/m/Y H:i:s');

$conn = new mysqli($host, $username, $password, $database);

$sql  ="select status " ;
$sql .="      ,d_status_first " ;
$sql .="  from tbl_account " ;
$sql .=" where refresh_token = '".$refresh."' " ;

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$status_old=$row["status"] ;
$d_status_first=$row["d_status_first"] ;

if ($status_old != $status ) {
    $d_status_first=$data_hora ;
}

$sql  ="update tbl_account " ;
$sql .="   set status = '".$status."' " ;
$sql .="      ,d_status_first = '".$d_status_first."' " ;
$sql .="      ,d_status_last = '".$data_hora."' ";
$sql .="      ,owner = '".$owner."' ";
$sql .=" where refresh_token = '".$refresh."' " ;

$result = $conn->query($sql);

$conn->close();
?>
