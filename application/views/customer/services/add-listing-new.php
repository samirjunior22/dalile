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
	
	#picture{
		visibility: visible;
	}
  </style>
  	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Sélectionnez votre emplacement</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
						    <li>ajouter</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		
	 	
		<?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('errors')): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>
        <?php endif; ?>
    <?php echo validation_errors(); ?>
        <div class="row">
		   <div class="col-lg-12 col-md-12">
		   <form method="post" action="<?=base_url('customer/listing/add_new'); ?>"   class="form-horizontal" enctype="multipart/form-data"> 
                      <div class="add_listing_info" style="padding:0;">
					    <div class="row">
						 <div class="col col-lg-6">
						   <label  style='color:red;'>faites glisser le marqueur à votre adresse</label>
                            <div id="map" style="height: 400px;width:100%"></div>
                          </div>
                          <div class="col-lg-6">

                       <input id="lat" name="lat"  type="hidden"> <br>
                        <input id="lng" name="lng"   type="hidden"> <br>
	                      </div>
						    <div id="picture">
						       <label for="image ">Importer une photo </label>
                                   <div class="kv-avatar ">
                                      <div class="file-loading">
                                       <input id="image" name="image" type="file" >
                                      </div>
                                   </div>
							  </div>
                         </div>
						   <div class="form-group"> 
				               
                            </div>
					  </div>
					   <div class="add_listing_info">
                            <h4>  Informations</h4>	
							  <div class="form-group">
                                   <div class="col-sm-9">
                                  <input type="text" id="name" name="Title" placeholder="Titre de l'annonce" class="form-control" required>
                                  </div>
                              </div>
                  		    <div class="form-group">
                                 <div class="col-sm-9">
                                  <input type="text" id="Tag_Line" name="Tag_Line" placeholder="Slogan" class="form-control" required>
                                  </div>
                              </div>
							   <div class="row">
                            	 <div class="form-group col-sm-6">
                                   <input type="text" name="location" id="location"  placeholder="Address"class="form-control" required>
                                </div> 
                            </div>
							 <div class="row">
                               <div class="form-group col-sm-6">
                                    <input type="text" name="Phone" id="phone"  placeholder="Télephone" class="form-control" required>
                                </div>  
								<div class="form-group col-sm-6">
                                    <input type="text" name="Email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
							 </div> 
                        
                        <div class="add_listing_info">
                            <h4>Détails  </h4>				
                            <div class="form-group">
                                 <textarea name="Description"  class="form-control" required> Description </textarea>
                            </div>  
                         </div>
                      
			    <input type="hidden" name="photo" id="photo" class="form-control"><br>
                <input type="hidden" name="wilaya" id="wilaya" value="<?php echo $wilaya['id'] ?>" ><br>
			    <input type="hidden" name="Zip-Code" id="Zip-Code" value="<?php echo $Zip ?>" > 
			    <input type="hidden" name="Category" id="Category" value="<?php echo $Category ?>"  > 
			    <input type="hidden" name="sou_category" id="sou_category" value="<?php echo $sou_category ?>" > 
			      
                        <div class="add_listing_info">
                            <input type="submit" value="Soumettre" class="btn">
                        </div>   
                    </form>
  </div>
 
 
 
 
  <script>
 
    let pos;
    let map;
    let bounds;
    let infoWindow;
    let currentInfoWindow;
    let service;
    function initMap() {
       $("#name").val('');
      bounds = new google.maps.LatLngBounds();
      infoWindow = new google.maps.InfoWindow;
      currentInfoWindow = infoWindow;
      
       handleLocationError(false, infoWindow);
	    var myLatlng= { lat: <?php echo $wilaya['lat'] ?>, lng: <?php echo $wilaya['lng'] ?> }; 
	    var marker = new google.maps.Marker({
             draggable: true,
             position: myLatlng,
             map: map,
             infoWindow: "Your location",
          });
	       google.maps.event.addListener(marker, 'dragend', function (event) {
                $("#lat").val(event.latLng.lat().toFixed(6));
                $("#lng").val(event.latLng.lng().toFixed(6));
                infoWindow.open(map, marker);
  
          });
	     
     }
   function handleLocationError(browserHasGeolocation, infoWindow) {
      pos = { lat: <?php echo $wilaya['lat'] ?>, lng: <?php echo $wilaya['lng'] ?> }; 
      map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: 15,
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
   }
   
 
  </script>
<script type="text/javascript">
   $("#manageLiting").addClass('active');
   $("#addListing").addClass('active');
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
 