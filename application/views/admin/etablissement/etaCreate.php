

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Etablissement</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> etablissement</li>
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
            <h3 class="box-title">Add Etablissement</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('admin/etablissement/create_eta') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>
                  <div class="form-group">
                  <label for="image">Photo</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="image" name="image" type="file" required >
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sou category">etablissement</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  name" autocomplete="off" required />
                </div>
               <div class="form-group">
                  <label for="groups">Category</label>
                  <select class="form-control" id="sel_cat" name="Eta_category" required>
                    <option value="">Select  Category</option>
                    <?php foreach ($Category as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select class="form-control">
				 
                </div>
				  <div class="form-group">
			       <label for="groups">sou category</label>
				   <select class="form-control"id='sel_souC' name="sou_category" required>
                       <option>-- Select  sou Category --</option>
                   </select>
				  </div>
				  
				  <div class="form-group">
                  <label for="groups">Wilaya</label>
                  <select class="form-control" id="sel_wilaya" name="Wilaya" required>
                    <option value="">Select  Wilaya</option>
                    <?php foreach ($Wilaya as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select class="form-control">
				 </div>
				 <div class="form-group">
                  <label for="description">discription</label>
                  <textarea type="text" class="form-control" id="discription" name="discription" placeholder="Enter 
                  description" autocomplete="off">
                  </textarea>
                </div>
				 <div class="form-group">
                  <label for="description">Adresse</label>
                  <textarea type="text" class="form-control" id="addresse" name="addresse" placeholder="Enter 
                  description" autocomplete="off">
                  </textarea>
                </div>
				  <div class="form-group">
                  <label for="phone">Telephone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                </div>
				  <div class="form-group">
                  <label for="fax">fax</label>
                  <input type="text" class="form-control" id="fax" name="fax" placeholder="fax" autocomplete="off">
                </div>
				  <div class="form-group">
                  <label for="fax">site Web</label>
                  <input type="text" class="form-control" id="site" name="site" placeholder="site" autocomplete="off">
                </div>
				  <div class="form-group">
                  <label for="phone">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" autocomplete="off">
                </div>
		  
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('admin/etablissement/etablissement') ?>" class="btn btn-warning">Back</a>
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
  $(document).ready(function() {
 
    $("#description").wysihtml5();

    $("#manageEtablissement").addClass('active');
    $("#creatEtablissement").addClass('active');
    
    var btnCust = ' '; 
    $("#image").fileinput({
        overwriteInitial: true,
         
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });


 // select sou category	
	  $('#sel_cat').change(function(){
	 
      var id = $(this).val();

      // AJAX request
      $.ajax({
        url: 'getSouCatByCat/'+id,
        method: 'post', 
        dataType: 'json',
        success: function(response){

          // Remove options 
           
          $('#sel_souC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#sel_souC').append('<option value="'+data['id']+'">'+data['name']+'</option>');
          });
        } 
     }); 
   }); 
   
  });
</script>