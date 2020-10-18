<?php
$servername = "localhost";
$username = "root";
$password = "OMYRSg2qyEuuYXpQ";
$dbname = "gotham";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT identifier FROM whitelist";
$result = $conn->query($sql);

function whitelisted($game = "None",$steamid = "None"){
  global $result, $lists;
  assert($game != "None");
  assert($steamid != "None");
  /*
  echo "________________<br>";
  echo "game = ",$game,"<br>";
  echo "steamid = ",$steamid,"<br>";
  echo "________________<br>";
  */
  if($game == "fivem"){
    //echo "FIVEM <br>";
    while($row = $result->fetch_assoc()){
      //echo "identifier: " . $row["identifier"]. " <br>";
      if($row["identifier"] == $steamid){
        //echo "identifier ended: " . $row["identifier"] . " <br>";
        return "True";
      }
    }
  }
}


//echo whitelisted("fivem","steam:11000010572fcd6");
$conn->close();
?>