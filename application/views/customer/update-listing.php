 

	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>mettre à jour</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Modifier</li>
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
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
    <?php echo validation_errors(); ?>
        
        <div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				 <form method="post" action="<?=base_url('customer/listing/edit/'.$listings['id']); ?>" class="form-horizontal"  enctype="multipart/form-data" > 
                    	  <div class="add_listing_info">
						   <div class="form-group"> 
				                  <label for="image "> Importer une photo</label>
                                   <div class="kv-avatar ">
                                      <div class="file-loading">
                                       <input id="image" name="image" type="file"   >
                                      </div>
                                   </div>
                            </div>
					  </div>
					  <div class="add_listing_info">
                            <h4>  Informations</h4>	
							  <div class="form-group">
                                   <div class="col-sm-9">
                             <input type="text" id="Title" name="Title" value="<?php echo $listings['Title'] ?>" class="form-control" required>
							  <input type="hidden" value="<?php echo $listings['status'] ?>" name="status" class="form-control"  >
                                  </div>
                              </div>
                  		   <div class="form-group">
                                 <div class="col-sm-9">
                                  <input type="text" id="Tag_Line" name="Tag_Line" value="<?php echo $listings['Tag_Line'] ?>"  class="form-control" required>
                                  </div>
                              </div>
							  <div class="form-group">
                                  <div class="col-sm-9">
                                  <select name="Category" id="category" class="form-control"  >
								  <option value="<?php echo $Category['id'] ?>"><?php echo $Category['name'] ?></option>
                                       <?php foreach ($Categories as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                   <?php endforeach ?>
                                    </select>
                                </div>
                              </div> <!-- /.form-group -->
							    <div class="form-group">
                                 <div class="col-sm-9">
                                  <select class="form-control"id='sou_category' name="sou_category" required>
								  	   <option value="<?php echo $souCategory['id'] ?>"><?php echo $souCategory['name'] ?></option>
                                   </select>
                                </div>
                              </div> <!-- /.form-group -->
				         </div> 
                        
                        <div class="add_listing_info">
                            <h4>Contact Info</h4>
                               <div class="form-group">
                                   <div class="col-sm-9">
                                  <input type="text" name="Address"  value="<?php echo $info['Address'] ?>" class="form-control" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-sm-9">
                                   <select name="wilaya"  class="form-control">
									 <option> Selection Wilaya </option>
								  <option selected value="<?php echo $Wilaya['id'] ?>"> <?php echo $Wilaya['name'] ?></option>
										<?php foreach ($wilayas as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo  $v['id'].' - '.$v['name'] ?></option>
                                   <?php endforeach ?>
									  </select>
                                </div>
                              </div>							  
                           <div class="row">
                                <div class="form-group col-sm-6">
                                  <input type="text" name="Zip-Code" value="<?php echo $info['Zip-Code'] ?>" class="form-control">
                                </div>  
                                <div class="form-group col-sm-6">
                                    <input type="text" name="Phone" value="<?php echo $info['Phone'] ?>" class="form-control" required>
                                </div>  
                            </div>
                            <div class="row">
                            	<div class="form-group col-sm-6">
                                    <input type="text" name="Email" value="<?php echo $info['Email'] ?>" class="form-control" required>
                                </div>
	                            <div class="form-group col-sm-6">
                                   <input type="text" name="Website"   value="<?php echo $info['Website'] ?>"  placeholder="Website"  class="form-control">
                                </div> 
                            </div>
                            <div class="row">
            	                <div class="form-group col-md-3 col-sm-6">
                                    <input class="form-control input-field" value="<?php echo $info['Facebook'] ?>" placeholder="Facebook" name="Facebook" type="text"> 
                                </div> 
        	                    <div class="form-group col-md-3 col-sm-6">
                                    <input type="text" name="Linkdin" value="<?php echo $info['Linkdin'] ?>"  placeholder="Linkdin" class="form-control">
                                </div> 
    	                        <div class="form-group col-md-3 col-sm-6">
                                     <input type="text" name="Twitter"  value="<?php echo $info['Twitter'] ?>" placeholder="Twitter"  class="form-control">
                                </div> 
	                            <div class="form-group col-md-3 col-sm-6">
                                   <input type="text" name="Google" value="<?php echo $info['Google'] ?>"  placeholder="Google+ " class="form-control">
                                </div>      
                            </div>             
                        </div>
                        
                        <div class="add_listing_info">
                            <h4>Description  </h4>				
                            <div class="form-group">
                                 <textarea name="Description" id="Description" class="form-control" required><?php echo $listings['Description'] ?></textarea>
                            </div>  
                            <div class="form-group">
                            	<label class="label-title">Équipements <span>(optionnel)</span></label>
                                <div class="form-group">
                                 <textarea name="Amenities" id="Amenities" class="form-control" > <?php echo $listings['Amenities'] ?> </textarea>
                                 </div>  
							   
								 </div>
                            </div>        
                        </div>
                        <div class="add_listing_info">
                            <h4>Ajouter un prix</h4>	
                            <div class="row">			
                                <div class="form-group col-sm-6">
                                   <input type="text" name="Min_Price" value="<?php echo $listings['Min_Price'] ?>" placeholder="min Prix" class="form-control">
                                </div>  
                                 <div class="form-group col-sm-6">
                                     <input type="text" name="Max_Price" value="<?php echo $listings['Max_Price'] ?>" placeholder="Max Prix"  class="form-control">
                                </div>  
                            </div>
                                     
                        </div>   
 
						  <div class="add_listing_info">
                            <h3>Ajouter une vidéo</h3>				
                            <div class="form-group">
                                <label class="label-title">Video Youtube URL</label>
			  <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php echo $listings['Video_URL'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					      <input type="text" value="<?php echo 'https://www.youtube.com/watch?v='.$listings['Video_URL'] ?>" name="Video_URL" class="form-control">
                            </div>      
                        </div> 
						<div class="add_listing_info">
                            <h3>360 DEGRÉ VUE</h3>				
                            <div class="form-group">
                                <label class="label-title">360 VUE </label>
                               <input type="text" name="vue_360" value="<?php if($listings['vue_360'] != ''){echo '<iframe src="'.$listings['vue_360'].'"></iframe>"'; }?>"  placeholder="Passez code iframe ici" class="form-control"> 
						     </div>      
                        </div>
              
                        
                        <div class="add_listing_info">
                            <input type="submit" value="Soumettre" class="btn">
                        </div>   
                    </form>
			</div>


	 

   <script type="text/javascript">
	  $("#add-listing").addClass('active');
 
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
        defaultPreviewContent: '<img src="<?php echo base_url('assets/images/listings/'.$listings['photo']) ; ?>" height="250px" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
	 </script>
	 
	 <script type="text/javascript">
  $(document).ready(function() {
	  var baseurl = ' <?=base_url();?>'; 
	  $('#category').change(function(){ 
      var id = $(this).val(); 
       $.ajax({
        url: baseurl+'customer/Listing/getSouCategoryDaira/'+id,
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