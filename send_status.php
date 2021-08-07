<!DOCTYPE html>
<html>
<body>

<?php

include 'config.php';

$account = $_GET['account'];
$status  = $_GET['status'];
$owner   = $_GET['owner'];

$data_hora = date('d/m/Y H:i:s');

$conn = new mysqli($host, $username, $password, $database);

$sql  ="select status " ;
$sql .="      ,d_status_first " ;
$sql .="  from tbl_account " ;
$sql .=" where account = '".$account."' " ;

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$status_old=$row["status"] ;
$d_status_first=$row["d_status_first"] ;

if ($status_old != $status ) {
    $d_status_first=$data_hora ;
}

$sql  ="update tbl_account " ;
$sql .="   set status = '".$status."' " ;
$sql .="      ,d_status_first = '".$d_status_first."' " ;
$sql .="      ,d_status_last = '".$data_hora."' ";
$sql .="      ,owner = '".$owner."' ";
$sql .=" where account = '".$account."' " ;

$result = $conn->query($sql);

$conn->close();
?>

</body>
</html>  
