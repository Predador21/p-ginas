 <?php
$servername = "localhost";
$username = "admin";
$password = "qwerty794613Q!";
$dbname = "fenix";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT trim(account_id) account_id FROM tbl_token where id = (select max(id) from tbl_token)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["account_id"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
