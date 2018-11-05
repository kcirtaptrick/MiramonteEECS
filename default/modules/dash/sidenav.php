<?php
$menus = json_decode(file_get_contents(__DIR__."/sidenav.json"), false);
?>
<div class="col-md-3 left_col menu_fixed">
   <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
         <a href="index.html" class="site_title"><img src="/Miramonte-EECS(white_background).png"/></i> <span> Dashboard</span></a>
      </div>
      <div class="clearfix"></div>
      <!-- menu profile quick info -->
      <div class="profile clearfix">
         <div class="profile_pic">
            <img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="..." class="img-circle profile_img">
         </div>
         <div class="profile_info">
            <span>Welcome,</span>
            <h2 style="word-wrap: break-word; width: calc(230px * 0.55)"><?php echo $userInfo["firstname"] . " " . $userInfo["lastname"];?></h2>
         </div>
      </div>
      <!-- /menu profile quick info -->
      <br>
      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
         <?php
         foreach($menus as $section) {
            echo "<div class='menu_section'>
                     <h3>$section->title</h3>
                     <ul class='nav side-menu'>";
                     for($i = 0; $i < count($section->items); $i++) {
                        $menu = $section->items[$i];  
                        $hasItems = isset($menu->items);
                        // add <span class='label label-success pull-right'>New</span> for new menu items
                        echo "<li>
                                 <a".(isset($menu->link) ? " href='$menu->link'" : '')."><i class='$menu->icon'></i>$menu->title".($hasItems ? '<span class="fa fa-chevron-down"></span>' : '')."</a>";
                        if($hasItems) {
                           echo "<ul class='nav child_menu'>";
                           foreach ($menu->items as $item) {
                              echo"<li><a".(isset($item->link) ? " href='$item->link'" : '').">{$item->title}</a></li>";
                           }
                           echo "</ul>";
                        }
                        echo "</li>";
                     }
            echo '   </ul>
                  </div>';
         }
         ?>
         
      </div>
      <!-- /sidebar menu -->
      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
         <span class="glyphicons glyphicons-user"></span>
         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile">
         <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
         <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
         <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="" href="login.html" data-original-title="Logout">
         <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
         </a>
      </div>
      <!-- /menu footer buttons -->
   </div>
</div>