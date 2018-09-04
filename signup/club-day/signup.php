<?php
$serverID = "u135302168";
$conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? new mysqli(getenv('IP'), getenv('C9_USER'), "", "ClubDay") : new mysqli("mysql.hostinger.com", serverID + "_admin", "12345trewqWERT", serverId +"_accnt");
$conn->connect_error && die("Connection failed: " . $conn->connect_error);
// echo "<div>Connected successfully</div>";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "INSERT INTO userInfo VALUES(\"{$_POST['firstname']}\");";
  // echo $conn->query($sql) === TRUE ? "New record created successfully" : "Error: {$sql}<br>{$conn->error}";
  echo "<div><h1>\$_POST</h1>" . preg_replace("/(Array\s*\(\s*)|\)/", "", preg_replace('/\[(\w*)\] => ([^\[]*)/', '$1: $2<br>', print_r($_POST, true)))."</div>";
  for($i = 0; $_POST["contact-{$i}"]; $i++) {
    echo "contact: {$_POST['contact-' . $i]}<br>";
  }
}
// $jsonData = rtrim($jsonData, "\0");
$uData = json_decode(file_get_contents('userData.json', "\0"), true);

$uData[count($uData)] = $_POST;
// var_dump($uData);
file_put_contents('userData.json', json_encode($uData, JSON_PRETTY_PRINT));
?>