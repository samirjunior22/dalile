<style>
.error  {
	
	color:red;
}
 .abcRioButtonBlue:hover {
	 background-color:#38ccff;
}


</style>
 
 
<!-- About-us -->
<section id="about_info" class="section-padding" style="padding-top:40px;">
	<div class="container">
    	<div class="row">
        	<div class="col-md-5 col-md-offset-7">
            	<div class="white_box">
                    <h3> </h3>
                    <p>En appuyant sur Inscription, vous acceptez nos Conditions générales, notre Politique d’utilisation des données et notre Politique d’utilisation des cookies. Vous recevrez peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner..</p>
    <button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".modal">Commencer</button>
               </div>
            </div>
        </div>
    	
	</div>
</section>
<!-- /About-us -->

<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class=""><a href="#signin" data-toggle="tab">Connexion </a></li>
              <li class="active"><a href="#signup" data-toggle="tab">Inscrivez-vous</a></li>
              <li class=""><a href="#why" data-toggle="tab">Pourquoi ?</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in" id="why">
        <p>Nous avons besoin de ces informations pour que vous puissiez avoir accès au site et à son contenu. Soyez assuré que vos informations ne seront pas vendues, échangées ou données à qui que ce soit.</p>
        <p> <br>Veuillez contacter <a mailto:href="contact@eldalile.com">contact@eldalile.com</a>  pour toute autre demande.</p>
	    </div>
        <div class="tab-pane fade " id="signin">
            
            <fieldset>
            <!-- Sign In Form -->
             <!-- Password input-->
            <div class="white_box">
                	<h3>  </h3>
 
			   <div id="error" class="   alert-danger " ></div>
			     <form id="form1" >
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"  required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Connexion</button>
						    <p class="pull-right"><a href="<?=base_url('login/forgetpassword'); ?>">mote de pass oublié </a></p>
                        </div>
                  </form>
                  </div>
            </fieldset>
        
        </div>
        <div class="tab-pane fade active in" id="signup">
             
            <fieldset>
            <!-- Sign Up Form -->
            
            	<div class="white_box">
                	<h3> S'inscrire avec </h3>
					
					 <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"  data-width="363"   data-height="60"   data-longtitle="true"></div> 
                     <button id="login" style="height:60px;width:100%;margin-top: 5px;margin-right: 0px;  ;" class="btn btn-block btn-social btn-facebook">Sing in with Facebook</button>
        
	                 
                   
                    <p>Vous avez déja un compte ! <a href="<?=base_url('login'); ?>">connexion :</a></p>
                </div>
              </fieldset> 
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
 <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script> 
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
 <meta name="google-signin-client_id" content="555875078325-imfpg4tjk1hl23tker6jvm8ekb2okvf0.apps.googleusercontent.com">
 <script> 
 
$("#signupForm").validate({
			rules: {
				fname: "required",
				lname: "required",
				username: {
					required: true,
					minlength: 2
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
				email1:{
                    required: true,
                    email: true,
                         remote: {
                             url: "<?=base_url('register/check_email'); ?>",
                             type: "post",
							 data: {
				                email: function(){ return $("#email1").val(); }
			                  }
                           } 
				}		   
			},
			messages: {
				fname: "Entrez votre prénom s'il vous plait",
				lname: "Veuillez entrer votre nom de famille",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "S'il vous plaît fournir un mot de passe",
					minlength: "Trop court"
				},
				confirm_password: {
					required: "S'il vous plaît Confirmer mot de passe ",
					minlength: "Trop court",
					equalTo: "Les champs des mots de passe ne sont pas identiques"
				},
				email1: {
		                  required: 'Adresse e-mail est nécessaire',
		                  email: 'S\'il vous plaît, mettez une adresse email valide',
		                  remote: 'Adresse e-Mail déjà utilisée. Connectez-vous à votre compte existant.'
	               }                 
			} 
		}); 
		
	
 
 (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
 
  // initialize the facebook sdk
 
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2498690137034148',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v4.0' // The Graph API version to use for the call
    });
 
}
$(document).ready(function(){   
 
 // add event listener on the login button
 
 $("#login").click(function(){

    facebookLogin();

   
 }); 
 $("#logout").click(function(){

   $("#logout").hide();
   $("#login").show();
   $("#status").empty();
   facebookLogout();

 }); 
 function facebookLogin()
 {
   FB.getLoginStatus(function(response) {
       console.log(response);
       statusChangeCallback(response);
   });
 } 
 function statusChangeCallback(response)
 {
     console.log(response);
     if(response.status === "connected")
     {
        $("#login").hide();
  
        fetchUserProfile();
     }
     else{
         // Logging the user to Facebook by a Dialog Window
         facebookLoginByDialog();
     }
 }

 function fetchUserProfile()
 {
 
    FB.api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture', function(response) {
         $.ajax({
                  url:"<?=base_url('register/oaut'); ?>",
                             method:"POST",
    data : {email :response.email , GivenName:response.last_name,FamilyName:response.first_name,ImageUrl:response.picture.data.url, link:response.link},
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès",' Bienvenue M.'+ response.last_name +'', "success")  
										 .then((value) => { 
										 
										  window.location.replace("<?=base_url('/customer/setting/dashboard/'); ?>" );
											   });
											  }else {
										 $("#load").button('reset');  
										  swal("Erreur", " Erreur. ", "warning"); 
									  }
							    }
                        });
 
     
   });
 }

 function facebookLoginByDialog()
 {
   FB.login(function(response) {
      
       statusChangeCallback(response);
      
   }, {scope: 'public_profile,email'});
 }

 // logging out the user from Facebook

 function facebookLogout()
 {
   FB.logout(function(response) {
       statusChangeCallback(response);
   });
 }	
 });		
	
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
          var profile = googleUser.getBasicProfile();
          var id = profile.getId() ; // Don't send this directly to your server!
          var Name = profile.getName() ;
          var GivenName = profile.getGivenName() ;
          var FamilyName = profile.getFamilyName() ;
          var ImageUrl =  profile.getImageUrl() ;
          var Email =  profile.getEmail() ;
            
        var id_token = googleUser.getAuthResponse().id_token;
 
		
		  $.ajax({
                  url:"<?=base_url('register/oaut'); ?>",
                             method:"POST",
                             data : {email : Email , GivenName:GivenName,FamilyName:FamilyName,ImageUrl:ImageUrl},
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès",' Bienvenue M.'+ Name +'', "success")  
										 .then((value) => { 
										   
										  window.location.replace("<?=base_url('/customer/setting/dashboard/'); ?>" );
											   });
											  }else {
										 $("#load").button('reset');  
										  swal("Erreur", " Erreur. ", "warning"); 
									  }
							    }
                        });
		
      }	
	 
 </script> 
<script>	
   var frm = $('#form1');
         frm.submit(function(e){
		   $.ajax({
                type: 'post',
                 url: '<?=base_url('login/login'); ?>',
                 data: frm.serialize(),
				 dataType : "JSON",
				 success:function(response){
					 if (response.success == true) {
						 
                      window.location.replace("<?=base_url('customer/setting/dashboard/') ?>");
					  } else {
						
						 $('#error').html("<div id='message'></div>");
						 $('#error').addClass("alert").delay(1000).fadeOut(1000);
						 $("#form1")[0].reset();
                         $('#message').html("<span>"+response.messages+"</span>")
						
					 }
					
                },
                error: function(data) {
                    $('#error').html("<div id='errorMessage'></div>");
                    $('#errorMessage').html("<h3>"+response.messages+"</h3>")
                    .delay(2000).fadeOut(2000);
                }

            });

            e.preventDefault();
        }); 
		
		 var form = $('#signupForm');
          form.submit(function(e){
			  
			  if ($(this).valid()) { 
			  $("#load").button('loading');
			         $.ajax({
                            url:"<?=base_url('register/register'); ?>",
                             method:"POST",
                             data : form.serialize(),
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès", "Pour plus de sécurité veuillez valider votre compte via Boite Mail. ", "success")  
										 .then((value) => { 
										  $("#signupForm")[0].reset();
										  window.location.replace("<?=base_url('register/validate'); ?>" );
											   });
											    $("#load").button('reset'); 
											  }else {
										  $("#load").button('reset');
                                          $("#signupForm")[0].reset();										  
										  swal("Erreur", "Email déja existe ", "warning"); 
									 }
								  }
                        });
			 e.preventDefault();
		  } 
		});
 	
</script>
 <script>



</script>
 <script>
    </script>
