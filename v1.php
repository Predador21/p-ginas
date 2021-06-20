<?php

$dbname     = "fenix";
$username   = "admin";
$password   = "qwerty794613Q!";

$conn = new mysqli($servername, $username, $password, $dbname);

$session = 'g'.bin2hex(random_bytes(3));

$sql = "insert into tbl_session ( session ) values ( '".$session."')";
$result = $conn->query($sql);

$conn->close();

echo "Usuario: "."<br>".$session;

?>
