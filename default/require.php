<?php
$serverID = "u407803484";
$conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? 
  new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9") : 
  new mysqli("mysql.hostinger.com", $serverID . "_admin", "12345trewqWERT", $serverID . "_accnt");
$conn->connect_error && die("Connection failed: " . $conn->connect_error);
?>