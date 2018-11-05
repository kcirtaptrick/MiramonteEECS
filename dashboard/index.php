<?php 
require '../default/require.php';
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
      <style>
         .clubs .card {
            border-radius: 0.5rem;
            background: #eee;
            width: 17vw;
            vertical-align: top;
            display: inline-block;
            cursor: pointer;
            margin: 1rem;
         }
         .club .card:hover {
            box-shadow: 0 0 1rem 1rem black;
         }
         .clubs .card header {
            padding: 0.3rem;
            text-align: center;
            font-size: 1.5rem;
            border-bottom: 1px solid #ccc;
            font-weight: bold;
         }
         .clubs .card .content {
            padding: 1rem;
            word-wrap: break-word;
         }
      </style>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <?php
            getModule('dash/sidenav');
            getModule('dash/topnav');
            ?>
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 1875px;">
               <div class="clubs">
                  <div class="card" data-club="game development">
                     <header>Game Development</header>
                     <div class="content">
                        asdf<br>
                        asdf<br>
                        asdf
                     </div>
                  </div>
                  <div class="card" data-club="game development">
                     <header>Pioneers in Engineering</header>
                     <div class="content">
                        qwertyuiopasdfghjklzxcvbnm
                     </div>
                  </div>
                  <div class="card" data-club="game development">
                     <header>Maker</header>
                     <div class="content">
                        qwertyuiopasdfghjklzxcvbnm
                     </div>
                  </div>
               </div>
            </div>
            <!-- /page content -->
         </div>
      </div>
      <!-- jQuery -->
<script async="" src="https://www.google-analytics.com/analytics.js"></script>
<script src="/dashboard/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/dashboard/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/dashboard/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="/dashboard/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="/dashboard/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/dashboard/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="/dashboard/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/dashboard/vendors/Flot/jquery.flot.js"></script>
<script src="/dashboard/vendors/Flot/jquery.flot.pie.js"></script>
<script src="/dashboard/vendors/Flot/jquery.flot.time.js"></script>
<script src="/dashboard/vendors/Flot/jquery.flot.stack.js"></script>
<script src="/dashboard/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/dashboard/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/dashboard/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="/dashboard/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="/dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/dashboard/vendors/moment/min/moment.min.js"></script>
<script src="/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- split.js -->
<!--<script src="split.js"></script>-->
<!-- ace editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ext-modelist.js"></script>
<!-- Custom Theme Scripts -->
<script src="/dashboard/build/js/custom.js"></script>
      <div class="jqvmap-label" style="display: none;"></div>
   </body>
</html>