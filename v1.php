<?php

include 'config.php';

$cookie=$_COOKIE['session'];

if (is_null($cookie) == 1) {
    $cookie=bin2hex(random_bytes(5));
    setcookie('session',$cookie);
}

$conn = new mysqli($host, $username, $password, $database);

$account='g'.bin2hex(random_bytes(3));

$sql = "insert into tbl_session ( session, account ) values ('".$cookie."','".$account."')";
$result = $conn->query($sql);

$conn->close();

echo "Usuario: ".$account;

?>
