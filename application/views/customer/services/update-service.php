 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

 <style>

.select2-container {
  min-width: 400px;
}

.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
	background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
	background-color: #eaeaeb;
	color: #272727;
}
.select2-container--default .select2-selection--multiple {
	margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
	border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
	border-color: #f77750;
	border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
	border-width: 2px;
}
.select2-container--open .select2-dropdown--below {
	
	border-radius: 6px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
	content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
	display: none;
}
.select-icon .placeholder {
	display: none;
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
	display: none !important;
	/* content: "" !important; */
}
.select-icon  .select2-search--dropdown {
	display: none;
}
 </style>
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
		 
		  <form role="form" class="form-horizontal" action="<?=base_url('customer/services/edit/'.$listings['id']); ?>" method="post" id="placesForm" enctype="multipart/form-data">
 			   <input type="hidden" value="<?php echo $listings['status'] ?>" name="status" class="form-control"  >

                          <div class="add_listing_info">
                             <?php echo validation_errors(); ?>
			             <div class="form-group" id="picture">
						       <label for="image ">Importer une photo </label>
                                   <div class="kv-avatar ">
                                      <div class="file-loading">
                                       <input id="image" name="image" type="file" >
                                      </div>
                                   </div>
			  </div>
						  
                        <div class="form-group">
                               <div class="col-sm-9">
                                  <select name="sercategory" id="sercategory" class="form-control  " required>
								    <option value="<?php echo $Category['id'] ?>"><?php echo $Category['name'] ?></option>
                                       <?php foreach ($Categories as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                   <?php endforeach ?>
                                    </select>
                                </div>
                         </div> <!-- /.form-group -->
						 
			  <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control " id='ser_sou_category' name="ser_sou_category" required>
								    <option value="<?php echo $souCategory['id'] ?>"><?php echo $souCategory['name'] ?></option>
                                      <option>-- Select  Sou Category --</option>
                                   </select>
                                  </div>
                                </div> 
							 
			            <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control js-select2 " id='wilayas' name="wilaya[]"  multiple="multiple" required  >
                                  <?php foreach ($wilayas as $k => $v): ?>			                      
								       <?php foreach($selectedWilaya as $s) {
									      if( $s['id'] == $v['id']){?>
					    <option selected value="<?php echo $v['id'] ?>"><?php echo $v['id'].' - '.$v['name'] ?></option>
		                             <?php  }else{ ?>
										 	<option value="<?php echo $v['id'] ?>"><?php echo $v['id'].' - '.$v['name'] ?></option>
 	                                      <?php  }
									     
									   
								           }?>
									  <?php endforeach ?>	
								   </select>
                                  </div>
                              </div> 	
			              <br>
			              
			    <div class="add_listing_info">
                                         <h4>  Informations</h4>	
				 <div class="form-group">
                                   <div class="col-sm-9">
                                  <input type="text" id="name" name="Title" value="<?php echo $listings['Title'] ?>" placeholder="Nom commercial" class="form-control" required>
                                  </div> 
                               </div>
			     <div class="form-group">  
		                <div class="col-sm-9">
                                   <input type="text" id="Tag_Line" name="Tag_Line" value="<?php echo $listings['Tag_Line'] ?>"  placeholder="Slogan" class="form-control" required>
                                  </div>
                                </div>
		 			
                            <div class="form-group">
                               <div class="col-sm-9">
                               <input type="text" name="location" id="location" value="<?php echo $listings['Address'] ?>" placeholder="Adress " class="form-control" required>
                              </div>  
                          </div>  
                   
                               <div class="form-group">
                                <div class="col-sm-9">
                                    <input type="text" name="Phone" id="phone"  value="<?php echo $listings['Phone'] ?>"  placeholder="Télephone" class="form-control" required>
                                </div> 
                              </div>
					   </div>
                       <div class="add_listing_info">
                            <h4>Description  </h4>				
                            <div class="form-group">
                                 <textarea name="Description" id="Description"  class="form-control" required><?php echo $listings['Description'] ?></textarea>
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
			        
			    </div> 
				<div class="box-footer"> 
                        <div class="add_listing_info">
                            <input type="submit" value="Soumettre" class="btn">
                        </div> 
          
			  </div>
             </form> 
			
		 
		 	</div>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
 <script type="text/javascript">
 
 	$(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "-- Select  Wilaya--",
			allowHtml: true,
			allowClear: true,
			tags: true, // создает новые опции на лету
        	});
		
		
	  $("#add-listing").addClass('active');
	  
	    $('#category').change(function(){ 
      var id = $(this).val(); 
       $.ajax({
        url: '<?=base_url("customer/listing/getSouCategoryDaira/") ?>'+id,
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
 $('#wilaya').change(function(){ 
      var id = $(this).val(); 
          $('#ZipCode').val(id+'000');
       
  }); 
 $('#sercategory').change(function(){ 
      var id = $(this).val(); 
       $.ajax({
        url: '<?=base_url("customer/listing/getSerSouCategory/") ?>'+id,
        method: 'post', 
        dataType: 'json',
        success: function(response){ 
          $('#ser_sou_category').find('option').not(':first').remove();
               $.each(response,function(index,data){
             $('#ser_sou_category').append('<option value="'+data['id']+'">'+data['name']+'</option>');
          });
        } 
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
        defaultPreviewContent: '<img src="<?php echo base_url('assets/images/services/'.$listings['photo']) ; ?>" height="250px" alt="Your Avatar">',
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