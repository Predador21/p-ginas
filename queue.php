<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$owner = $_GET['owner'];

//$data_hora = date('d/m/Y H:i:s');

$conn = new mysqli($host, $username, $password, $database);

$sql  ="update tbl_account                                            " ;
$sql .="   set owner           = '".$owner."'                         " ;
$sql .="      ,status          = 'QUEUED'                             " ;
$sql .="      ,d_status        = now()                                " ;
$sql .="      ,account         = @account := account                  " ;
$sql .="      ,refresh_token   = @refresh_token := refresh_token      " ;
$sql .="      ,bearer          = @bearer := bearer                    " ;
$sql .=" where id = (select tab.id                                    " ;
$sql .="               from (select @rownum := @rownum + 1 as rownum  " ;
$sql .="                          , tbl_account.id                    " ;
$sql .="                       from (select @rownum := 0) r           " ;
$sql .="                          , tbl_account                       " ;
$sql .="                      where 1=1                               " ;
$sql .="                        and status not in ('TOS_VIOLATION')   " ;
$sql .="                        and status not in ('BUILDING')        " ;
$sql .="                        and status not in ('UNAUTHENTICATED') " ;
$sql .="                        and ativo = 'T'                       " ;
//$sql .="                        and 1=2                               " ;
$sql .="              order by tbl_account.d_status                   " ;
$sql .="                     , tbl_account.id ) as tab                " ;
$sql .="              where tab.rownum =1 ) ;                         " ;

$result = $conn->query($sql);

$sql="select @account account , @refresh_token refresh_token , @bearer bearer ;" ;

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$account=$row["account"] ;
$refresh_token=$row["refresh_token"] ;
$bearer=$row["bearer"] ;

$myObj = new stdClass();
$myObj->account = $account;
$myObj->refresh_token = $refresh_token;
$myObj->bearer = $bearer;

$myJSON = json_encode($myObj);

echo $myJSON;

//echo $refresh_token ;

$conn->close();
?>
