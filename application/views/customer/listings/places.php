<?php defined('BASEPATH') OR exit('No direct script access allowed');?> 
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
 <div class="dashboard-content">
		

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

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


        <div class="box">
             <?php if (isset($slug)) { ?> 
		 <?php if ($slug == 'service') {   ?> 
		     
		   <h4 style="padding:30px;">Profession (Fleuriste ,Maçon , tailleur ...)</h4>
	 
		  <form role="form" class="form-horizontal" action="<?=base_url('customer/services/add_new_service') ?>" method="post" id="placesForm" enctype="multipart/form-data">
 
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
								   <option value="">Select  category</option>
                                       <?php foreach ($serCategory as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                   <?php endforeach ?>
                                    </select>
                                </div>
                         </div> <!-- /.form-group -->
						 
			  <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control " id='ser_sou_category' name="ser_sou_category" required>
                                            <option>-- Select  Sou Category --</option>
                                   </select>
                                  </div>
                                </div> 
								  
			 <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control js-select2 " id='wilayas' name="wilaya[]"  multiple="multiple" required  >
                                             <?php foreach ($wilayas as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['id'].' - '.$v['name'] ?></option>
                                         <?php endforeach ?>	
								   </select>
                                  </div>
                              </div> 	
			              <br>
			              
			    <div class="add_listing_info">
                                         <h4>  Informations</h4>	
				 <div class="form-group">
                                   <div class="col-sm-9">
                                  <input type="text" id="name" name="Title" placeholder="Nom commercial" class="form-control" required>
                                  </div> 
                               </div>
			     <div class="form-group">  
		                <div class="col-sm-9">
                                   <input type="text" id="Tag_Line" name="Tag_Line" placeholder="Slogan" class="form-control" required>
                                  </div>
                                </div>
		 			
                            <div class="form-group">
                               <div class="col-sm-9">
                               <input type="text" name="location" id="location"  placeholder="Adress " class="form-control" required>
                              </div>  
                          </div>  
                   
                               <div class="form-group">
                                <div class="col-sm-9">
                                    <input type="text" name="Phone" id="phone"  placeholder="Télephone" class="form-control" required>
                                </div> 
                              </div>
					   </div>
                       <div class="add_listing_info">
                            <h4>Description  </h4>				
                            <div class="form-group">
                                 <textarea name="Description" id="Description" class="form-control" required></textarea>
                            </div>  
                         
                        </div>        
                        </div>
                        <div class="add_listing_info">
                            <h4>Ajouter un prix</h4>	
                            <div class="row">			
                                <div class="form-group col-sm-6">
                                   <input type="text" name="Min_Price" placeholder="min Prix" class="form-control">
                                </div>  
                                 <div class="form-group col-sm-6">
                                     <input type="text" name="Max_Price" placeholder="Max Prix"  class="form-control">
                                </div>  
                            </div>
                                     
                        </div>  					   
			        
			    </div>
               <div class="box-footer"> 
                        <div class="add_listing_info">
                            <input type="submit" value="Soumettre" class="btn">
                        </div> 
                   <a href="<?php echo base_url('customer/setting/dashboard/') ?>" class=" btn-warning btn-sm">Back</a>
				   <button type="submit" class="btn btn-primary btn-sm">Continue</button>
			  </div>
            </form> 
		 
		 
		  <?php }else{ ?>
		  
		  <h4>Emplacement (Hotel, restaurant , agance de voyage , ... )</h4>
		 
		   <form role="form" class="form-horizontal" action="<?=base_url('customer/listing/'.$slug) ?>" method="get" id="placesForm" enctype="multipart/form-data">
                   <div class="box-body" style="padding:30px;">

                 <?php echo validation_errors(); ?>
                        <div class="form-group">
                               <div class="col-sm-9">
                                  <select name="Category" id="category" class="form-control  " required>
								   <option value="">Select  category</option>
                                       <?php foreach ($Category as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                   <?php endforeach ?>
                                    </select>
                                </div>
               </div> <!-- /.form-group -->
							    <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control " id='sou_category' name="sou_category" required>
                                            <option>-- Select  Sou Category --</option>
                                   </select>
                                  </div>
                                </div> 
								<div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control  " id='place_types'  data-live-search="true"  name="place_types" required>
                                            <option>-- Select Place Types --</option>
											<option value="car"> Automobile</option>
										    <option value="travel"> Agence de voyage</option>
											<option value="immobilier">Agence immobilière</option>
											<option value="hotel"> hotel</option>
											<option value="cafe"> cafe</option>
											<option value="restaurant"> restaurant</option>
										    <option value="dentist"> dentist</option>
										    <option value="doctor"> Médecin</option>
											<option value="optician"> optician</option>
											<option value="beauty">Salon de beauté</option>
							                <option value="spa"> spa</option>
											<option value="store"> store</option>
										    <option value="bookstore">Librairie Papiterie</option>
											<option value="taxi"> Service Taxi</option>
										    <option value="electronics"> Electronique </option>
							                <option value="furniture">Meubles</option>
									     	<option value="shopping"> Boutique</option>
                                                                                  	<option value="pizzeria"> pizzeria </option>
									   </select>
                                  </div>
                                </div>  
						    <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control  " id='wilaya' name="wilaya" required  data-container="body" data-live-search="true"   data-hide-disabled="true">
                                            <option value="">-- Select  Wilaya--</option>
										    <?php foreach ($wilayas as $k => $v): ?>			                      
									  <option value="<?php echo $v['id'] ?>"><?php echo $v['id'].' - '.$v['name'] ?></option>
                                         <?php endforeach ?>	
								   </select>
                                  </div>
                              </div> 	
			              <br>
			        <input type="hidden" name="Zip-Code" id="ZipCode"  class="form-control"><br>
			    </div>
                      <div class="box-footer" style="padding:30px;">
                                  <a href="<?php echo base_url('customer/setting/dashboard/') ?>" class=" btn-warning btn-sm">Back</a>
				   <button type="submit" class="btn btn-primary btn-sm">Continue</button>
			  </div>
            </form> 
                        
		       <?php } ?>
	  <?php } else {?>
		   
	  <div class="box" style="padding:50px;"> 
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h3>Sélectionner : </h3>
				 </div>
			</div>
		 </div>
		 
		       <p>Emplacement (Hotel, restaurant , agance de voyage , ... )</p>
		   	  <a href="<?=base_url('customer/listing/places/add_listing') ?>" class="btn btn-primary ">Déjà marker sur google map</a>
			  <a href='<?=base_url('customer/listing/places/add_new') ?>'  class="btn btn-primary ">Nouveau</a>
		  
		  <br>
		   <hr align="left" width="60%" color="midnightblue" size="4"> 
		  <p>Profession (Fleuriste ,Maçon , tailleur ...)</p>
			  <a href='<?=base_url('customer/listing/places/service') ?>'  class="btn btn-primary ">Nouveau</a>
		</div>	  
			  
		 <?php } ?>
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content -->
</div>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script type="text/javascript">
 
 $("#add-listing").addClass('active');
  $(document).ready(function() {
	  
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
          // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg","jpeg", "png", "gif"]
    });
 

		$(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "-- Select  Wilaya--",
			allowHtml: true,
			allowClear: true,
			tags: true // создает новые опции на лету
		});
 function iformat(icon, badge,) {
					var originalOption = icon.element;
					var originalOptionBadge = $(originalOption).data('badge');
				 
					return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
				}

 
  });
 	
</script>
 
 