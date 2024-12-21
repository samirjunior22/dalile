 <?php if (packs($this->user_id , 'status') == 0 ) {
		  
		    
  } 
?>
 
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Ajouter une nouvelle annonce</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add New Listing</li>
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
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
    <?php echo validation_errors(); ?>
        
        <div class="row">
		 
			<div class="col-lg-12 col-md-12">
					<form method="post" action="<?=base_url('customer/listing/add_listing'); ?>"   class="form-horizontal" enctype="multipart/form-data"> 
                      <div class="add_listing_info">
						   <div class="form-group"> 
				                  <label for="image "> selectioner photo coverture  </label>
                                   <div class="kv-avatar ">
                                      <div class="file-loading">
                                       <input id="image" name="image" type="file" required >
                                      </div>
                                   </div>
                            </div>
					  </div>
					  <div class="add_listing_info">
                            <h4>  Informations</h4>	
							  <div class="form-group">
                                   <div class="col-sm-9">
                                  <input type="text" id="Title" name="Title" placeholder="Titre de l'annonce" class="form-control" required>
                                  </div>
                              </div>
                  		   <div class="form-group">
                                 <div class="col-sm-9">
                                  <input type="text" id="Tag_Line" name="Tag_Line" placeholder="Slogan" class="form-control" required>
                                  </div>
                              </div>
							  <div class="form-group">
                                  <div class="col-sm-9">
                                  <select name="Category" id="category" class="form-control" required>
								   <option value="">Select  category</option>
                                       <?php foreach ($Category as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                   <?php endforeach ?>
                                    </select>
                                </div>
                              </div> <!-- /.form-group -->
							    <div class="form-group">
                                 <div class="col-sm-9">
                                  <select class="form-control"id='sou_category' name="sou_category" required>
                                            <option>-- Select  Sou Category --</option>
                                   </select>
                                </div>
                              </div> <!-- /.form-group -->
				         </div> 
                        
                        <div class="add_listing_info">
                            <h4>Contact Info</h4>
                               <div class="form-group">
                                   <div class="col-sm-9">
                                  <input type="text" name="Address" placeholder="Address" class="form-control" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-sm-9">
                                   <select name="wilaya"  class="form-control">
									 <option> Selection Wilaya </option>
										<?php foreach ($wilayas as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo  $v['id'].' - '.$v['name'] ?></option>
                                   <?php endforeach ?>
									  </select>
                                </div>
                              </div>							  
                           <div class="row">
                                <div class="form-group col-sm-6">
                                  <input type="text" name="Zip-Code" placeholder="Zip-Code" class="form-control">
                                </div>  
                                <div class="form-group col-sm-6">
                                    <input type="text" name="Phone" placeholder="Télephone" class="form-control" required>
                                </div>  
                            </div>
                            <div class="row">
                            	<div class="form-group col-sm-6">
                                    <input type="text" name="Email" placeholder="Email" class="form-control" required>
                                </div>
	                            <div class="form-group col-sm-6">
                                   <input type="text" name="Website"   placeholder="Website (optionnel)"class="form-control">
                                </div> 
                            </div>
                            <div class="row">
            	                <div class="form-group col-md-3 col-sm-6">
                                    <input class="form-control input-field" placeholder="Facebook (optionnel)" name="Facebook" type="text"> 
                                </div> 
        	                    <div class="form-group col-md-3 col-sm-6">
                                    <input type="text" name="Linkdin" placeholder="Linkdin (optionnel)" class="form-control">
                                </div> 
    	                        <div class="form-group col-md-3 col-sm-6">
                                     <input type="text" name="Twitter" placeholder='Twitter (optionnel)' class="form-control">
                                </div> 
	                            <div class="form-group col-md-3 col-sm-6">
                                   <input type="text" name="Google" placeholder="Google Plus (optionnel)" class="form-control">
                                </div>      
                            </div>             
                        </div>
                        
                        <div class="add_listing_info">
                            <h4>Détails  </h4>				
                            <div class="form-group">
                                 <textarea name="Description"  class="form-control" required> Description </textarea>
                            </div>  
                            <div class="form-group">
                            	<label class="label-title">Équipements <span>(optionnel)</span></label>
                                <div class="checkbox">
                                   <?php foreach ($Amenities as $Amenitie) { ?> 
                                    <p><input type="checkbox" value="<?php echo $Amenitie['id'] ?>"  id="amenities<?php echo $Amenitie['id'] ?>" name="Amenities[]">
                                    <label for="amenities<?php echo $Amenitie['id'] ?>"><?php echo $Amenitie['Amenities'] ?></label></p>
                                    
							       <?php }   ?>
                                </div>
                            </div>         
                        </div>
                        
                       <!-- <div class="add_listing_info">
                            <h3>horaires de travail</h3>				
                            <div class="row">  
                                <div class="form-group col-sm-2">
                            <label class="label-title">Dimanche</label>  </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Dimanche" class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Dimanche_c" class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group col-sm-2">
                                    <label class="label-title">lundi</label>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="lundi" class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text"  name="lundi_c" class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group col-sm-2">
                                    <label class="label-title">Mardi</label>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Mardi" class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Mardi_c" class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                             <div class="row">  
                                <div class="form-group col-sm-2">
                                    <label class="label-title">Mercredi</label>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Mercredi" class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Mercredi_c"  class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group col-sm-2">
                                    <label class="label-title">Jeudi</label>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Jeudi" class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Jeudi_c"  class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group col-sm-2">
                                    <label class="label-title">Vendredi</label>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text"  name="Vendredi"  class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Vendredi_c"  class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="form-group col-sm-2">
                                    <label class="label-title">Samedi</label>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Samedi" class="form-control" placeholder="Horaire d'ouverture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">    
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                      <input type="text" name="Samedi_c" class="form-control" placeholder="Heure de fermeture">
                                         <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>         
                        </div>  -->
                        
                        <div class="add_listing_info">
                            <h4>Ajouter un prix</h4>	
                            <div class="row">			
                                <div class="form-group col-sm-6">
                                   <input type="text" name="Min_Price" placeholder="Min. prix" class="form-control">
                                </div>  
                                 <div class="form-group col-sm-6">
                                     <input type="text" name="Max_Price" placeholder="Max. prix" class="form-control">
                                </div>  
                            </div>
                                     
                        </div>   
 
						<div class="add_listing_info">
                  			
                            <div class="form-group">
                                 <input type="text" name="vue_360" placeholder="360 VUE : Passez code iframe ici" class="form-control">
                            </div> 
                            <div class="form-group">
                                 <input type="text" name="Video_URL" placeholder="Video : Youtube URL" class="form-control">
                            </div>  							
                        </div>
              
                        
                        <div class="add_listing_info">
                            <input type="submit" value="Soumettre" class="btn">
                        </div>   
                    </form>
			</div>
 

   <script type="text/javascript">
   $("#add-listing").addClass('active');
	  
   $("#image_tag").fileinput({
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
        allowedFileExtensions: ["jpg", "png", "gif"]
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
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
	 </script>
	 
	 
<script type="text/javascript">
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
</script>
