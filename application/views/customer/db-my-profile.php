  <link rel="stylesheet" href="<?=base_url('assets/docs/css/cropper.css') ?>">
  <style>
    .label {
      cursor: pointer;
    }

    .progress {
      display: none;
      margin-bottom: 1rem;
    }

    .alert {
      display: none;
    }

    .img-container img {
      max-width: 100%;
    }
	 .cropper-view-box,
     .cropper-face {
      border-radius: 50%;
    }
  </style>


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

 .pic-circle{
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


 
#my-image, #use {
  display: none;
}

</style>	<!-- Content -->
 
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Profile</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?=base_url('customer/setting/dashboard/') ?>">Home</a></li>
							 <li>My Profile</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
        
        <div class="row">			
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
				 <div class="user_image">
				  <label class="label" data-toggle="tooltip" >
                   <img class="pic-circle rounded" id="avatar" src="<?php echo  $customer->picture ; ?>" alt="avatar">
                 </label>
                  <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                   </div>
                  <div class="alert" role="alert"></div>   	 
 
                        <div class="buttons-to-right">
                  <a href="<?=base_url('customer/setting/edit') ?>" class="button gray"><i class="fa fa-pencil"></i> Edit Profile</a>
               <a data-toggle="modal" data-target="#exampleModal" class="button gray"><i class="fa fa-pencil"></i>Changer le mot de passe </a>
                       
					   </div>
						 
                    </div>
                    <div class="user_info">
                    	<ul>
                        	<li><a> </span><?php echo $customer->firstname .' '. $customer->lastname ; ?></a>
                            <li><a> </span><?php echo $customer->email  ; ?></a>
                            <li><span> </span><?php echo $customer->phone  ; ?></li>
                        </ul>
                    </div>
                </div>
			</div>
 
			 
		</div>
	</div>
	<!-- Content / End -->
</div>
</div>					 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	 <form id="form1" action="<?php echo site_url('customer/setting/change_password');?>" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Changer le mot de passe </h5>
		  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
		 </button>
		
      </div>
      <div class="modal-body">
	  <div class="add_listing_info">
	    <div class="row">
		     <div class="form-group col-sm-12">
                        <label class="label-title">Actuel</label>
                        <input type="password"  id="password1" name="password1" class="form-control" required>
               </div>  
               <div class="form-group col-sm-12">
                         <label class="label-title">Nouveau</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                  </div> 
 				  <div class="form-group col-sm-12">
                         <label class="label-title">Confirmer</label>
                         <input type="password" id="confirm_password" name="confirm_password" class="form-control" required 
						 
                  </div>
		 	<div id="success" style="color:green;"></div>
		    <div id="error" style="color:red;"></div>
        </div>
       </div>
	 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
	   </form>
    </div>
  </div>
</div>
 
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>	
  <script type="text/javascript">
  $("#profil").addClass('active'); 
	$( "#form1" ).validate( {
				rules: {
					password1: {
						required: true,
						minlength: 5
					}, 
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					}, 
				},
				messages: {
					 password1: {
						required: "Please provide a password",
						minlength: "Trop court."
					},
					password: {
						required: "Please provide a password",
						minlength: "Trop court"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Trop court",
						equalTo: "Les mots de passe ne sont pas identiques"
					}, 
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" ); 
					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" ); 
					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					} 
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					 
	    var frm = $('#form1');
        frm.submit(function(e){
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
				dataType:"json",
                success: function(response){
					 if (response.success == true) {
                    $('#success').html("<div   id='message'></div>");
                    $('#message').html("<span>"+response.messages+"</span>")
                     .delay(1000).fadeOut(1000);
                     $("#exampleModal").modal('hide');
                     $("#form1")[0].reset();					 
					  } else {
						
						 $('#error').html("<div id='message'></div>");
                         $('#message').html("<span>"+response.messages+"</span>") 
					 }
					
                },
                error: function(data) {
                    $('#error').html("<div id='errorMessage'></div>");
                    $('#errorMessage').html("<h3>Error, please try again!</h3>")
                    .delay(2000).fadeOut(2000);
                }

            });

            e.preventDefault();
        });
					  
					 
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
   </script>
 <script type="text/javascript">
$(document).ready(function() {
      
    });
</script>