<?php
$serverID = "u135302168";
$conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9") : new mysqli("mysql.hostinger.com", serverID + "_admin", "12345trewqWERT", serverId +"_accnt");
$conn->connect_error && die("Connection failed: " . $conn->connect_error);
// echo "<div>Connected successfully</div>";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "a<br><br><br><br><br><br><br><br>";
  $sql =  "INSERT INTO clubday VALUES(\"{$_POST['firstname']}\", \"{$_POST['lastname']}\", \"{$_POST['schoolEmail']}\", \"".escapeQuotes( json_encode( $_POST['contact'] ))."\", \"{$_POST['additionalInfo']}\", \"{$_POST['gameDev']}\", \"{$_POST['PiE']}\");";
  echo $sql;
  echo $conn->query($sql) === TRUE ? "New record created successfully" : "Error: {$sql}<br>{$conn->error}";
  echo "<div><h1>\$_POST</h1>" . preg_replace("/(Array\s*\(\s*)|\)/", "", preg_replace('/\[(\w*)\] => ([^\[]*)/', '$1: $2<br>', print_r($_POST, true)))."</div>";
  for($i = 0; $_POST["contact-{$i}"]; $i++) {
    echo "contact: {$_POST['contact-' . $i]}<br>";
  }
  $uData = json_decode(file_get_contents('userData.json', "\0"), true);
  $uData[count($uData)] = $_POST;
  file_put_contents('userData.json', json_encode($uData, JSON_PRETTY_PRINT));
}
function escapeQuotes($str) {
  return str_replace("\"", "\\\"",$str);
}
?>