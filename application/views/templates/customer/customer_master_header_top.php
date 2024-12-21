<style>

.navbar-default .dropdown-menu.notify-drop {
  min-width: 430px;
  background-color: #fff;
 
  max-height: 360px;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-title {
  border-bottom: 1px solid #e2e2e2;
  padding: 5px 15px 10px 15px;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer {
  border-top: 1px solid #e2e2e2;
 
}
.navbar-default .dropdown-menu.notify-drop .drop-content {
  min-height: 280px;
  max-height: 280px;
  overflow-y: scroll;
}
.navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-track
{
  background-color: #F5F5F5;
}

.navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar
{
  width: 8px;
  background-color: #F5F5F5;
}

.navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-thumb
{
  background-color: #ccc;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li {
  border-bottom: 1px solid #e2e2e2;
  padding: 10px 0px 5px 0px;
  margin :0;
}
 
.navbar-default .dropdown-menu.notify-drop .drop-content > li:after {
  content: "";
  clear: both;
  display: block;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li:hover {
  background-color: #fcfcfc;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li:last-child {
  border-bottom: none;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li .notify-img {
  float: left;
  display: inline-block;
  width: 45px;
  height: 45px;
  margin: 0px 0px 8px 0px;
}
.navbar-default .dropdown-menu.notify-drop .allRead {
  margin-right: 7px;
}
.navbar-default .dropdown-menu.notify-drop .rIcon {
  float: right;
  color: #999;
}
.navbar-default .dropdown-menu.notify-drop .rIcon:hover {
  color: #333;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li a {
  font-size: 12px;
  font-weight: normal;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li {
  
  font-size: 11px;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li hr {
  margin: 5px 0;
  width: 70%;
  border-color: #e2e2e2;
}
.navbar-default .dropdown-menu.notify-drop .drop-content .pd-l0 {
  padding-left: 0;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li p {
  font-size: 11px;
  color: #666;
  font-weight: normal;
  margin: 3px 0;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li p.time {
  font-size: 10px;
  font-weight: 600;
  top: -6px;
  margin: 8px 0px 0px 0px;
  padding: 0px 3px;
  border: 1px solid #e2e2e2;
  position: relative;
  background-image: linear-gradient(#fff,#f2f2f2);
  display: inline-block;
  border-radius: 2px;
  color: #B97745;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li p.time:hover {
  background-image: linear-gradient(#fff,#fff);
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer {
  border-top: 1px solid #e2e2e2;
  bottom: 0;
  position: relative;
  padding: 8px 15px;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer a {
  color: #777;
  text-decoration: none;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer a:hover {
  color: #333;
}
</style>
<style>

 .mes {   position: absolute;
    top: 9px;
    right: 15px;
    text-align: center;
    font-size: 15px;
    padding: 2px 3px;
 line-height: .9; }
 
 
hr {
  height: 3px;
  border: 0;
  background-color: #c3c3c3;
  background-image: -webkit-gradient(linear, 0 0, 100% 0, from(#f7f6f4), to(#f7f6f4), color-stop(50%, #fff));
  background-image: -webkit-linear-gradient(left, #f7f6f4, #fff, #f7f6f4);
  background-image: -moz-linear-gradient(left, #f7f6f4, #fff, #f7f6f4);
  background-image: -ms-linear-gradient(left, #f7f6f4, #fff, #f7f6f4);
  background-image: -o-linear-gradient(left, #f7f6f4, #fff, #f7f6f4);
}
hr::after {
  content: '';
  display: block;
  height: 1px;
  background-color: #f7f6f4;
  background-image: -webkit-gradient(linear, 0 0, 100% 0, from(#f7f6f4), to(#f7f6f4), color-stop(50%, #c3c3c3));
  background-image: -webkit-linear-gradient(left, #f7f6f4, #c3c3c3, #f7f6f4);
  background-image: -moz-linear-gradient(left, #f7f6f4, #c3c3c3, #f7f6f4);
  background-image: -ms-linear-gradient(left, #f7f6f4, #c3c3c3, #f7f6f4);
  background-image: -o-linear-gradient(left, #f7f6f4, #c3c3c3, #f7f6f4);
}

.no {
	
	    border-bottom: 1px solid #dddfe2;
}

  .nonlu {
   background-color: #e6f6fd;
   } 
.content {
	 background-color: #fff; 
     margin: 0 8px -4px;
   
}
</style>
<?php 
$notifications = notifications($customer->id);
 $countnotifi = notifications_count($customer->id) 
?>
<div class="dashboard_container">
	<!-- Header -->
	<header id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container"> 
               <div class="navbar-header">
                <div class="logo"> <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/log-r.png" alt="image"/></a> </div>
                <div id="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i></div>
              </div>
                <div class="collapse navbar-collapse" id="navigation">
             <div class="user_nav">
                        <div class="dropdown">
 <?php if($countnotifi != 0) { echo '  <span class="mes label label-danger">'.$countnotifi.'</span>' ; } ?>
                          <span id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('assets/images/img/not.png'); ?>" alt="img"> 
                          </span>
						  
					   <ul class="dropdown-menu notify-drop" aria-labelledby="dLabel">
                          
						  <div class="notify-drop-title">
            	            <div class="row">
            		          <div class="col-md-6 col-sm-6 col-xs-6">Notifications (<b><?php echo notifications_count($customer->id) ?></b>)</div>
            		          <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="Tout marquer comme lu."><i class="fa fa-dot-circle-o"></i></a></div>
            	            </div>
                          </div>
						  
                         <div class="drop-content">
            	          <?php if( $notifications != null) {  
						  $count = 1;
						   foreach($notifications as $notification) { ?>
						   
  <li class="<?php if($notification['status'] == 0) echo 'nonlu' ; ?>" id="<?php echo $notification['id']; ?>">
  <a style=" color: black;" href="<?=base_url('customer/setting/notification')?>">  <div class="col-md-3 col-sm-3 col-xs-3">
   <div class="notify-img"><img  style="border-radius: 50%;" src="<?php echo $notification['picture']; ?>" alt=""></div></div>
     <div class="col-md-6 col-sm-6 col-xs-6 pd-l0"> <span style="font-weight: bold;">  <?php echo $notification['from']; ?></span> <span > <?php echo $notification['content']; ?>  . <a><?php echo  timeAgo(strtotime($notification['generated_on'])) ; ?></a>  </span >
   <a href="#" class="rIcon" title="marquer comme lue."><i class="fa fa-dot-circle-o"></i></a>
   </div>
	<div class="col-md-3 col-sm-3 col-xs-3 ">   
  	  <img class="content" style=" min-height: 48px;" src="<?=base_url($notification['photo']); ?>" alt="">
	 </div>
	 
	 </a>
   </li> 
            
				        <?php $count ++;
							   } ?>   
					  <?php } ?>
				        </div>
						 <div class="notify-drop-footer">
            	            <div class="row">
            		          <div class="col-md-6 col-sm-6 col-xs-6"><a href="<?=base_url('customer/setting/notification') ?>">voir all </a></div>
            		          <div class="col-md-6 col-sm-6 col-xs-6 text-right"> </div>
            	            </div>
                          </div>
                    </ul>
						  
                        </div>
                    </div>
                    
					 <div class="user_nav">
                        <div class="dropdown">
                          <span id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo $customer->picture ; ?>" alt="img"> 
                          </span>
                          <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="<?php echo base_url('customer/setting/dashboard'); ?>"><i class="fa fa-cogs"></i> Dashboard</a></li>
                            <li><a href="<?php echo base_url('customer/setting/profil'); ?>"><i class="fa fa-user-o"></i> My Profile</a></li>
                            <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>                   
                          </ul>
                        </div>
                    </div>
                    <div class="submit_listing">
                        <a href="<?php echo base_url('customer/listing/places');?>" class="btn outline-btn"><i class="fa  fa-plus-circle"></i> Ajouter</a>
                     </div>
                </div>
             </div>   
        </nav>
    </header>
