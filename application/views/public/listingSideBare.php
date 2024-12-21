 <style>
 .posLike{
    background: rgba(0,0,0,0.3) none repeat scroll 0 0;  
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 50%;
    color: #fff;
    height: 40px;
    font-size: 18px;
    line-height: 38px;
    padding: 0;
    position: absolute;
    right: 68px;  
    text-align: center;
     top: 15px;  
    width: 40px;
    z-index: 1;
   cursor: pointer; 
   }
 
 .posLike:hover{
	     background: #38ccff;
    fill: #38ccff;
 }
 
 .posLikefill{
    background: #38ccff;
    fill: #38ccff;
  }
 
 </style>
 <?php
if($this->session->userdata('v_user_id') != 0) {  
   $userid = $this->session->userdata('v_user_id') ; 
}else { 
	$userid = 0 ; 
}
 ?> 
<!-- Inner-Banner -->
<section id="listing_banner" class="parallex-bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<div class="search_form">
            	<form action="<?=base_url('listing_map/index') ?>" method="get">
                <div class="form-group">
                    <div class="select">
                        <select  name="cat"  class="form-control">
                	    	<option>Que cherchez-vous ? </option>
            	             <?php foreach ($cats as $cat) {?>
                	    	  <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                             <?php } ?>
	                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Locaton" id="recherche">
                </div>
                <div class="btn_group">
                    <input type="submit" value="Search" class="btn btn-block">
                </div>
            </form>
            
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Inner-Banner -->

<!-- Listings -->
<section id="inner_pages">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<div class="listing_header">
                    <h5><?php if($cat) {echo  $cat['name'] ;}else{ 'Tous les entreprise'; }?></h5>
                    
                    <div class="layout-switcher">
                        <a id="grid" onclick="gridshow();" class="active"><i class="fa fa-th"></i></a>
                        <a id="slid" onclick="listshow();"><i class="fa fa-align-justify"></i></a>
                    </div>
                </div>
                <div class="row">
				 
					
		 <?php if (isset($results) && is_array($results)) {?>
		 <?php foreach ($results as $result) {?>
		 
	        <div id="coln<?php echo $result['id'] ?>" class="col-md-6 grid_col show_listing">
            	<div class="items-list listing_wrap" data-post-id="1">
                    <div class="listing_img">
      
                         <div class="listing_cate"  >
                            <span class="cate_icon"><a href="#"><img src="<?php echo base_url('assets/images/'.$result['photo']) ; ?>" alt="icon-img"></a></span> 
                         </div>
          <a href="<?=base_url('/Listing_detail/index/'.$result['id']) ?>"><img src="<?php echo base_url('assets/images/entreprises/'.$result['photo']) ?>" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="<?=base_url('listing_map/index?cat='.$result['Eta_categories']) ?>"><?php echo $result['Eta_categories'] ?></a>
                        </div>
                        <h4><a href="<?=base_url('/Listing_detail/index/'.$result['id']) ?>"><?php echo $result['name'] ?></a></h4>
                        <p><?php echo $result['name'] ?>.</p>
                         
                    </div>
                </div>
            </div>
			
		 <?php } } else { ?> 
                   <div class="fan_facts gray_bg">
        	<div class="section-header text-center">
    	    	<h3>Il n'y a pas d'offre pour cette catégorie</h3>
	            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab 
                illo inventore veritatis et quasi architecto.</p>
            </div> 
            </div> 
		 <?php } ?>  
                </div>
                
                <nav class="pagination_nav">
                  
                 
               
                </nav>
                
            </div>
        	
            <div class="col-md-4">
            	<div class="sidebar_widgets">	
                	<a href="#"><img src="<?=base_url('assets/images/ad_350x350.jpg') ?>" alt="image"></a>
                </div>
                
                <div class="sidebar_widgets">
                	<div class="ads_col">
                    	<a href="#"><img src="<?=base_url('assets/images/ad_here.jpg') ?>" alt="image"></a>
                    </div>
                    <div class="ads_col">
                    	<a href="#"><img src="<?=base_url('assets/images/ad_here.jpg') ?>" alt="image"></a>
                    </div>
                </div>
            </div>
        </div>
    	
		
    </div>
</section>
<!-- /Listings -->

<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
<script>

function listshow () {
 <?php if($results){
 foreach ($results as $result) {?>
    $('#grid').removeClass('active');
	$('#coln<?php echo $result['id']?>').removeClass('col-md-6');
	$('#coln<?php echo $result['id']?>').removeClass('grid_col');
	$('#coln<?php echo $result['id']?>').addClass('listview_sidebar');
	
	$('#slid').addClass('active');
	
 <?php }  }?>
}

function gridshow () {
 <?php if($results){
	 foreach ($results as $result) {?>
	$('#coln<?php echo $result['id']?>').removeClass('listview_sidebar');
	$('#coln<?php echo $result['id']?>').addClass('grid_col');
	$('#coln<?php echo $result['id']?>').addClass('col-md-6');
	$('#grid').addClass('active');
	$('#slid').removeClass('active');
	
 <?php }} ?>
}
 
 
function al(){ 
		   
  swal({
  title: "Connectez-vous ",
  text: "pour terminer le processus  ",
  icon: "warning",
  buttons: [" Cansel", " Connecter"],
 
  
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace("<?=base_url('login/'); ?>" );
  } else {
    
  }
});
}
 
</script>