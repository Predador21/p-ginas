<?php

include 'config.php';

$session = $_GET['session'];
$account = $_GET['account'];
$status  = $_GET['status'];
$url     = $_GET['url'];

$conn = new mysqli($host, $username, $password, $database);

$sql = "insert into tbl_url (session,account,status,url) values ('".$session."' , '".$account."' , '".$status."' , '".$url."' )" ;
$result = $conn->query($sql);

$sql = "update tbl_session set status = 2 where account =  '".$account."' " ;
$result = $conn->query($sql);

$conn->close();

?>
