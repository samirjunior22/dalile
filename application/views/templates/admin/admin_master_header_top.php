<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cout_notif = notifications_admin_count() ;
$notif = notifications_admin() ;
?>
 <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
             
            </a>
                <ul class="dropdown-menu">
                </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
     <?php if ($cout_notif > 0) echo '<span class="label label-warning">'. $cout_notif .'</span>';	?>		  
            </a>
             <ul class="dropdown-menu">
              <li class="header">You have <?php echo notifications_admin_count() ;?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
			<?php if($notif != null) {
                 foreach ($notif as $notifs)	{ ?>			
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> <?php echo $notifs['content']  ;?>
                    </a>
                  </li>
			<?php } } ?>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo  base_url($user->photo) ;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user->first_name.' '. $user->last_name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo  base_url($user->photo) ;?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $user->first_name.' '. $user->last_name ?>  
                 </p>
              </li>
             <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('admin/user/profile');?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('admin/user/logout');?>"  class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            
          </li>
        </ul>
      </div>
    </nav>
  </header>
 
 