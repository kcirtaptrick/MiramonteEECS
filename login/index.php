<?php
require 'default/require.php';
?>
<html>
<head>
  <title>Home</title>
  <link rel="shortcut icon" type="image/png" href="/Miramonte-EECS.square.png"/>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="/default/styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <header class="main"><img src="Miramonte-EECS.png" /></header>
    <?php
    getModule('nav');
    getModule('login');
    ?>
</body>
<script type="text/javascript" src="/default/script.js"></script>
<script type="text/javascript" src="script.js"></script>
</html>