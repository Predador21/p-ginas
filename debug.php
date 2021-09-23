<?php

date_default_timezone_set('America/Sao_Paulo');

include 'config.php';

$session=$_GET['session'];

$conn = new mysqli($host, $username, $password, $database);

$sql  = "delete from tbl_log where session <> '".$session."' ";
$result = $conn->query($sql);

$sql  = "select concat(dataHora,' / ID: ',id,' / ') base  ";
$sql .= "     , log                                               ";
$sql .= "  from tbl_log                                           ";
$sql .= " where session = '".$session."'                          ";
$sql .= " order by id ;                                           ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

        $base = $row["base"] ;
        $log  = base64_decode($row["log"]) ;

        echo $base.$log.'<BR>' ;
  }
}
$conn->close();

?>
