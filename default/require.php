<?php
function root() {
  return dirname(__DIR__);
}
function connect() {
  $serverID = $_ENV['serverID'];
  $conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? 
    new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9") : 
    new mysqli("mysql.hostinger.com", $serverID . "_admin", $_ENV['serverPW'], $serverID . "_accnt");
  $conn->connect_error && die("Connection failed: " . $conn->connect_error);
  return $conn;
}
function getModule($module) {
  require __DIR__."/modules/$module.php";
}
function console_log($log) {
  echo "<script>
  console.log(`$log`);
  </script>";
}
echo $_ENV['serverID'];
?>