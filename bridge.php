<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$user = $_GET['user'];

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_account                                            " ;
$sql .="   set d_creator = now()                                      " ;
$sql .="     , creator = '".$user."'                                  " ;
$sql .="     , account = @account := account                          " ;
$sql .=" where id = (select tab.id                                    " ;
$sql .="               from (select @rownum := @rownum + 1 as rownum  " ;
$sql .="                          , id                                " ;
$sql .="                       from (select @rownum := 0) r           " ;
$sql .="                          , tbl_account                       " ;
$sql .="                      where 1=1                               " ;
$sql .="                        and status = 'RUNNING'                " ;
$sql .="              order by d_creator ) as tab                     " ;
$sql .="              where tab.rownum = 1 ) ;                        " ;

$result = $conn->query($sql);

$sql="select @account account ;" ;

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$account=$row["account"] ;

$myObj = new stdClass();
$myObj->account = $account;

$myJSON = json_encode($myObj);

echo $myJSON;

$conn->close();
?>
