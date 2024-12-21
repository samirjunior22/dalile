<?php defined('BASEPATH') OR exit('No direct script access allowed');?> 
 <style>
 
      #map {
        height: 100%;
		right:0;
      }
      
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
    </style>
  <style>
 
    #panel {
      height: 100%;
     width: 100%;
      background-color: white;
      
      z-index: 1;
      overflow-x: hidden;
      transition: all .2s ease-out;
    }
 
    .hero {
       width: 60%;
       height: auto;
       display: block;
    }

    .place,
    p {
      font-family: 'open sans', arial, sans-serif;
      padding-left: 18px;
      padding-right: 18px;
    }
  .details {
      color: darkslategrey;
    }
   a {
      text-decoration: none;
      color: cadetblue;
    }
  </style>
</head>

 <div class="content-wrapper">
 
  <section class="content-header">
    <h1>
      Manage
      <small>Listing</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Listing</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
 <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('errors')): ?>
		 <div class="row">
			<div class="col-md-12">
            	<div class="notification alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <p>  <?php echo $this->session->flashdata('errors'); ?></p>
                </div>
			</div>
		</div>
         <?php endif; ?>
		
    <?php echo validation_errors(); ?>
 
 
  <div id="panel">
 
	  <form method="post" action="<?=base_url('admin/Listings/add_listing') ;?>" class="form-horizontal" enctype="multipart/form-data">
	     
	<div class="row">
                         <div class="col col-lg-6">
                            <div id="map" style="height: 400px;width:100%"></div>
                          </div>
                          <div  class="col col-lg-6"  style="padding-top:10px;">
	                         <img src="" class="hero" id="pic1" />
	                      </div>
						    <div id="picture" style="padding-top:10px;"> 
						       <label for="image ">ou Importer une photo </label>
                                   <div class="kv-avatar ">
                                      <div class="file-loading">
                                       <input id="image" name="image" type="file"   >
                                      </div>
                                   </div>
							  </div>
                         </div>
   <div class="row">
          
			 <div class="col col-lg-6">
			   <input type="hidden" name="wilaya" id="wilaya" value="<?php echo $wilaya['id'] ?>" > 
			    <input type="hidden" name="Zip-Code" id="Zip-Code" value="<?php echo $Zip ?>" > 
			    <input type="hidden" name="Category" id="Category" value="<?php echo $Category ?>"  > 
			    <input type="hidden" name="sou_category" id="sou_category" value="<?php echo $sou_category ?>" > 
			    <input type="text" name="place_id" id="place_id" class="form-control"><br>
                <input type="text" name="name" id="name" class="form-control"><br>
                <input type="text" name="lat" id="lat" class="form-control"><br>
                <input type="text" name="lng" id="lng" class="form-control"><br>
                <input type="text" name="location" id="location" class="form-control"><br>
                <input type="text" name="phone" id="phone" class="form-control"><br>
                <input type="text" name="photo" id="photo" class="form-control"><br>
                <input type="text" name="website" id="website" class="form-control"><br>
                <input type="text" name="place_types" value="<?php echo $type ?>" class="form-control"><br>
                <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
            </div>
      
    </div> 
  </form>
  
 </div>
  </section>
 </div>
   <script src="<?php echo base_url(); ?>assets/maps/modernizr.js"></script>
  <script>
  
  desktopScreen = Modernizr.mq( "only screen and (min-width:1024px)" ),
				zoom = desktopScreen ? 18 : 17,
				scrollable = draggable = !Modernizr.hiddenscroll || desktopScreen,
				isIE11 = !!(navigator.userAgent.match(/Trident/) && navigator.userAgent.match(/rv[ :]11/));
 
    let pos;
    let map;
    let bounds;
    let infoWindow;
    let currentInfoWindow;
    let service;
     var baseurl = '<?php echo base_url(); ?>';
    function initMap() {
       $("#name").val('');
      bounds = new google.maps.LatLngBounds();
      infoWindow = new google.maps.InfoWindow;
      currentInfoWindow = infoWindow;
      
       handleLocationError(false, infoWindow);
   
    }
   function handleLocationError(browserHasGeolocation, infoWindow) {
 
      pos = { lat: <?php echo $wilaya['lat'] ?>, lng: <?php echo $wilaya['lng'] ?> }; 
      map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: 7,
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
 
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Geolocation permissions denied. Using default location.' :
        ' votre possition.');
      infoWindow.open(map);
      currentInfoWindow = infoWindow;
 
      getNearbyPlaces(pos);
    }
 
     function getNearbyPlaces(position) {
      let request = {
        location: position,
        rankBy: google.maps.places.RankBy.DISTANCE,
        keyword: '<?php echo $type ?>'
      };

      service = new google.maps.places.PlacesService(map);
      service.nearbySearch(request, nearbyCallback);
    }
 
    function nearbyCallback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
	    createMarkers(results);
        createMarker();
		
      }
    }
	
    
  function createMarker() {
	   var data =  <?php echo $cord ; ?> ;
	   var count = 0; 
	   var markers = []; 
	 for(key in data.mark) {
	 var infoWind = new google.maps.InfoWindow(), marker, i;	
          if(data.mark.hasOwnProperty(key)) {
            count++;
          }
         };
	    for (var i = 0; i <count; i++) {
          var dataPhoto = data.mark[i];
          var latLng = new google.maps.LatLng(dataPhoto.lat,dataPhoto.lng);
            marker = new google.maps.Marker({
              position: latLng , 
		      title : 'asa',
			  mapTypeId: google.maps.MapTypeId.ROADMAP,
			  icon :  { 
  url: isIE11 ? baseurl+"assets/images/markers/png/"+dataPhoto.icon : baseurl+"assets/images/markers/png/"+dataPhoto.icon,
					 scaledSize: new google.maps.Size(50, 50)
					 } ,
              map: map,
		   });
	  (function (marker, dataPhoto) {
                google.maps.event.addListener(marker, "click", function (e) {
                      infoWind.setContent(dataPhoto.infowindow_content);
                      infoWind.open(map, marker);
                });
         })(marker, dataPhoto);
       
	   markers.push(marker);
      } 
    } 
    function createMarkers(places) {
      places.forEach(place => {
        let marker = new google.maps.Marker({
          position: place.geometry.location,
          map: map,
          title: place.name
        });
 
        google.maps.event.addListener(marker, 'click', () => {
          let request = {
            placeId: place.place_id,
            fields: ['name', 'formatted_address','formatted_phone_number', 'geometry', 'rating',
              'website', 'photos','place_id']
          };
         service.getDetails(request, (placeResult, status) => {
            showDetails(placeResult, marker, status)
          });
        });

 
        bounds.extend(place.geometry.location);
      });
 
      map.fitBounds(bounds);
    }

  
    function showDetails(placeResult, marker, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        let placeInfowindow = new google.maps.InfoWindow();
        let rating = "None";
        if (placeResult.rating) rating = placeResult.rating;
        placeInfowindow.setContent('<div><strong>' + placeResult.name +
          '</strong><br>' + 'Rating: ' + rating + '</div>');
        placeInfowindow.open(marker.map, marker);
        currentInfoWindow.close();
        currentInfoWindow = placeInfowindow;
        showPanel(placeResult);
      } else {
        console.log('showDetails failed: ' + status);
      }
    }
 
    function showPanel(placeResult) {
	
	     $("#lat").val('');
	     $("#lng").val('');
	     $("#photo").val('');
	     $("#name").val('');
	     $("#location").val('');
		 $("#phone").val('');
	     $("#website").val('');
		 
        if (placeResult.photos) {
        let firstPhoto = placeResult.photos[0];
          $("#photo").val(firstPhoto.getUrl());
		  $("#pic1").attr("src", firstPhoto.getUrl());
         }else{
			  $("#pic1").attr("src", "<?=base_url('assets/images/nophoto.jpg');?>");
		 
		 }
		 
	     if (placeResult.place_id) {
     
       $("#place_id").val(placeResult.place_id);
       }
	  
       var item_lat = placeResult.geometry.location.lat();
       var item_lng = placeResult.geometry.location.lng();
	   $("#lat").val(item_lat);
	   $("#lng").val(item_lng);
	   
	   
      let name = document.createElement('h1');
      name.classList.add('place');
      name.textContent = placeResult.name;
      
	  
	   var item_name = placeResult.name;
	   $("#name").val(item_name);
	   
      let address = document.createElement('p');
      address.classList.add('details');
      address.textContent = placeResult.formatted_address;
	  let phone = document.createElement('p');
	  phone.classList.add('details');
      phone.textContent = placeResult.formatted_phone_number;
 
	   
  	      var item_Location = placeResult.formatted_address;
		  var item_phone = placeResult.formatted_phone_number;
	   
         $("#location").val(item_Location);
		 $("#phone").val(item_phone);


	 if (placeResult.website) {
        let websitePara = document.createElement('p');
        let websiteLink = document.createElement('a');
        let websiteUrl = document.createTextNode(placeResult.website);
        websiteLink.appendChild(websiteUrl);
        websiteLink.title = placeResult.website;
        websiteLink.href = placeResult.website;
        websitePara.appendChild(websiteLink);
        var item_website = placeResult.website;
        $("#website").val(item_website);
       }
  
    }
  </script>
<script type="text/javascript">
  $("#manageLiting").addClass('active');
   $("#addListing").addClass('active');
  $(document).ready(function() {
	 
	  $('#category').change(function(){ 
      var id = $(this).val(); 
       $.ajax({
        url: 'getSouCategoryDaira/'+id,
        method: 'post', 
        dataType: 'json',
        success: function(response){ 
          $('#sou_category').find('option').not(':first').remove();
               $.each(response,function(index,data){
             $('#sou_category').append('<option value="'+data['id']+'">'+data['name']+'</option>');
          });
        } 
     }); 
    }); 
	   
  
  });
   $("#image").fileinput({
        overwriteInitial: true, 
        showClose: true,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
          // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg","jpeg", "png", "gif"]
    });
</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdI0GSQlVslIEcOTXlbsJ2Lm9lBVy0o3g&libraries=places&callback=initMap">
  </script>
 