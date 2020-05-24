<?php
require('db.php');
include('auth.php');
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Friends of the River</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/foundation.css">
    
  </head>
<body>
  <div class="wrapper grid-y grid-frame ">
    <div class="grid-x">
      <aside class="sidebar">
        <div class="logo">
        </div>
        <ul class="sidebar-list">
            <li><a href="/"><span>DASHBOARD</span></a></li>
            <li class="header"><span>Monitoring Stations</span></li>
            <li><a href="view.php?t=dumbarton"><span>Dumbarton</span></a></li>
            <li><a href="view.php?t=millards_pool"><span>Millards Pool</span></a></li>
            <li><a href="view.php?t=lloyds_reserve"><span>Lloyds Reserve</span></a></li>
            <li><a href="view.php?t=goomalling_bridge"><span>Goomalling Bridge</span></a></li>
            <li><a href="view.php?t=boyagerring_brook"><span>Boyagerring Brook</span></a></li>
            <li><a href="view.php?t=newcastle_bridge"><span>Newcastle Bridge</span></a></li>
            <li><a href="view.php?t=slaughterhouse_bridge"><span>Slaughterhouse Bridge</span></a></li>
            <li><a href="view.php?t=weatherall_reserve"><span>Weatherall Reserve</span></a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
      </aside>
    </div>
    <div class="grid-x content" style="height: 100%;">

    </div>
  </div>
<script src="assets/js/vendor.js"></script>
<script src="assets/js/foundation.js"></script>
</body>
</html>
