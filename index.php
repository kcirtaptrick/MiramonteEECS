<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="shortcut icon" type="image/png" href="/Miramonte-EECS.square.png"/>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="default/styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$serverID = "u135302168";
$conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? mysqli_connect(getenv('IP'), getenv('C9_USER'), "") : $conn = mysqli_connect("mysql.hostinger.com", serverID + "_admin", "12345trewqWERT", serverId +"_accnt");
$conn || die("Connection failed: " . mysqli_connect_error());
// echo "<br>Connected successfully";
mysqli_close($conn);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
}
?>

<body>
    <header class="main"><img src="Miramonte-EECS.png" /></header>
    <nav id="main"></nav>
    <div class="login"></div>
</body>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="default/script.js"></script>
</html>