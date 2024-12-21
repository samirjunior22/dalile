 	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/style.css"> <!-- Resource style -->
	<script src="<?php echo site_url('assets/filter-master/');?>js/modernizr.js"></script> <!-- Modernizr -->
<style>
 @media (max-width: 768px) {
.cd-gallery li {
	width: 100%;
 }
 }
.mix{
	  overflow: hidden;
	
}
.cont {
  position: relative;
  float: left;
  margin-right: 50px;
  width: 100%;
  height:200px;
  overflow: hidden;
 
}
img.landscape {
  position: absolute;
  width: auto;
  height: 100%;
  transform: translate(-50%, 0);
  left: 50%;
}
img.portrait {
  position: absolute;
  width: 100%;
  height: auto;
  transform: translate(0, -50%);
  top: 50%;
}
</style>	
  <?php 
 
 $soucats = getSouCategoryData();
 
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
					 scaledSize: new google.maps.Size(40, 40)
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
<section id="inner_pages" style="padding-top:50px;">
 
	<header class="cd-header">
	 </header>
   <main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					<li class="filter"><a  href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&souCat='.$GsouCat.'&style=content') ?>" data-type="all">All</a></li>
					<li class="filter" data-filter=".Service"><a   href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&souCat='.$GsouCat.'&style=content') ?>" data-type="Service">List</a></li>
					<li class="filter" data-filter=".Pratique"><a  class="selected"  href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&souCat='.$GsouCat.'&style=map') ?>" data-type="Pratique">Map</a></li>
				 </ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery" style="padding: 0;">
		<div id="map-container" class="fullwidth-home-map" style="z-index: 0;">
  
		 <div id="map" >
         </div>
       
    </div>
			<div class="cd-fail-message">Aucun résultat trouvé</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form action="<?=base_url('pages/detail'); ?>">
				<div class="cd-filter-block">
					<h4>Mot clé</h4>
					
					<div class="cd-filter-content">
						<input type="search" name="title" placeholder="Mot clé">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
            <!--   <div class="cd-filter-block">
					<h4> Prix </h4>
                      <div class="cd-filter-content">
					  
					   <input type="text" name="maximum_range" id="maximum_range" class="form-control" value="1500" />
                     </div>
				</div>  -->

				<div class="cd-filter-block">
					<h4>localisation</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="wilaya" id="wilaya">
							 <option  value="">Selection Wilaya</option>
							 <?php foreach ($wilaya as $w) {?>
                 	    	    <option  value="<?php echo $w['id']?>"><?php echo $w['id'].' - '.$w['name']?></option>
                         <?php } ?>
							 </select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
               <div class="cd-filter-block">
					<h4>Catégorie</h4>
					 <div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="catid" id="ctid">
							   <option  value="">Selectionner Catégorie</option>
							<?php foreach ($cats as $cat) {?>
                	    	      <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php } ?>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				  <div class="cd-filter-block">
					<h4>Afficher Tous</h4>
					 	 <div class="cd-filter-content">
						<div class="cd-select cd-filters">
						 	<select class="filter" name="souCat" id="id">
							       <option  value="">Selectionner</option>
								<?php foreach ($soucats as $cat) {?>
                	    	      <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php } ?>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				<input type="hidden" name="style" value="<?php echo $style ;?>" >
				     <button type="submit"   class="btn btn-default" >filtrer</button>
			</form>
         
			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
<script src="<?php echo site_url('assets/filter-master/');?>js/jquery-2.1.1.js"></script>
<script src="<?php echo site_url('assets/filter-master/');?>js/jquery.mixitup.min.js"></script>
<script src="<?php echo site_url('assets/filter-master/');?>js/main.js"></script> <!-- Resource jQuery -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</section>

<script>
$( "#price_range" ).slider({
		range: true,
		min: 1000,
		max: 20000,
		values: [ 200, 1000 ],
		slide:function(event, ui){
			$("#minimum_range").val(ui.values[0]);
			$("#maximum_range").val(ui.values[1]);
			load_product(ui.values[0], ui.values[1]);
		}
	});
	
	$(window).load(function() {
    $('.container').find('img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    })
})
</script>
 