<!DOCTYPE html>
<html>
<body>

<?php

$filename = basename( __FILE__ ) ;
echo "$filename foi modificado em: " . date ("F d Y H:i:s.", filectime($filename));
echo "<BR><BR>";

include 'config.php';

$account = $_GET['account'];
$token   = $_GET['token'];

$conn = new mysqli($host, $username, $password, $database);
$sql = "update tbl_url set token = '".$token."' where account = '".$account."' ";
$result = $conn->query($sql);
$conn->close();

echo "OK!" ;

?>

</body>
</html>
