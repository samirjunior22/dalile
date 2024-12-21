<style>
 
.more{
    color: blue;
    text-decoration: none;
    letter-spacing: 1px;
    font-size: 16px;
}

.like {
color:#38ccff; }
.jaime  {
	 cursor: pointer;
}
.favoris  {
	 cursor: pointer;
}
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
	<script src="<?=base_url() ;?>assets/Trunk/js/modernizr.js"></script>
<?php
if($this->session->userdata('v_user_id') != 0) {  
   $userid = $this->session->userdata('v_user_id') ; 
}else { 
	$userid = 0 ; 
}
 ?>
<!-- Banner -->
<section id="banner" class="parallex-bg section-padding">
	<div class="container">
    	<div class="intro_text white-text div_zindex">
    		<span style="    font-size: 4.2rem;    text-shadow: 0 2px 0 rgba(0,0,0,.5);">Bonsoir,</span>
	        <span style="    font-size: 4.2rem;    text-shadow: 0 2px 0 rgba(0,0,0,.5);">que recherchez-vous ?</span>
            <div class="search_form  " style="width: 83%;" >
            		<div class=" col-md-12" >
		  <form class="form-search"  method="get" action="<?=base_url('/pages/detail/'); ?>">
                	<div class=" col-md-8" style="margin:auto;" >
					  
                           <div class="input-append" >
                              <input type="text"  id="title" name="title"  class="searchTerm" placeholder="De quoi avez-vous besoin ?" >
                               <input type="hidden" id="id" name="id" placeholder="Recherche" />
                             <input type="hidden" id="search" name="search" value="top"/>
                             <input type="hidden" id="table" name="table" />
                           </div> 
					 
                     </div>
                    <div class="form-group search_btn " style="width:30%;">
                    	<input type="submit" value="Search" class="btn btn-block" style="height:60px;">
                    </div>
                  </form>
				  </div>
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banner -->

<!-- Category-Slider -->
<section id="all_category" class="gray_bg">
	<div class="container">
    	<div id="category_slider">
        	<div class="owl-carousel owl-theme">
			
			<?php foreach ($cats as $cat) {?>
			
            	<div class="item">
                	<a href="<?=SITE_URL ?>listing_map/index?cat=<?php echo  $cat['id']  ; ?>">
    	            	<div class="category_icon">
                           <img src="<?php echo base_url('assets/images/'.$cat['icon']) ; ?>" >
                        </div>
	                    <p> <?php echo $cat['name']?></p>
                    </a>
                </div>
               
			<?php } ?>
            
            </div>
        </div>        
    </div>
</section>
 
<section id="inner_pages">
	<div class="container">
	  <div class="row">
        	<div class="col-sm-3 col-md-3">
               <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/25.jpg">
                    <div class="city_listings_info">
                    	<h4>Oran</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('25') ?> Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=25'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
            	 <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/22.jpg">
                    <div class="city_listings_info">
                    	<h4>Sidi Bel Abbes</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('22') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=22'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
               <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/16.jpg">
                    <div class="city_listings_info">
                    	<h4>Alger</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('16') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=16'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
                <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/25.jpg">
                    <div class="city_listings_info">
                    	<h4>Costantine</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('31') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=31'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
            	<div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/13.jpg">
                    <div class="city_listings_info">
                    	<h4>Telemcen</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('13') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=13'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
               	<div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/5.jpg">
                    <div class="city_listings_info">
                    	<h4>Bejaia</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('5') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=5'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
              <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/19.jpg">
                    <div class="city_listings_info">
                    	<h4>Sétif</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('19') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=19'); ?>" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-3 col-md-3">
              <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/city/23.jpg">
                    <div class="city_listings_info"  >
                    	<h4>Annaba</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('23') ?>  Services</span> </div>
                    </div>
                    <a href="<?=base_url('/listing_map/index?cat=&wilaya=23'); ?>" class="overlay_link"></a>
                </div>
            </div>
        </div>
		 
 
<!-- /How-it-work -->
        <div class="text-center">
        	<a href="<?=base_url('/pages/city'); ?>" class="btn">Voir plus de villes</a>
        </div>
    </div>
</section>
<!-- /Popular Cities/Towns -->

<!-- About-us -->
<section id="about_info" class="section-padding">
	<div class="container">
    	<div class="row">
        	<div class="col-md-5 col-md-offset-7">
            	<div class="white_box">
                    <h3>Gagnez du temps et des tracas. Laissez-nous trouver rapide et facile</h3>
                    <p>El dalile vous apporte des réponses et des informations pratiques pour vous guider.</p>
                    <a href="<?=base_url('/pricing') ; ?>" class="btn">Commencez maintenant !</a>
                </div>
            </div>
        </div>
    	
	</div>
</section>
<!-- /About-us -->

<!-- Popular-Listings -->
<section id="popular_listings" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Annonces exclusives populaires</h2>
            <p> .</p>
        </div>   
        
        <div id="popular_listing_slider">
        	<div class="owl-carousel owl-theme">
            	 
            <?php foreach($exclusives as $exclusive) {?>     
                <div class="listing_wrap">
                    <div class="listing_img">
                        
						 
  <?php if($userid != 0) { 
  
 if(Checking_like($exclusive['id'] , $userid , 'Favoris') == 1 ){  
  echo '<span onclick="favor('.$exclusive['id'].')" id="spf_'.$exclusive['id'].'" value="0" class="like_post posLikefill"><i class="fa fa-bookmark-o"></i></span>'; }else {
  echo '<span onclick="favor('.$exclusive['id'].')" id="spf_'.$exclusive['id'].'" value="1" class="like_post"><i class="fa fa-bookmark-o"></i></span>'; }
	  
  if(Checking_like($exclusive['id'] , $userid, 'type') == 1 ){  
 echo '<span onclick="like('.$exclusive['id'].')" id="sp_'.$exclusive['id'].'" lis="'.$exclusive['id'].'" value="0" class="posLike  posLikefill"><i class="fa fa-heart-o"></i></span>'; }else {
 echo '<span onclick="like('.$exclusive['id'].')" id="sp_'.$exclusive['id'].'" lis="'.$exclusive['id'].'" value="1" class="posLike "><i class="fa fa-heart-o"></i></span>'; }
		 } else {

  echo '   <span onclick="al()" value="1" class="posLike"><i class="fa fa-heart-o"></i></span>'; 
  echo '   <span onclick="al()" class="like_post "><i class="fa fa-bookmark-o"></i></span>';
  
  }?>
		          
			<div class="listing_cate"  >
  <span class="cate_icon"><a href="#"><img src="<?php echo base_url('assets/images/'.$exclusive['icon']) ; ?>"  alt="icon-img"></a></span> 
             </div>
          <a href="<?=base_url('/Listing_detail/index/'.$exclusive['id']) ?>"><img   src="<?php echo base_url('assets/images/listings/'.$exclusive['photo']) ?>"  alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                         <a href="<?=base_url('/listing_map/index?cat='.$exclusive['Category_id']) ?>"><?php echo $exclusive['Category'] ?></a>
                        </div>
                        <h4><a href="<?=base_url('/Listing_detail/index/'.$exclusive['id']) ?>"><?php echo  $exclusive['Title'] ; ?></a></h4>
                        <p><?php echo $exclusive['Tag_Line']  ?>.</p>
                        
                        <div class="listing_review_info">
                            <p><span class="review_score"><?php echo number_format($exclusive['rating'], 2) ?> /5</span> 
                               <?php	for($i = 1; $i <= 5; $i++){
									  if($i <= $exclusive['rating']){ ?>
							           <i class="fa fa-star active"></i>
									<?php } else { ?>
						                <i class="fa fa-star"></i> 
						             <?php } } ?>
                               (<?php echo $exclusive['totals'] ?>. Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> <?php echo $exclusive['wilaya'] ?></p>
                        </div>
                    </div>
                </div>
				
			<?php } ?>
            </div>
        </div>
             
    </div>
</section>
 

<script type="text/javascript">
$(document).ready(function(){

    // like and unlike click
 $(".like, .unlike").click(function(){
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid

        // Finding click type
        var type = 0;
        if (text == "like"){
            type = 1;
        }else{
            type = 2;
        }
		var userid = $(".like").attr('rat'); 

        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/1')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#spanl"+postid).text(likes);        // setting likes
                $("#spanu"+postid).text(unlikes);    // setting unlikes

                if(type == 1){
                    $("#like_"+postid).css("color","#38ccff");
					$("#unlike_"+postid).css("color","#888");
                    $("#spanl"+postid).css("color","#38ccff");
                    $("#spanu"+postid).css("color","#888"); 
                }

                if(type == 2){
                    $("#unlike_"+postid).css("color","#38ccff");
					$("#like_"+postid).css("color","#888");
                    $("#spanu"+postid).css("color","#38ccff");
                    $("#spanl"+postid).css("color","#888");
                } 
              
            }
        });

    });
 });

  function like(id) {
	 // like and unlike click
        var postid = id;  // postid
         
        var type = $('#sp_'+id).attr("value") ;
        var userid = ' <?php echo $userid ?>';

        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/2')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){
				
				var likes = data['likes'];
                var typeU = data['type'];
			    $("#ttljaime").text(likes+' J\'aime '); 
				 
				if (typeU == 1 ) {
					
                $("#sp_"+postid).addClass("posLikefill");
                $("#sp_"+postid).attr("value", '0');
				 
				   }else { 
			           $("#sp_"+postid).removeClass("posLikefill");
                       $("#sp_"+postid).attr("value", '1');
					   
				  } 
            }
        });
 
 }
 
  
 function favor(id) {
	 // like and unlike click
        var postid = id;  // postid 
        var type = $('#spf_'+id).attr("value") ;
        var userid = ' <?php echo $userid ?>'; 
        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/3')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){
				
				var likes = data['likes'];
                var typeU = data['type'];
				 
				if (typeU == 1 ) {
					
                $("#spf_"+postid).addClass("posLikefill");
                $("#spf_"+postid).attr("value", '0');
				  
                     } else {
			        $("#spf_"+postid).removeClass("posLikefill");
                    $("#spf_"+postid).attr("value", '1');
					  
				  } 
              }
         }); 
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

$("form#submit input").on('keypress',function(event) {
  event.preventDefault();
  if (event.which === 13) {
    $('button.submit').trigger('click');
  }
});
</script>
<script type="text/javascript"> 

    $(document).ready(function(){
    	$('#get').on('click', function(){
    		var data = "";
    		 $.ajax({
    			url: "https://geoip-db.com/jsonp",
    			jsonpCallback: "callback",
    			dataType: "jsonp",
    			success: function(location) {
    				 
                $('#location').val(location.state);
     
    			}
    		});     
    	});
    });
</script>

<script src="<?=base_url() ;?>assets/Trunk/js/jquery.menu-aim.js"></script> <!-- menu aim -->
<script src="<?=base_url() ;?>assets/Trunk/js/main.js"></script> <!-- Resource jQuery -->