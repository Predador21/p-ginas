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
$sql .="      ,refresh_token   = @refresh_token := refresh_token      " ;
$sql .=" where 1=1                                                    " ;
$sql .="   and l_ativo = 'T'                                          " ;
$sql .="   and id = (select tab.id                                    " ;
$sql .="               from (select @rownum := @rownum + 1 as rownum  " ;
$sql .="                          , tbl_account.id                    " ;
$sql .="                       from (select @rownum := 0) r           " ;
$sql .="                          , tbl_account                       " ;
$sql .="                      where status in ('CREATED','OUT')       " ;
$sql .="                        and owner is null                     " ;
$sql .="              order by tbl_account.d_status ) as tab          " ;
$sql .="              where tab.rownum =1 ) ;                         " ;

$result = $conn->query($sql);

$sql="select @refresh_token refresh_token ;" ;

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$refresh_token=$row["refresh_token"] ;

echo $refresh_token ;

$conn->close();
?>
