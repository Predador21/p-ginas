<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$user = $_GET['user'];

$conn = new mysqli($host, $username, $password, $database);

$sql  ="select account                                         " ;
$sql .="  from tbl_account                                     " ;
$sql .=" where 1=1                                             " ;
$sql .="   and status = 'RUNNING'                              " ;
$sql .="   and version is not NULL                             " ;
$sql .="   and id < (select max(id) from tbl_account )         " ;
//$sql .="   and d_create <= DATE_SUB(now(), interval 5 MINUTE)  " ;
$sql .=" order by count_creator                                " ;
$sql .="        , d_status desc ;                              " ;

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$account=$row["account"] ;

if ( substr($account,0,strrpos($account,'@')) == $user) {
   $next=$account ;
}

$myObj = new stdClass();
$myObj->account = $next;

$myJSON = json_encode($myObj);

echo $myJSON;

$conn->close();
?>
