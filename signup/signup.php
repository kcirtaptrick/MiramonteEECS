<style>
  :root {
    --back: #333;
    --fore: #555;
    --text: #ccc;
  }
  body {
    background: var(--back);
  }
  div {
    padding: 0.5rem;
    background: var(--fore);
    border-radius: 0.5rem;
    margin: 0.5rem 0;
    color: var(--text);
  }
  div h1 {
    font-size: 1.1em;
    font-family: sans-serif;
    text-align: center;
    font-weight: bold;
    border-bottom: 1px solid var(--back);
    margin: 0 -0.5rem;
  }
  table {
    color: var(--text);
    /*border-collapse: collapse;*/
  }
  th {
    margin: 0;
    padding: 0.3rem;
    background: #777;
    color: white;
    border: 1px solid var(--back);
  }
  td {
    margin: 0;
    padding: 0.2rem;
    border: 1px solid var(--back);
    background: var(--fore);
  }
  
  tr:nth-of-type(odd) td {
    background: #666;
  }
  * {
    word-wrap: break-word;
  }
</style>
<?php
$serverID = "u135302168";
$conn = strpos($_SERVER['HTTP_HOST'], "c9users.io") ? new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9") : new mysqli("mysql.hostinger.com", serverID + "_admin", "12345trewqWERT", serverId +"_accnt");
$conn->connect_error && die("Connection failed: " . $conn->connect_error);
echo "<div>Connected successfully</div>";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "INSERT INTO userInfo VALUES(\"{$_POST['username']}\", \"{$_POST['firstname']}\", \"{$_POST['lastname']}\", \"{$_POST['email']}\", \"{$_POST['password']}\");";
  echo "<div><h1>\$_POST</h1>" . preg_replace("/(Array\s*\(\s*)|\)/", "", preg_replace('/\[(\w*)\] => ([^\[]*)/', '$1: $2<br>', print_r($_POST, true)))."</div>";
  echo "<div>";
  echo $conn->query($sql) === TRUE ? "New record created successfully" : "Error: {$sql}<br>{$conn->error}";
  echo "</div>";
}

$rows = $conn->query("SELECT * FROM userInfo");
$cols = $conn->query("DESCRIBE userInfo");

if ($rows->num_rows > 0) {
    // output data of each row
    $colNames = array();
    echo "<table><tr>";
    while($col = $cols->fetch_assoc()) {
      array_push($colNames, $col['Field']);
      echo "<th>{$col['Field']}</th>";
    }
    echo "</tr>";
    $a = 0;
    while($row = $rows->fetch_assoc()) {
      $a++;
      echo "<tr>";
      for($i = 0; $i < count($colNames); $i++){
        echo "<td>{$row[$colNames[$i]]}</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>