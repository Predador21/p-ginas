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

echo "Usuario: ".$account;
echo "<BR><BR>" ;

$conn->close();

//-------------------------------------------

$conn = new mysqli($host, $username, $password, $database);

$sql = "select url from tbl_url where account = '".$account."' ";
$result = $conn->query($sql);

while($result->num_rows == 0) {
    $result = $conn->query($sql);
    sleep(1) ;
}

$row = $result->fetch_assoc();

echo $row["url"] ;

$conn->close();

?>
