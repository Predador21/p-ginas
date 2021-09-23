<?php

include 'config.php';

$account = $_GET['account'];
$refresh = $_GET['refresh'];

$conn = new mysqli($host, $username, $password, $database);

$sql = "delete from tbl_account where account = '".$account."'" ;
$result = $conn->query($sql);

$sql = "insert into tbl_account (account, status, refresh_token) values ('".$account."' , 'RUNNING' , '".$refresh."')" ;
$result = $conn->query($sql);

$conn->close();

?>
