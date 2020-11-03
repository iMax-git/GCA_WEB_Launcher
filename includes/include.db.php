<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT identifier FROM whitelist";
$result = $conn->query($sql);

function whitelisted($game = "None",$steamid = "None"){
  global $result, $lists;
  assert($game != "None");
  assert($steamid != "None");
  if($game == "fivem"){
    while($row = $result->fetch_assoc()){
      if($row["identifier"] == $steamid){
        return "True";
      }
    }
  }
}
$conn->close();
?>
