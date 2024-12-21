   <link rel="stylesheet" href="<?=base_url('assets/docs/css/cropper.css') ?>">
  <style>
    .label {
      cursor: pointer;
    } 
    .progress {
      display: none;
      margin-bottom: 1rem;
    }  
    .img-container img {
      max-width: 100%;
    }
	 .cropper-view-box,
     .cropper-face {
      border-radius: 50%;
    } 
	 .pic-circle{
      border-radius: 50%;
   }
 .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
 }
   .label:hover .pic-circle {
       opacity: 0.3;
   }

.label:hover .middle {
  opacity: 1;
}
  </style>

  <div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Paramètres généraux du compte</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?=base_url('customer/setting/dashboard/') ?>">Home</a></li>
							<li><a href="<?=base_url('/customer/setting/edit') ?>" >Profil</a></li>
							<li>Mettre à jour </li>
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
		 			<label class="label" data-toggle="tooltip"  >
  
	  <img class="pic-circle rounded" id="avatar" src="<?php echo $customer->picture ; ?>" alt="avatar">
        
	   <input type="file" class="sr-only" id="input" name="image" accept="image/*">
    </label>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
    </div>
 
		    <div class="pull-right">
		        <h2 ><?php echo $customer->firstname .' '. $customer->lastname ; ?></h2>
			   <span >dernière mise à jour : <a><?php echo $customer->modified ; ?></a></span>
			 </div>
		      
		  
                 </div>
			          <div class="add_listing_info">
                            <h3>Profile</h3>				
                           
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="label-title">Nom</label>
                                    <input type="text" value="<?php echo $customer->firstname ?>" id ="firstname" name="firstname" class="form-control" required>
                                </div>  
                                <div class="form-group col-sm-6">
                                    <label class="label-title">Prenom</label>
                                    <input type="text" value="<?php echo $customer->lastname ?>" id="lastname" name="lastname" class="form-control" required>
                                </div>  
                            </div>
                            <div class="row">
                            	<div class="form-group col-sm-6">
                                    <label class="label-title">Email  </label>
                                    <input type="text"  disabled id="Email" name="Email" value="<?php echo $customer->email ?>" class="form-control" required>
                                </div>
	                            <div class="form-group col-sm-6">
                                    <label class="label-title">Téléphone <span> </span></label>
                                    <input type="text" name="Phone"  id="Phone" value="<?php echo $customer->phone ?>" class="form-control">
                                </div> 
                            </div>
                            <div class="row">
            	                <div class="form-group col-sm-6">
                                    <label class="label-title">Date Naissance  </label>
                                    <input type="date" id="Date" name="Date" value="<?php echo $customer->birthday ?>"  class="form-control" placeholder="Date Naissance ">
                                </div>
	                                
                            </div>             
                        </div>
						
						  <div class="add_listing_info">
 <button type="button" onclick="update()" class="btn btn-default" > mettre à jour </button>
                          </div>   
                    
                </div>
			</div>

			 
		</div>
	</div>
	<!-- Content / End -->
</div>
</div>	

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Recadrer l'image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="crop">Recadrer</button>
          </div>
        </div>
      </div>
    </div>
	
  <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">   </h5>
			
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Pour des raisons de sécurité, cette action nécessite votre mot de passe.</p>
			    
          </div>
         <div id="error" class=" alert-danger " > </div>
		 <input type="password" name="password" id="pass" class="form-control" placeholder="Mot de pass">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" id="submitpass"  class="btn btn-primary" id="crop">envoyer</button>
          </div>
	 
        </div>
      </div>
    </div> 	
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('assets/docs/js/cropper.js') ?>"></script>
  <script>
    window.addEventListener('DOMContentLoaded', function () {
      var avatar = document.getElementById('avatar');
      var image = document.getElementById('image');
      var input = document.getElementById('input');
      var $progress = $('.progress');
      var $progressBar = $('.progress-bar');
      var $alert = $('.alert');
      var $modal = $('#modal');
      var cropper; 
      $('[data-toggle="tooltip"]').tooltip(); 
      input.addEventListener('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
          input.value = '';
          image.src = url;
          $alert.hide();
          $modal.modal('show');
        };
        var reader;
        var file;
        var url; 
        if (files && files.length > 0) {
          file = files[0];

          if (URL) {
            done(URL.createObjectURL(file));
          } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }
      });

      $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 3,
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
      });

      document.getElementById('crop').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');

        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
          });
          initialAvatarURL = avatar.src;
          avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();
            var dat = blob ;
            formData.append('avatar', blob, 'avatar.jpg');
			var dataURL =  document.getElementById('avatar').value = canvas.toDataURL('image/png');
            $.ajax('<?=base_url('customer/setting/cropI') ?>', {
              method: 'POST',
               data: {dataURL: dataURL} ,
			   xhr: function () {
                var xhr = new XMLHttpRequest();
                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              }, 
              success: function (response) {
				  
                location.reload();
				
              },

              error: function () {
                avatar.src = initialAvatarURL;
                $alert.show().addClass('alert-warning').text('error');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      });
    });
  </script>
    <script type="text/javascript"> 
 function update()
{ 

var  $modalpass = $('#password')
     $modalpass.modal('show');
	 
 $( "#submitpass" ).on('click', function() {
    var pass = $("#pass").val();
	$.ajax({
        url: '<?=base_url('customer/setting/check_pass') ?>',
        type: "post",
         data:{ pass:pass },
         dataType: 'json',
         success:function(response) {
			 
          if(response.success === true) {

              var firstname = $("#firstname").val();
              var lastname = $("#lastname").val();
              var Phone = $("#Phone").val();
              var Date = $("#Date").val();
			  
			  $.ajax({
                url: '<?=base_url('customer/setting/editProfil') ?>',
                type: "post",
                data:{
			        firstname:firstname ,
			        lastname: lastname ,
			        Phone :Phone ,
			        Date : Date 
		         },  
                dataType: 'json',
                success:function(response) {
                  if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $modalpass.modal('hide');
			 $('input[name=password').val('');

           } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }

			    }
		   
		      });
			   return false;
		   
			 } else {
			
			  $('#error').html("<div id='message'></div>");
			  $('#error').addClass("alert").fadeOut(1000);
			 $('input[name=password').val('');
			  $('#message').html("<span>"+response.messages+"</span>")
			 }
			
          } // response Check password
      }); // first ajax request
    });   
 }	 
 
   </script>
 