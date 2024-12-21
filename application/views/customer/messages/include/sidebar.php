<?php
    $level = $this->session->userdata('level');
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <center>
                <img src="<?php echo base_url(); ?>img/logo.png" style="width:60%">
                
            </center>
            <button type="button" class="btn btn-info col-sm-10 col-sm-offset-1" data-target="#compose_mail" data-toggle="modal">Compose Mail</button>
             

            <div class="clearfix"></div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url();?>inbox"><i class="fa fa-envelope"></i> <span>Inbox</span></a></li>
            <li><a href="<?php echo base_url();?>sentitems"><i class="fa fa-envelope-o"></i> <span>Sent Items</span></a></li>
            <li class="<?php if($level!='admin') echo 'hide';?>">
                <a href="<?php echo base_url();?>messages"><i class="fa fa-archive"></i> <span>All Messages</span></a>
            </li>
            <li class="<?php if($level!='admin') echo 'hide';?>"><a href="<?php echo base_url();?>users"><i class="fa fa-users"></i> <span>Users</span></a></li>
            <li><a href="<?php echo base_url();?>settings"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
         </ul>
        </section>
        <!-- /.sidebar -->
      </aside>