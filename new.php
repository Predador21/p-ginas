<?php

include 'config.php';

$account = $_GET['account'];
$creator = $_GET['creator'];
$rfresh  = $_GET['refresh'];

$conn = new mysqli($host, $username, $password, $database);

$sql = "delete from tbl_account where account = '".$account."'" ;
$result = $conn->query($sql);

$sql = "insert into tbl_account (account , refresh_token , creator) values ('".$account."' , '".$refresh."' , '".$creator."' )" ;
$result = $conn->query($sql);

$conn->close();

?>
