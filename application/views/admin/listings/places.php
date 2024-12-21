<?php defined('BASEPATH') OR exit('No direct script access allowed');?> 
 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small> Places</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Places</li>
    </ol>
  </section>

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
            <h3 class="box-title">Add Places</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" class="form-horizontal" action="<?=base_url('admin/Listings/add_listing') ;?>" method="get" >
              <div class="box-body">

                <?php echo validation_errors(); ?>
                        <div class="form-group">
                               <div class="col-sm-9">
                                  <select name="Category" id="category" class="form-control selectpicker" required>
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
								  <input type="text" name="place_types" id="place_types" class="form-control" placeholder="Select Place Types"><br>
                                 <!--  <select class="form-control selectpicker" id='place_types'  data-live-search="true"  name="place_types" required>
                                            <option>-- Select Place Types --</option>
											<option value="car"> Automobile</option>
											<option value="Auto-école"> Auto-école</option>
										    <option value="travel"> Agence de voyage</option>
											<option value="immobilier">Agence immobilière</option>
											<option value="hotel"> hotel</option>
											<option value="cafe"> cafe</option>
											<option value="restaurant"> restaurant</option>
											<option value="Pizzeria"> Pizzeria</option>
										    <option value="dentist"> dentist</option>
										    <option value="doctor"> Médecin</option>
											<option value="optician"> optician</option>
											<option value="pharmacie"> pharmacie</option>
											<option value="beauty">Salon de beauté</option>
							                 <option value="spa"> spa</option>
											<option value="store"> store</option>
											 <option value="bookstore">Librairie Papiterie</option>
											<option value="taxi"> Service Taxi</option>
											<option value="Mechanic">Mechanic</option>
										    <option value="electronics"> Electronique </option>
							                <option value="furniture">Meubles</option>
									     	<option value="shopping"> Boutique</option>
									     	<option value="Clothing store">Clothing store</option>
									     	<option value="Studio">Studio</option>
                                   </select> -->
                                  </div>
                                </div>  
						    <div class="form-group">
                                 <div class="col-sm-9">
                                   <select class="form-control selectpicker" id='wilaya' name="wilaya" required  data-container="body" data-live-search="true"   data-hide-disabled="true">
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
                  <a href="<?php echo base_url('admin/Listings/') ?>" class="btn btn-warning">Back</a>
				  <button type="submit" class="btn btn-primary">Déjà marker sur google map</button>
				  <button type="submit" class="btn btn-primary">Nouveau</button>
             
              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

 
 
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
	  $('#wilaya').change(function(){ 
      var id = $(this).val(); 
          $('#ZipCode').val(id+'000');
       
    }); 
  
  });
</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdI0GSQlVslIEcOTXlbsJ2Lm9lBVy0o3g&libraries=places&callback=initMap">
  </script>
 