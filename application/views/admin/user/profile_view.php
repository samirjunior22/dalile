<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<style>
.pic-container{
  cursor: pointer;
  overflow: hidden;
}

.pic{
  width: 100%;
  height: 100%;
  display: block;
}

.pic-container.pic-xs{
  width: 50px;
  height: 50px;
}

.pic-container.pic-small{
  width: 70px;
  height: 70px;
}

.pic-container.pic-medium{
  width: 150px;
  height: 150px;
}

.pic-container.pic-large{
  width: 250px;
  height: 250px;
}


.pic-container.pic-xl{
  width: 350px;
  height: 350px;
}

.pic-container.pic-circle{
  border-radius: 50%;
}

.pic-overlay{
  background-color: #ccc;
  opacity: 0.5;
  width: 100%;
  height: 100%;
  margin: 0;
  position: relative;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;

}

.pic-container:hover .pic-overlay{
  top: -100%;
}

.pic-overlay a{
  display: block;
  padding: 10px;
}

.pic-xs .pic-overlay a{
  padding: 5px;
}

.pic-overlay .fa-window-close-o{
  color: red;
}

.pic-overlay .fa-pencil-square-o{
  color: blue;
}

.pic-medium .pic-overlay a i{
  font-size: 20px;
}

.pic-large .pic-overlay a i{
  font-size: 35px;
}

.pic-xl .pic-overlay a i{
  font-size: 45px;
}



</style>
 <div class="content-wrapper">
  <section class="content">
    <div class="row">
	<div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Profile page
                <small>Advanced and full of features</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body pad"> 
          <div class="col-md-8">
            <?php echo form_open('',array('class'=>' '));?>
			<div class="pic-container pic-medium pic-circle">
  <img class="pic" src="<?php echo  base_url($user->photo) ;?> " alt="">
  <div class="pic-overlay"> 
      <a><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#modal-default"></i></a>
  </div>
</div>
            <div class="form-group">
                <?php
                echo form_label('First name','first_name');
                echo form_error('first_name');
                echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Last name','last_name');
                echo form_error('last_name');
                echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Company','company');
                echo form_error('company');
                echo form_input('company',set_value('company',$user->company),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Phone','phone');
                echo form_error('phone');
                echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Username','username');
                echo form_error('username');
                echo form_input('username',set_value('username',$user->username),'class="form-control" readonly');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Email','email');
                echo form_error('email');
                echo form_input('email',set_value('email',$user->email),'class="form-control" readonly');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Change password','password');
                echo form_error('password');
                echo form_password('password','','class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Confirm changed password','password_confirm');
                echo form_error('password_confirm');
                echo form_password('password_confirm','','class="form-control"');
                ?>
            </div>
            <?php echo form_submit('submit', 'Save profile', 'class="btn btn-primary btn-lg btn-block"');?>
            <?php echo form_close();?>
			</div>
		 </div>
        </div> 
    </div>
	 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
		 <form enctype="multipart/form-data" action="<?php echo site_url('admin/user/update_photo');?>" method="post">
              <div class="modal-body">
               <input type="file" id="image" name="image" alt="Login" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save  </button>
              </div>
		 </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	  </section>  
</div>
  <script type="text/javascript">
  $(document).ready(function() {
     
    $("#manageProfil").addClass('active'); 
	
	 });
  </script>
  <script>
  var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: true,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors',
        msgErrorClass: 'alert alert-block alert-danger',
          // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
   
	});
 </script>