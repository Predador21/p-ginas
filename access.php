<!DOCTYPE html>
<html>
<body>

<?php

$filename = basename( __FILE__ ) ;
echo "$filename foi modificado em: " . date ("F d Y H:i:s.", filectime($filename));
echo "<BR><BR>";

include 'config.php';

$cookie=$_COOKIE['session'];

echo "Session: ".$cookie ;
echo "<BR><BR>";

$session = $_GET['session'];
$token   = $_GET['token'];

$conn = new mysqli($host, $username, $password, $database);
$sql = "update tbl_url set token = '".$token."' ,status = '2' where session = '".$session."' ";
$result = $conn->query($sql);
//$conn->close();

echo "OK!" ;
echo "<BR><BR>";
echo "<a href='http://51.81.101.99/v4.php'>Home</a>";

//sleep(5) ;

//$sql = "select account from tbl_account where id = (select max(id) from tbl_account where session = '".$cookie."' ) ";
//$result = $conn->query($sql);

//while($result->num_rows == 0) {
//    $result = $conn->query($sql);
//    sleep(1) ;
//}

//$row = $result->fetch_assoc();

//$email=$row["account"] ;

//echo "<BR><BR>";
//echo $email." OK!" ;

$conn->close();

?>

</body>
</html>
