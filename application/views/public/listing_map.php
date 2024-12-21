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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdI0GSQlVslIEcOTXlbsJ2Lm9lBVy0o3g"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/src/markerclusterer.js"></script>
  <script src="<?php echo base_url(); ?>assets/maps/modernizr.js"></script>
 <script type="text/javascript">
 var baseurl = '<?php echo base_url(); ?>';
  desktopScreen = Modernizr.mq( "only screen and (min-width:1024px)" ),
				zoom = desktopScreen ? 18 : 17,
				scrollable = draggable = !Modernizr.hiddenscroll || desktopScreen,
				isIE11 = !!(navigator.userAgent.match(/Trident/) && navigator.userAgent.match(/rv[ :]11/));
 
var markers = []; 
var key, count  = 0; 
var marker ;

 function initialize() {
	 markerOptions = {styles: [{
     height: 60,
     url: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m2.png",
     width: 60,
	 textSize : 17
     }]}; 
   
       var center = new google.maps.LatLng(<?php echo $marker['lat'].','.$marker['lng']?>);
  
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: <?php echo $marker['center'] ?>,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		  styles: [
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.business",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  }
]
        });
		
		
	 var data =  <?php echo $cord ; ?> ;
	 
	for(key in data.mark) {
	 var infoWindow = new google.maps.InfoWindow(), marker, i;	
          if(data.mark.hasOwnProperty(key)) {
            count++;
          }
         };
		 
 for (var i = 0; i <count; i++) {
          var dataPhoto = data.mark[i];
          var latLng = new google.maps.LatLng(dataPhoto.lat,dataPhoto.lng);
            marker = new google.maps.Marker({
             position: latLng , 
		     icon : { 
  url: isIE11 ? baseurl+"assets/images/markers/png/"+dataPhoto.icon : baseurl+"assets/images/markers/png/"+dataPhoto.icon,
					 scaledSize: new google.maps.Size(70, 70)
					 },
			 animation: google.maps.Animation.DROP,
			 title : 'asa',
              map: map,
		   });
	  (function (marker, dataPhoto) {
                google.maps.event.addListener(marker, "click", function (e) {
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    infoWindow.setContent(dataPhoto.infowindow_content);
                    infoWindow.open(map, marker);
                });
         })(marker, dataPhoto);
       
	   markers.push(marker);
      } 
	 
	   
  }

 google.maps.event.addDomListener(window, 'load', initialize);
 
 
  

 </script> 
<section id="ElemoListing_with_map" style="padding-top:80px;">
	<div class="ElemoListing_map">
    	<div id="map-container">
		 <div id="map" >
         </div>
       </div>
    </div>
	<div class="search_wrap">
    	<div class="search_form">
            <form method="get">
                <div class="form-group">
                    <div class="select">
                        <select name="cat" class="form-control">
                	    <option value=''>Que cherchez-vous ? </option>
            	             <?php foreach ($cats as $cat) {?>
  <?php if($cat['id'] == $categ['id']){ echo '<option value="'.$categ['id'].'" selected >'.$cat['name'].'</option>' ;} ?>	
                	    	   <option name="cat" value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                             <?php } ?>
	                    </select>
                    </div>
                </div>
                 <div class="form-group select">
                       <select id="wil" name="wilaya" class="form-control">
			           <option value='' >City</option>
				   <?php foreach ($wilaya as $w) {?>
 <?php if(isset($wilsel) && $wilsel['id'] == $w['id']){ echo '<option value="'.$wilsel['id'].'" selected >'.$wilsel['name'].'</option>' ;} ?>	
                	    	 <option  value="<?php echo $w['id']?>"><?php echo $w['id'].' - '.$w['name']?></option>
                         <?php } ?>
	                    </select>
				 </div>
			   <div class="btn_group">
                    <input type="submit" value="Trouver" class="btn btn-block">
                </div>
            </form>
        </div>
    </div>
    
	<div class="container">
    	<div class="listing_header">
        	<h5> Offres de Services </h5>
           
            <div class="layout-switcher">
                <a id="grid" onclick="gridshow();" ><i class="fa fa-th"></i></a>
                 <a id="slid" onclick="listshow();" class="active"><i class="fa fa-align-justify"></i></a>
            </div>
        </div>
        
        <div class="row">
		
  <?php

if($results) {
  foreach ($results as $result) {?>
		 
	        <div id="coln<?php echo $result['id'] ?>" class="listview_sidebar show_listing">
            	<div class="items-list listing_wrap" data-post-id="1">
                    <div class="listing_img">
     
 <?php if($userid != 0) {
		
  if(Checking_like($result['id'] , $userid , 'Favoris') == 1 ){  
  echo '<span onclick="favor('.$result['id'].')" id="spf_'.$result['id'].'" lis="'.$result['id'].'" value="0" class="like_post posLikefill"><i class="fa fa-bookmark-o"></i></span>'; }else {
  echo '<span onclick="favor('.$result['id'].')" id="spf_'.$result['id'].'" lis="'.$result['id'].'" value="1" class="like_post"><i class="fa fa-bookmark-o"></i></span>'; }
		
	 
  if(Checking_like($result['id'] , $userid , 'type') == 1 ){  
  echo '<span onclick="like('.$result['id'].')" id="sp_'.$result['id'].'" lis="'.$result['id'].'" value="0" class="posLike  posLikefill"><i class="fa fa-heart-o"></i></span>'; }else {
  echo '<span onclick="like('.$result['id'].')" id="sp_'.$result['id'].'" lis="'.$result['id'].'" value="1" class="posLike"><i class="fa fa-heart-o"></i></span>'; }
          
		  }else {
				
		  echo '<span onclick="al()"    value="1" class="posLike"><i class="fa fa-heart-o"></i></span>  
		        <span onclick="al()" class="like_post  "><i class="fa fa-bookmark-o"></i></span> ' ; } ?>
                         <div class="listing_cate"  >
                            <span class="cate_icon"><a href="#"><img src="<?php echo base_url('assets/images/'.$result['icon']) ; ?>" alt="icon-img"></a></span> 
                         </div>
          <a href="<?=base_url('/Listing_detail/index/'.$result['id']) ?>"><img src="<?php echo base_url('assets/images/listings/'.$result['photo']) ?>" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="#"><?php echo $result['Category'] ?></a>
                        </div>
                    <h4><a href="<?=base_url('/Listing_detail/index/'.$result['id']) ?>"><?php echo $result['Title'] ?></a></h4>
                        <p><?php echo $result['Tag_Line'] ?>.</p>
                        
                        <div class="listing_review_info">
                            <p><span class="review_score"><?php echo number_format($result['rating'], 2) ?> /5</span> 
                               <?php	for($i = 1; $i <= 5; $i++){
									  if($i <= $result['rating']){ ?>
							           <i class="fa fa-star active"></i>
									<?php } else { ?>
						                <i class="fa fa-star"></i> 
						             <?php } } ?>
                               (<?php echo $result['totals'] ?>.  views) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> <?php echo $result['wilaya'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
			
<?php } } else { ?> 
                   <div class="fan_facts gray_bg">
        	<div class="section-header text-center">
    	    	<h3>Il n'y a pas d'offre pour cette catégorie</h3>
	            <p>Désolé, rien ne correspond à vos critères de recherche. Veuillez réessayer avec des mots-clés différents.</p>
            </div> 
            </div> 
		 <?php } ?>  
        </div>
         <ul class="pagination pull-right">
                        <!-- Show pagination links -->
                        <?php
                        foreach ($links as $link) {
                            echo "<li>" . $link . "</li>";
                        }
                        ?>
           </ul>
    </div>
</section>
<!-- /Listings -->
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
				 
				if (typeU == 1 ) {
					
                $("#sp_"+postid).addClass("posLikefill");
                $("#sp_"+postid).attr("value", '0');
                   
				  }   else {
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
                   
				  }   else {
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
 
</script>