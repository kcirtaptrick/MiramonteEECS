<?php
$serverID = "u407803484";
$conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? 
  new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9") : 
  new mysqli("mysql.hostinger.com", $serverID . "_admin", "12345trewqWERT", $serverID . "_accnt");
$conn->connect_error && die("Connection failed: " . $conn->connect_error);
function getNav() {
  echo '
  <nav id="main">
  <ul>
    <li><a href="/index.html">Home</a></li>
    <li><a href="">Forums</a></li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Clubs</a>
      <div class="dropdown-content">
        <a href="">AI Neural Networks</a>
        <a href="">PiE Robotics</a> 
        <a href="">Game Dev</a>
        <a href="">Computer Science</a>
      </div>
    </li> 
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Events</a>
      <div class="dropdown-content">
        <a href="">Event 1</a>
        <a href="">Event 2</a>
        <a href="">Event 3</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Projects</a>
      <div class="dropdown-content">
        <a href="">PiE Robot</a>
        <a href="">Project 2</a>
        <a href="">Project 3</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Tools</a>
      <div class="dropdown-content">
      <a href="encrypt">AES Encryption</a>
      </div>
    </li>
<!--
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Education</a>
      <div class="dropdown-content">
-->
  </ul>
  <div></div>
  <div class="nav-displace"></div>'
}
?>