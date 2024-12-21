

<section id="intro_map" class="section-padding intro_map_style2" >
	<div id="map-container" class="fullwidth-home-map">
    	<div id="map" >
        </div>
        <div class="intro_search">
        	<div class="intro_search_content">
            	<h2>Etablissements</h2>
			 
            	<div class="search_form">  
			
                    <form id="formsearch">
                        
                  <div class="form-group select">
                    <select id="cat" name="cat" class="form-control">
				       
						<?php foreach ($cats as $category) {?>
 <?php if($cat['id']== $category['id']){ echo '<option value="'.$category['id'].'" selected >'.$category['name'].'</option>' ;}else {
	 
	 echo  '<option  value="'.$category['id'].'">'.$category['name'].'</option>' ;
 } ?>					 
                	    	
                         <?php } ?>
	                 </select>
                    </div>
				  <div class="form-group select">
			       <select class="form-control"id='sel_souC' name="sou_category">
                 <?php if($sou_category)  { echo '<option  value="'.$sou_category['id'].'">'.$sou_category['name'].'</option> ' ; }?>
                   </select>
				  </div>
					  <div class="form-group select">
                       <select id="wil" name="wilaya" class="form-control">
			           <option value='' >City</option>
				   <?php foreach ($wilaya as $w) {?>
 <?php if($wilsel['id'] == $w['id']){ echo '<option value="'.$wilsel['id'].'" selected >'.$wilsel['name'].'</option>' ;} ?>	
                	    	 <option  value="<?php echo $w['id']?>"><?php echo $w['name']?></option>
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
<!-- Popular-Cities/Towns -->
<!-- Popular-Cities/Towns -->
<section id="popular_cities" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Villes les plus populaires</h2>
            <p> .</p>
        </div>
        
        <div class="row">
        	<div class="col-sm-6 col-md-3">
               <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/oran.jpg">
                    <div class="city_listings_info">
                    	<h4>Oran</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('31') ?> Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
            	 <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/sba.jpg">
                    <div class="city_listings_info">
                    	<h4>Sidi Bel Abbes</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('22') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
               <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/alger.jpg">
                    <div class="city_listings_info">
                    	<h4>Alger</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('16') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
                <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/costan.jpg">
                    <div class="city_listings_info">
                    	<h4>Costantine</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('31') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
            	<div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/telemcen.jpg">
                    <div class="city_listings_info">
                    	<h4>Telemcen</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('13') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
               	<div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/bejaia.jpg">
                    <div class="city_listings_info">
                    	<h4>Bejaia</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('5') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
              <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/stif.jpg">
                    <div class="city_listings_info">
                    	<h4>Sétif</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('19') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
              <div class="cities_list seattle lozad-background"  data-background-image="<?php echo base_url();?>assets/images/annaba.jpg">
                    <div class="city_listings_info"  >
                    	<h4>Annaba</h4>
                        <div class="listing_number"><span><?php echo getLByWilaya('23') ?>  Services</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
        </div>
        <div class="text-center">
        	<a href="#" class="btn">Voir plus de villes</a>
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
  
 // select sou category	
	  $('#cat').change(function(){
	 
      var id = $(this).val();

      // AJAX request
      $.ajax({
        url: 'Etablissement/getSouCatByCat/'+id,
        method: 'post', 
        dataType: 'json',
        success: function(response){

          $('#sel_souC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#sel_souC').append('<option value="'+data['id']+'">'+data['name']+'</option>');
          });
        } 
     }); 
   }); 
 </script> 
  
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 