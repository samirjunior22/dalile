<?php defined('BASEPATH') OR exit('No direct script access allowed');?> 
 
<!-- Content -->
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
          <div class="box-header">
             
          </div>
          
		  <?php if (isset($slug)) { ?> 
		 
		   <form role="form" class="form-horizontal" action="<?=base_url('customer/listing/'.$slug) ?>" method="get" id="placesForm">
              <div class="box-body">

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
							                    <option value="Photographe ">Photographe </option>
									     	<option value="shopping"> Boutique</option>
									     	
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
               <div class="box-footer">
                  <a href="<?php echo base_url('customer/setting/dashboard/') ?>" class=" btn-warning btn-sm">Back</a>
				   <button type="submit" class="btn btn-primary btn-sm">Continue</button>
			  </div>
            </form>
           
		  <?php } else {?>
		   
		 
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h3>Sélectionner : </h3>
				 </div>
			</div>
		 </div>
		 
		      <p>Emplacement</p>
		   	  <a href="<?=base_url('customer/listing/places/map') ?>" class="btn btn-primary ">Déjà marker sur google map</a>
			  <a href='<?=base_url('customer/listing/places/Nouveau') ?>'  class="btn btn-primary ">Nouveau</a>
		  
		  <br>
		   <hr align="left" width="60%" color="midnightblue" size="4"> 
		  <p>Profession</p>
			  <a href='<?=base_url('customer/listing/places/Nouveau') ?>'  class="btn btn-primary ">Nouveau</a>
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
	 
  });
 	
</script>
 
 