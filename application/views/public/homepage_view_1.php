<style>

/* more link */
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
	 if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
			  };
	 
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
            map.setCenter(pos);
            map.setZoom(14);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
           
          handleLocationError(false, infoWindow, map.getCenter());
        }

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
   
     var center = new google.maps.LatLng(<?php echo $marker['lat'].','.$marker['lng']?>);
     var map = new google.maps.Map(document.getElementById('map'), {
           zoom: <?php echo $marker['center'] ;?>,
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
	 
	for(key in data) {
	 var infoWindow = new google.maps.InfoWindow(), marker, i;	
          if(data.hasOwnProperty(key)) {
            count++;
          }
         };
		 
 for (var i = 0; i <count; i++) {
          var dataPhoto = data[i];
          var latLng = new google.maps.LatLng(dataPhoto.lat,dataPhoto.lng);
            marker = new google.maps.Marker({
             position: latLng , 
		     icon : {
					 url: isIE11 ? "<?php echo base_url(); ?>assets/images/markers/png/"+dataPhoto.icon : "<?php echo base_url(); ?>assets/images/markers/png/"+dataPhoto.icon,
					 scaledSize: new google.maps.Size(70, 70)
					 },
			 animation: google.maps.Animation.DROP, 
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
		  
     var markerCluster = new MarkerClusterer(map, markers , markerOptions); 
	   
  }

 google.maps.event.addDomListener(window, 'load', initialize);
  
 </script> 
<!-- Map -->
<section id="intro_map" class="section-padding">
	<div id="map-container" class="fullwidth-home-map">
     <div id="map" >
        </div>
	  <div class="container">
    	<div class="search_form">
            	<form action="<?=base_url('welcome/index/1') ; ?>" method="get">
                	<div class="form-group select">
                   		<select id="cat" name="cat" class="form-control">
				     <option value='' >Que cherchez-vous?</option>
						<?php foreach ($cats as $cat) {?>
 <?php if($categ['id']== $cat['id']){ echo '<option value="'.$categ['id'].'" selected >'.$categ['name'].'</option>' ;} ?>					 
                	    	 <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                         <?php } ?>
	                    </select>
                    </div>
                    <div class="form-group">
                   	    <select id="wil" name="wilaya" class="form-control">
			           <option value='' >City</option>
				   <?php foreach ($wilaya as $w) {?>
 <?php if($wilsel['id'] == $w['id']){ echo '<option value="'.$wilsel['id'].'" selected >'.$wilsel['name'].'</option>' ;} ?>	
                	    	 <option  value="<?php echo $w['id']?>"><?php echo $w['name']?></option>
                         <?php } ?>
	                    </select>
                    </div>
                    <div class="form-group search_btn">
                    	<input type="submit" value="Search" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
	</div>
</section>
<!-- /Map -->

<!-- Category-Slider-Style-2 -->
<section id="listing_category" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Qu'est-ce qui vous intéresse?</h2>
            <p>Vous pouvez choisir parmi l'une des catégories rapides, 
			chaque catégorie vous indique la quantité de service qu'elle contient ou vous pouvez effectuer une recherche dans la liste.</p>
        </div>
    	<div id="category_slider2">
        	<div class="owl-carousel owl-theme">
			<?php foreach ($cats as $cat) {?>
            	<div class="item" style="background-image:url(<?=base_url('assets/images/'.$cat['color']); ?>);">
                	<a href="<?=base_url('listing_map/index?cat='.$cat['id']) ; ?>">
    	            	<div class="category_icon">
                        	<span class="category_listing_n"><?php echo countListingCat($cat['id']) ; ?></span>
                            <img src="<?=base_url('assets/images/'.$cat['icon']); ?>" alt="image">
                        </div>
	                    <p><?php echo $cat['name']?></p>
                    </a>
                </div>
              <?php } ?>  
            </div>
        </div>        
    </div>
</section>
<!-- /Category-Slider-Style-2 -->

<!-- How-it-Work -->
<section id="how_it_work" class="section-padding parallex-bg">
	<div class="container">
    	<div class="section-header text-center white-text div_zindex">
        	<h2>Trouvez rapide et facile</h2>
            <p>Comment vous pouvez rechercher  ce que vous  avez besoin et comment trouver ce que vous cherchez rapidement et gratuitement,
			tous les services sont disponibles sur le site</p>
        </div>
        
        <div class="row">
        	<div class="col-md-4">
            	<div class="steps_wrap">
                	<div class="icon_div">
                    	<i class="fa fa-map-marker"></i>
                    </div>
                	<h5>Choisissez un emplacement</h5>
                    <p>Services dans tous les Wilaya </p>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="steps_wrap">
                	<div class="icon_div">
                    	<i class="fa fa-location-arrow"></i>
                    </div>
                	<h5>Choisissez une catégorie</h5>
                    <p>Services dans tous les domaines </p>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="steps_wrap">
                	<div class="icon_div">
                    	<i class="fa fa-smile-o"></i>
                    </div>
                	<h5>Trouvez ce que vous voulez</h5>
                    <p>Rapide et gratuit</p>
                </div>
            </div>
        </div>
    </div>
	<div class="dark-overlay"></div>
</section>
<!-- /How-it-Work -->

 <!-- Popular-Listings -->
<section id="popular_listings" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Annonces exclusives populaires</h2>
            <p>Emergez sur Internet pour accélérer votre business</p>
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
              <span class="cate_icon"><a href="#"><img src="<?php echo base_url('assets/images/'.$exclusive['icon']) ; ?>" alt="icon-img"></a></span> 
             </div>
          <a href="<?=base_url('/Listing_detail/index/'.$exclusive['id']) ?>"><img src="<?php echo base_url('assets/images/listings/'.$exclusive['photo']) ?>" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="#">Restaurant</a>
                        </div>
                        <h4><a href="<?=base_url('/Listing_detail/index/'.$exclusive['id']) ?>"><?php echo $exclusive['Title'] ?></a></h4>
                        <p><?php echo $exclusive['Tag_Line'] ?></p>
                        <div class="listing_review_info">
                           <p><span class="review_score"><?php echo number_format($exclusive['rating'], 2) ?> /5</span> 
                               <?php	for($i = 1; $i <= 5; $i++){
									  if($i <= $exclusive['rating']){ ?>
							           <i class="fa fa-star active"></i>
									<?php } else { ?>
						                <i class="fa fa-star"></i> 
						             <?php } } ?>
                               (<?php echo $exclusive['totals'] ?>. Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i>  <?php echo $exclusive['wilaya'] ?></p>
                        </div>
                    </div>
                </div>
				
			<?php } ?>
            </div>
        </div>
             
    </div>
</section>
<!-- /Popular-Listings -->
 

<script>
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
</script>
<script>
 

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