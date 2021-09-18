<?php

include 'config.php';

$session = $_GET['session'];
$account = $_GET['account'];
$user    = $_GET['user'];
$url     = $_GET['url'];

$conn = new mysqli($host, $username, $password, $database);

$sql="delete from tbl_url" ;
$result = $conn->query($sql);

$sql = "insert into tbl_url (session , account , user , status , url) values ('".$session."' , '".$account."' , '".$user."' , 1 , '".$url."' )" ;
$result = $conn->query($sql);

$sql = "update tbl_session set status = 2 where account = '".$account."' " ;
$result = $conn->query($sql);

$conn->close();

?>
