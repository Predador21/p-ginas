<?php

$user = "" ;
$send = "" ;
$target = "" ;

if ( isset( $_GET['user'] ) ) {

$user = $_GET['user'];
$send = $_GET['send'];
$target = $_GET['target'];

$servername = "localhost";
$dbname     = "fenix";
$username   = "admin";
$password   = "qwerty794613Q!";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "insert into tbl_ping ( user , send , target ) values ( '".$user."', '".$send."', '".$target."')";
$result = $conn->query($sql);

$conn->close();

}

?>
