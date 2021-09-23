<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$user = $_GET['user'];

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_session                                            " ;
$sql .="   set user = '".$user."'                                     " ;
$sql .="     , session = @session := session                          " ;
$sql .="     , account = @account := account                          " ;
$sql .=" where id = (select tab.id                                    " ;
$sql .="               from (select @rownum := @rownum + 1 as rownum  " ;
$sql .="                          , tbl_session.id                    " ;
$sql .="                       from (select @rownum := 0) r           " ;
$sql .="                          , tbl_session                       " ;
$sql .="                      where 1=1                               " ;
$sql .="                        and user is null                      " ;
$sql .="              order by tbl_session.dataHora desc  ) as tab    " ;
$sql .="              where tab.rownum = 1 ) ;                        " ;

$result = $conn->query($sql);

$sql="select @session session , @account account ;" ;

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$session=$row["session"] ;
$account=$row["account"] ;

$myObj = new stdClass();
$myObj->session = $session;
$myObj->account = $account;

$myJSON = json_encode($myObj);

echo $myJSON;

$conn->close();
?>
