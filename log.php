<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$session = $_GET['session'];
$log     = $_GET['log'];

$conn = new mysqli($host, $username, $password, $database);

$sql  = "insert into tbl_log ( session , dataHora , log ) values ( '".$session."' , now() , '".$log."' )";
$result = $conn->query($sql);

$conn->close();

?>
