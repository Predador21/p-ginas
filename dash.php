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

$sql = "SELECT id, datahora, user, send, target FROM tbl_ping";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " data: " . $row["datahora"]. " user: " . $row["user"]. " send: " . $row["send"]. " target: " . $row["target"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
