   <link rel="stylesheet" href="<?=base_url() ;?>assets/Trunk/css/reset.css"> <!-- CSS reset -->
	<link rel=" stylesheet" href="<?=base_url() ;?>assets/Trunk/css/style.css"> <!-- Resource style -->
	<script src="<?=base_url() ;?>assets/Trunk/js/modernizr.js"></script> <!-- Modernizr -->
	 	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/style.css"> <!-- Resource style -->
	 <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/labs.css">
     <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/masonry.css">
	<style>
	.logo{
	display: inline-block;
    position: absolute;
    height: 40px;
    margin-top: 30px ;
    margin-left: 5% ;
    -webkit-font-smoothing: antialiased;
	 }
	 
  @media (max-width: 768px) {
 
 .Webmenu{ 
		 display: none;
	 }
 
}
 @import url('https://fonts.googleapis.com/css?family=Inconsolata:700');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
}

 

 
 
 </style>
<body>
    
<?php 
$CategoryService = getCategoryData();
$CategoryEnt = getCategoryEntData();
$CategoryServices = getServicesCategoryData();
 
?>
 
  <section>
  	<div class="v3-list-ql"  >
	   <div class="container">
		 <div class="row">
			    <div class="col-xs-3 col-md-3">
			         
         <div class="col-xs-10 col-md-5">  
	       <div class="cd-dropdown-wrapper">
	     
			 <a class="cd-dropdown-trigger" href="#0">      <img style="max-width:25px;" src="<?php echo base_url();?>assets/images/logo-facture.png" alt="image"/></a>
			  <nav class="cd-dropdown">
				<h2>Eldalile</h2>
				<a href="#0" class="cd-close">Close</a>
				<ul class="cd-dropdown-content">
					<li>
	                 
				    </li>
				    <li class="has-children">
						<a href="http://codyhouse.co/?p=748"> Places</a>
						<ul class="cd-dropdown-icons is-hidden">
							<li class="go-back"><a href="#0">Menu</a></li>
							<li class="see-all"><a href="http://codyhouse.co/?p=748">Browse Places</a></li>
					  <?php foreach(getCategoryData() as $cat) { ?>
					     <li><a href="<?php echo base_url('/listing_map/index?cat='.$cat['id']);?>"><?php echo $cat['color'] .' <span>'.$cat['name'].'</span>'; ?></a></li>

					  <?php } ?>
						 
						</ul> <!-- .cd-dropdown-icons -->
					</li> <!-- .has-children -->
                   <li class="has-children">
						<a href="">Services</a>
                        <ul class="cd-secondary-dropdown is-hidden">
							<li class="go-back"><a href="#0">Menu</a></li> 
							 <li class="see-all"><a href="<?=base_url('pages/detail') ;?>">tous les Services</a></li>
					  <?php foreach($CategoryServices as $cate) { ?>  
						  <li class="has-children">
						  
								<a href="<?=base_url('pages/detail') ;?>"><?php echo $cate['name'] ?></a>
                                 <ul class="is-hidden">
									<li class="go-back"><a href="#0">Services</a></li>
									<li class="see-all"><a href="">Afficher tous</a></li>
							       <?php foreach(getServicesSouCategoryData($cate['id']) as $soucate) { ?>  	
							           <li><a href="#0"><?php echo $soucate['name'] ; ?></a></li>
					               <?php } ?>
									
								</ul>
								
					   <?php } ?>    
							
						</ul>  
					</li> <!-- .has-children -->
					
					
					<li class="cd-divider">Plus</li>
                    <li><a href="<?php echo base_url('about-us');?>">a propos</a></li>
					<li><a href="<?php echo base_url('how-it-work');?>">Comment ça marche</a></li>
				     <?php if($this->session->userdata('sess_logged_in')==0){?>			
		                  <li ><a href="<?php echo base_url('login');?>" class="v3-menu-sign"><i class="fa  fa-user-plus"></i> Se connecter</a> </li>
				     <?php } else { ?>	
                          <li ><a href="<?php echo base_url('customer/listing/places');?>" class="v3-menu-sign"><i class="fa  fa-plus-circle"></i> ajouter Services</a> </li>
				     <?php }   ?> 
					 
				</ul>  
			</nav>  
			
		</div>  
	  </div>
		 
			  </div>
			 
		  <div class="Webmenu pull-right">
				  <div class="v3-list-ql-inn ">
					   <ul>
					 	<li class="dropdown">
							 <a  id="label"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="#>"><i class="fa fa-home"></i> </a> 
					     <div class="v3-list-ql-inn dropdown-menu"  aria-labelledby="dLabel" style="min-width:300px;index:90;">
						  <ul id="horizontal-list">
						    <li><a href="<?php echo base_url('/pages/city');?>" class="js-target-scroll"><i class="fa fa-list"></i> <span>list</span></a>
							</li>
					        <li><a href="<?php echo base_url('welcome/index/1');?>" ><i class="fa fa-map"></i> <span>Map</span> </a></li>
							 
						  </ul>
					</div>
			 
                	</li>
				        <li class="dropdown">
						   <a href="#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="fa fa-map-marker"></i> <span>Services</span></a> 
						 <div class="v3-list-ql-inn dropdown-menu tog-ser"  aria-labelledby="dLabel" > 

						  <ul id="horizontal-list">
						   <?php foreach ($CategoryService as $cat) {?>
                              <li><a href="<?php echo base_url('/listing_map/index?cat='.$cat['id']);?>"><?php echo $cat['color'] .' <span>'.$cat['name'].'</span>'; ?></a></li>
				           <?php } ?>
						  </ul>
					       </div>
					 
					    </li> 
							 <?php if($this->session->userdata('sess_logged_in')==0){?>			
		 <li><a href="<?php echo base_url('login');?>" class="v3-menu-sign"><i class="fa  fa-user-plus"></i></a> </li>
				<?php } else { ?>	
         <li><a href="<?php echo base_url('customer/listing/places');?>" class="v3-menu-sign"><i class="fa  fa-plus-circle"></i></a> </li>
				<?php }   ?> 
						</ul>
					</div>
		       </div>
		 	 </div>
		  </div>
		</div>
		 
	</section>

 
<script src="<?=base_url() ;?>assets/Trunk/js/jquery.menu-aim.js"></script> <!-- menu aim -->
<script src="<?=base_url() ;?>assets/Trunk/js/main.js"></script> <!-- Resource jQuery -->
