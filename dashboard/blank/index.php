<?php 
require '../../default/require.php';
$conn = connect();
$userInfo = $conn->query("select * from userInfo where username=\"username\"")->fetch_assoc();
?>
<html lang="en" class=" ">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dashboard</title>
      <?php
      getModule('dash/styles');
      ?>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <?php
            // Side Nav
            getModule('dash/sidenav');
            // Top Nav
            getModule('dash/topnav');
            ?>
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 1875px;">
               
            </div>
            <!-- /page content -->
         </div>
      </div>
      <?php
      getModule('dash/script');
      ?>
      <div class="jqvmap-label" style="display: none;"></div>
   </body>
</html>