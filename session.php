<?php

include 'config.php';

$session = $_GET['session'];
$account = $_GET['account'];
$creator = $_GET['creator'];
$url     = $_GET['url'];

$conn = new mysqli($host, $username, $password, $database);

$sql="delete from tbl_url where session = '".$session."' " ;
$result = $conn->query($sql);

$sql = "insert into tbl_url (session , account , creator , status , url) values ('".$session."' , '".$account."' , '".$creator."' , 1 , '".$url."' )" ;
$result = $conn->query($sql);

$sql = "update tbl_session set status = 2 where account = '".$account."' " ;
$result = $conn->query($sql);

$conn->close();

?>
