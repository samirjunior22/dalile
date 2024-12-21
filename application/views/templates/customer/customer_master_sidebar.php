

	<div id="dashboard"  style=" ">
	<!-- Navigation -->
	<div id="dashboard-nav" class="dashboard-nav">	
		<ul>
        	<li id="Dashboard" ><a href="<?php echo base_url('customer/setting/dashboard/');?>"><i class="fa fa-cogs"></i> Dashboard</a></li>
		   	 <li id="listing"><a id="MLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i> Mes Services</a>
				<ul class="dropdown-menu" aria-labelledby="MLabel">
					<li ><a id="active" href="<?php echo base_url('customer/listing/index/1');?>"> Active <span class="nav-tag green"><?php echo countListingCustomer($customer->id , 1) ?></span></a></li>
					<li> <a id="Pending" href="<?php echo base_url('/customer/listing/index/2');?>">Pending <span class="nav-tag yellow"><?php echo countListingCustomer($customer->id , 2) ?></span></a></li>
					<li ><a id="Expired" href="<?php echo base_url('/customer/listing/index/0');?>">Expired <span class="nav-tag red"><?php echo countListingCustomer($customer->id , 0) ?></span></a></li>
				</ul>	
			</li>
			<li  id="add-listing"><a href="<?php echo base_url('customer/listing/places');?>"><i class="fa fa-plus"></i>créer nouveau</a></li> 
			<li id="Gallery"><a id="GLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-picture-o"></i>Gallery</a>
				<ul class="dropdown-menu" aria-labelledby="GLabel">
					<li ><a id="Gere" href="<?php echo base_url('customer/Gallery');?>"> Albums <span class="nav-tag green"><?php echo countListingCustomer($customer->id , 1) ?></span></a></li>
				 </ul>	
			</li>
			<li id="reviews" ><a href="<?php echo base_url('customer/reviews');?>"><i class="fa fa-star-o"></i> Reviews</a></li>
			<li id="bookmarks" ><a href="<?php echo base_url('customer/Bookmarks');?>"><i class="fa fa-bookmark-o"></i> favoris </a></li>
			<li id="posts" ><a href="<?php echo base_url('customer/blogs');?>"><i class="fa fa-bookmark-o"></i> Posts</a></li>
			 <li id="Orders"><a id="MLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-credit-card"></i>  Mes factures </a>
		    <ul class="dropdown-menu" aria-labelledby="MLabel">
					<li ><a id="devis" href="<?php echo base_url('customer/facture/devis');?>"> Mes devis <span class="nav-tag yellow"><?php echo countDevis(0 ,$customer->id ) ?></span></a></li>
					<li> <a id="facture" href="<?php echo base_url('/customer/facture/facture');?>">Mes factures <span class="nav-tag green"><?php echo countDevis(1 ,$customer->id ) ?></span></a></li>
				 </ul>	
			</li>
	        <li id="profil" ><a href="<?php echo base_url('customer/setting/profil');?>"><i class="fa fa-user-o"></i> My Profile</a></li>
			<li ><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
		</ul>	
	</div>
	<!-- Navigation / End -->
