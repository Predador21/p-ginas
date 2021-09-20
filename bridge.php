<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$user = $_GET['user'];

$conn = new mysqli($host, $username, $password, $database);

$sql  ="select account               " ;
$sql .="  from tbl_account           " ;
$sql .=" where 1=1                   " ;
$sql .="   and status = 'RUNNING'    " ;
$sql .=" order by count_creator ;    " ;

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$account=$row["account"] ;

if ( $account == $user.'@gmail.com' ) {
   $next=$account ;
}

$myObj = new stdClass();
$myObj->account = $next;

$myJSON = json_encode($myObj);

echo $myJSON;

$conn->close();
?>
