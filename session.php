<?php

include 'config.php';

$session = $_GET['session'];
$user    = $_GET['user'];
$url     = $_GET['url'];

$conn = new mysqli($host, $username, $password, $database);

$sql = "insert into tbl_url (session , user , status , url) values ('".$session."' , '".$user."' , 1 , '".$url."' )" ;
$result = $conn->query($sql);

$sql = "update tbl_session set status = 2 where account =  '".$account."' " ;
$result = $conn->query($sql);

$conn->close();

?>
