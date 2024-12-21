 <style>
 .table th, .table td {
	 padding :8px;
 }
 
 </style>
<?php
if($this->session->userdata('v_user_id') != 0) {  
   $userid = $this->session->userdata('v_user_id') ; 
}else { 
	$userid = 0 ; 
}
 ?>
 <section class="listing_detail_header style2_header parallex-bg" style="background-image: url(<?=base_url('/assets/images/etablissements/'.$etablissement['photo']) ;?>) ;">
	<div class="container">
    	 
    </div>
    <div class="dark-overlay"></div>
</section>

<section class="listing_detail_header">
	<div class="container">
    	<h3><?php echo $etablissement['name']?></h3>  
        <p><?php echo $etablissement['name']?></p>
        <div class="listing_rating">
            <p> </p>
            <p class="listing_like"> </p>
            <p class="listing_favorites"></p>   
        </div>   
    </div>
</section>

<!-- Listings -->
<section class="listing_info_wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<div class="ElemoListing_detail">
                	 
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">
                                 <i class="fa  fa-file-text-o"></i>Presentation</a>
                                </a>
                              </h4>
                            </div>
                            <div id="description" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                <p><?php echo $etablissement['discription']?>.</p>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#opening_hours" aria-expanded="false" aria-controls="collapseThree"> <i class="fa fa-calendar-check-o"></i> Horaires d'ouverture</a>
                              </h4>
                            </div>
                            <div id="opening_hours" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                <ul>
                                	<li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Dimanche</span> 
                                        <span>8:00am</span> - <span>9:00pm</span>
                                    </li>
                                    <li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Lundi</span> 
                                        <span>8:00am</span> - <span>9:00pm</span>
                                    </li>
                                    <li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Mardi</span> 
                                        <span>8:00am</span> - <span>9:00pm</span>
                                    </li>
                                    <li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Mercredi</span> 
                                        <span>8:00am</span> - <span>9:00pm</span>
                                    </li>
                                    <li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Jeudi</span> 
                                        <span>8:00am</span> - <span>9:00pm</span>
                                    </li>
                                    <li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Vendredi</span> 
                                       <span>Fermé</span>
                                    </li>
                                    <li>
                                    	<span class="hours_title"><i class="fa fa-clock-o"></i>Samedi</span> 
                                        <span>Fermé</span>
                                    </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                    </div>
                    
                     <!-- Listing-Map -->
                   <div id="single_map">
                            <div class="widget_title">
                                 <h4> CARTE </h4>
                            </div>
                             <div id="map" style="height:450px;">
                               <div id="map" >
                               </div>
							  </div> 
                        </div>
                   
            	</div>
            </div>
            
            <!-- Sidebar -->
			 <div class="col-md-4">
            	<div class="ElemoListing_sidebar">
                	<div class="sidebar_wrap listing_action_btn">
                    	<img src="<?=base_url('/assets/images/etablissements/'.$etablissement['photo']) ;?>"  />
                    </div>
                	<div class="sidebar_wrap listing_contact_info">
                    	<div class="widget_title">
	                    	<h6>Contact Info</h6>
                        </div>
                    	<ul>
                        	<li><i class="fa fa-map-marker"></i><?php echo $etablissement['addresse']?></li>
                            <li><i class="fa fa-phone"></i> <a href="tel:+61-1234-5678-09"><?php echo $etablissement['phone']?></a></li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:contcat@example.com"><?php echo $etablissement['email']?></a></li>
                            <li><i class="fa fa-link"></i> <a href="www.example.html"><?php echo $etablissement['site']?></a></li>
                        </ul>
                        <div class="social_links">
                        	<a href="#" class="facebook_link"><i class="fa fa-facebook-f"></i></a>
                        	<a href="#" class="linkedin_link"><i class="fa fa-linkedin"></i></a>
                        	<a href="#" class="twitter_link"><i class="fa fa-twitter"></i></a>
                        	<a href="#" class="google_plus_link"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                     
                </div>
            </div>
		   <!-- 	 <div class="col-md-4">
            	<div class="ElemoListing_sidebar">
                	<div class="sidebar_wrap listing_action_btn">
                    	<ul>
                            <li><a href="#writereview" class="js-target-scroll"> <i class="fa fa-star"></i> Write a Review</a></li>
                            <li><a data-toggle="modal" data-target="#report_modal"><i class="fa fa-exclamation-triangle"></i> Report</a></li>
                        </ul>
                    </div>
                	<div class="sidebar_wrap listing_contact_info">
                    	<div class="widget_title">
	                    	<h6>INFORMATIONS JURIDIQUE</h6>
                        </div>
                    	<ul>
                        <div class="containerWhite containerWhiteH100">
                        <div class="blockInterieur">
                            <table class="table">
                                <tbody><tr>
                                        <th>
                                            Nature</th>
                                        <td>
                                             Siège</td>
                                    </tr>
                                <tr>
                                        <th>
                                            Année de création</th>
                                        <td>2008</td>
                                        </tr>
                                <tr>
                                        <th>
                                            Forme juridique</th>
                                        <td>
                                            EURL</td>
                                    </tr>
                                <tr>
                                        <th>
                                            Capital</th>
                                        <td>1&nbsp;000&nbsp;000&nbsp;DZD</td>
                                        </tr>
                                <tr>
                                        <th>Effectifs de l'entreprise</th>
                                        <td>
                                            18&nbsp;employés</td>
                                    </tr>
                                <tr class="trKid">
                                    <th>Kompass ID<sup class="tooltipInterrogation" data-toggle="tooltip" data-placement="top" title="" data-original-title="Numéro d'identification Kompass">?</sup></th>
                                    <td>DZ258018</td>
                                </tr>

                                <tr>
                                        <th>Membre Kompass depuis</th>
                                        <td>

                                            + <b>5</b> ans</td>
                                    </tr>
                                <tr class="trAdhesion">
                                        <th>Adhésion</th>
                                        <td>
                                            <i class="flaticonCorwn flaticon flaticonNew-laurel-1"></i>
                                            <a href="https://dz.solutions.kompass.com/m/booster/" class="infoJuridicBooster" target="_blank" rel="noreferrer">
                                                Booster</a>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </div>
                    </div> </ul>
                        <div class="social_links">
                        	<a href="#" class="facebook_link"><i class="fa fa-facebook-f"></i></a>
                        	<a href="#" class="linkedin_link"><i class="fa fa-linkedin"></i></a>
                        	<a href="#" class="twitter_link"><i class="fa fa-twitter"></i></a>
                        	<a href="#" class="google_plus_link"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                     
                </div>
            </div>
         /Sidebar -->
        </div>
    </div>
</section>
<!-- /Listings -->

 
 
<!-- /Similar-Listings -->
<a id="button"></a>
<!-- Share-Listing --> 
<?php $this->load->view('models/shar_listing');    ?>
<!-- /Share-Listing --> 
<!-- Email-to-Friends -->
 <?php $this->load->view('models/email_friends_modal');    ?>
<!-- /Email-to-Friends --> 
<!-- Report -->
<?php $this->load->view('models/report');    ?>
<!-- /Report --> 
<!-- Send-Message -->
<?php $this->load->view('models/message_modal');    ?>

<?php $this->load->view('models/singin');    ?>

<?php $this->load->view('models/galery');    ?>

<?php $this->load->view('models/mdb');    ?>
<!-- Full Height Modal Right -->
 
 <style>
  #response{display: none}
  div #fb, div #gp, div #tw{display: inline-block;}
  #fb{width: 180px;}
  #gp{width:  100px;}
  #tw{width: 180px;}
 </style>
 <div id="fb-root"></div>
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
   
 var center = new google.maps.LatLng(<?php echo $etablissement['lat'].','.$etablissement['lng']?>);
  
       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
		
	 var infoWindow = new google.maps.InfoWindow(), marker;
	 var data = [{ lat: <?php echo $etablissement['lat'] ; ?>,
                  lng: <?php echo $etablissement['lng'] ; ?>,
				  icon: '<?php echo $SouCategory['icon'] ?>',
	 infowindow_content: ' <?php echo $etablissement['name'] ?>',} ] ;
 
		   var dataPhoto = data[0];
           var latLng = new google.maps.LatLng(dataPhoto.lat,dataPhoto.lng);
            marker = new google.maps.Marker({
             position: latLng , 
		     icon : {
					 url: isIE11 ? "<?php echo base_url(); ?>assets/images/markers/png/"+dataPhoto.icon : "<?php echo base_url(); ?>assets/images/markers/png/"+dataPhoto.icon,
					 scaledSize: new google.maps.Size(96, 96)
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
 
		  
     var markerCluster = new MarkerClusterer(map, markers , markerOptions); 
	   
  }

 google.maps.event.addDomListener(window, 'load', initialize);
   
 </script> 
 	<script> 
	$.validator.setDefaults({
		submitHandler: function() {
			         $.ajax({
                             url:"<?=base_url('report/addReport'); ?>",
                             method:"POST",
                             data : $("#reportForm").serialize(),
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès", " succès ", "success")  
										 .then((value) => { 
										   $('#report_modal').modal('hide');
										    });
											  }else {
										 
										  swal("Erreur", " Erreur ", "warning"); 
									  }
							    }
                        });
			 
		}
	});
	$("#reportForm").validate({
			rules: {
				Report: "required",
				 
			 },
			messages: {
				Report: " selection required",
				 
			}
		});
		
  $('#RadioGroup1_3').on('click', function() { 
	$('#text').removeAttr("disabled");
  });
   $('#RadioGroup1_0').on('click', function() { 
 
  $('#text').prop("disabled", true);
  });  
  $('#RadioGroup1_1').on('click', function() { 
  $('#text').prop("disabled", true);
  });
    $('#RadioGroup1_2').on('click', function() { 
  $('#text').prop("disabled", true);
  });
		
 </script>
 <script>
var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
  
</script>
 