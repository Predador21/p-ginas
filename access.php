<!DOCTYPE html>
<html>
<body>

<?php

$filename = basename( __FILE__ ) ;
echo "$filename foi modificado em: " . date ("F d Y H:i:s.", filectime($filename));
echo "<BR><BR>";

include 'config.php';

$session = $_GET['session'];
$token   = $_GET['token'];

$cookie=$_COOKIE['session'];

echo "Session: ".$cookie ;
echo "<BR><BR>";

$conn = new mysqli($host, $username, $password, $database);
$sql = "update tbl_url set token = '".$token."' ,status = '2' where session = '".$session."' ";
$result = $conn->query($sql);

echo "OK!" ;
echo "<BR><BR>";
echo "<a href=".$ip."/v4.php>Home</a>";

//sleep(1) ;

//$sql = "select account , creator from tbl_account where id = (select max(id) from tbl_account where session = '".$session."' ) ";
//$result = $conn->query($sql);

//while($result->num_rows == 0) {
//      $result = $conn->query($sql);
//      sleep(1) ;
//}

//$row = $result->fetch_assoc();

//$email = $row["account"] ;
//$creator = $row["creator"] ;

//echo "<BR><BR>";
//echo $email." OK!" ;
//echo "<BR><BR>" ;
//echo "Creator: ".$creator ;

$conn->close();

?>

</body>
</html>
