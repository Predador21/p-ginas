<?php

include 'config.php';

$session = $_GET['session'];
$account = $_GET['account'];
$creator = $_GET['creator'];
$refresh = $_GET['refresh'];

$conn = new mysqli($host, $username, $password, $database);

$sql = "delete from tbl_account where account = '".$account."'" ;
$result = $conn->query($sql);

$sql = "insert into tbl_account (session , account , refresh_token , creator) values ( '".$session."' , '".$account."' , '".$refresh."' , '".$creator."' )" ;
$result = $conn->query($sql);

$sql  ="update tbl_account                                                    " ;
$sql .="   set count_creator = count_creator + 1                              " ;
$sql .=" where substr(account,1,position('@'in account)-1)  = '".$creator."'  " ;

$result = $conn->query($sql);


$conn->close();

?>
