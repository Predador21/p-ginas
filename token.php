<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$session = $_GET['session'];

$conn = new mysqli($host, $username, $password, $database);

$sql="select id , token from tbl_url where status = 2 and id = (select max(id) from tbl_url where session = '".$session."') " ;
$result = $conn->query($sql);

$row    = $result->fetch_assoc();
$id     = $row["id"] ;
$token  = $row["token"] ;

$sql="update tbl_url set status = 3 where id = '".$id."' " ;
$result = $conn->query($sql);

$myObj = new stdClass();
$myObj->token = $token;

$myJSON = json_encode($myObj);

echo $myJSON;

$conn->close();
?>
