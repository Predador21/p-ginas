<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

//$data_hora = date('d/m/Y H:i:s');

$conn = new mysqli($host, $username, $password, $database);

$sql  = "select status ";
$sql .= "      ,count(*) qtde               ";
$sql .= "  from tbl_account                 ";
$sql .= " group by status ;                 ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $status = $row["status"] ;
        $qtde   = $row["qtde"] ;
    echo str_pad($status,30 , "-").' '.$qtde."<BR>";
  }
}
$conn->close();

?>
