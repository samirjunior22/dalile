<style>

/* more link */
.more{
    color: blue;
    text-decoration: none;
    letter-spacing: 1px;
    font-size: 16px;
}

.like , h4{
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

<section id="intro_map" class="section-padding intro_map_style2" >
	<div id="map-container" class="fullwidth-home-map">
    	<div id="map" >
        </div>
        <div class="intro_search">
        	<div class="intro_search_content">
            	<h4>Trouvez les professionnels de votre Ville</h4>
			 
            	<div class="search_form">  
			
                    <form id="formsearch">
                        
                        <div class="form-group select">
                   		<select id="cat" name="cat" class="form-control">
				     <option value='' >Que cherchez-vous?</option>
						<?php foreach ($cats as $cat) {?>
 <?php if($categ['id']== $cat['id']){ echo '<option value="'.$categ['id'].'" selected >'.$categ['name'].'</option>' ;} ?>					 
                	    	 <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                         <?php } ?>
	                    </select>
                    </div>
					 <div class="form-group select">
                       <select id="wil" name="wilaya" class="form-control">
			           <option value='' >City</option>
				   <?php foreach ($wilaya as $w) {?>
 <?php if($wilsel['id'] == $w['id']){ echo '<option value="'.$wilsel['id'].'" selected >'.$wilsel['name'].'</option>' ;} ?>	
                	    	 <option  value="<?php echo $w['id']?>"><?php echo  $w['id'].' - '.$w['name']?></option>
                         <?php } ?>
	                    </select>
						 </div>
                        <div class="form-group search_btn">
                            <input type="submit" value="Trouver" class="btn btn-block">
                        </div>
                    </form>
				 </div>
            </div>
        	
        </div>
        
        
	</div>
</section>
<!-- /Map -->
 
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
var baseurl = '<?php echo base_url(); ?>';
 function initialize() {
	 markerOptions = {styles: [{
     height: 60,
     url: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m2.png",
     width: 60,
	 textSize : 17
     }]};  
 var center = new google.maps.LatLng(<?php echo $marker['lat'].','.$marker['lng']?>);
  
       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: <?php echo $marker['center'] ;?>,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
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
  url: isIE11 ? baseurl+"assets/images/markers/png/"+dataPhoto.icon : baseurl+"assets/images/markers/png/"+dataPhoto.icon,
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
  
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
  
   
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