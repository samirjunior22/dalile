<?php $this->load->view('templates/_parts/public_master_header');    ?>
 <body>
 <style>
.error  { 
	color:red;
}
 .abcRioButtonBlue:hover {
	 background-color:#38ccff;
}

</style>
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                <h4>S'inscrire avec</h4> 
                <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"  data-width="330"   data-height="60"   data-longtitle="true"></div>
                <button id="login" style="height:60px;width:100%;margin-top: 5px;margin-right: 0px;  ;" class="btn btn-block btn-social btn-facebook">Sing in with Facebook</button>
                 <p>Vous avez déja un compte ! <a href="<?=base_url('login'); ?>">connexion :</a></p>
                    <div class="back_home"><a href="<?=base_url('register/'); ?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> retour</a></div>
                 <script src="https://apis.google.com/js/client:platform.js" async defer></script>
				 <meta name="google-signin-client_id" content="555875078325-imfpg4tjk1hl23tker6jvm8ekb2okvf0.apps.googleusercontent.com">
 
  
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
          var profile = googleUser.getBasicProfile();
          var id = profile.getId() ; // Don't send this directly to your server!
          var Name = profile.getName() ;
          var GivenName = profile.getGivenName() ;
          var FamilyName = profile.getFamilyName() ;
          var ImageUrl =  profile.getImageUrl() ;
          var Email =  profile.getEmail() ;
          var pack =  <?php echo $pack ; ?> ;
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
 
		
		  $.ajax({
                  url:"<?=base_url('register/oaut'); ?>",
                             method:"POST",
                             data : {email : Email ,pack:pack,GivenName:GivenName,FamilyName:FamilyName,ImageUrl:ImageUrl},
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès",' Bienvenue M.'+ Name +'', "success")  
										 .then((value) => { 
										  $("#signupForm")[0].reset();
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

 // add event listener on the logout button

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
     var pack = 1;
    FB.api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture', function(response) {
         $.ajax({
                  url:"<?=base_url('register/oaut'); ?>",
                             method:"POST",
    data : {email :response.email ,pack:pack,GivenName:response.last_name,FamilyName:response.first_name,ImageUrl:response.picture.data.url, link:response.link},
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès",' Bienvenue M.'+ response.last_name +'', "success")  
										 .then((value) => { 
										  $("#signupForm")[0].reset();
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
</script>

				</div>
            </div>
        </div>
    </div>
</section>
<!-- Scripts --> 
				</div>
            </div>
        </div>
    </div>
</section>
<!-- Scripts --> 

 
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/interface.js"></script> 
<!--Carousel-JS--> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
 <!--Switcher-->
<script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert.min.js'); ?> "></script>
  <script> 
	 

	$.validator.setDefaults({
		submitHandler: function() {
			         $("#load").button('loading');
					 $.ajax({
                             url:"<?=base_url('register/register'); ?>",
                             method:"POST",
                             data : $("#signupForm").serialize(),
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès", " Pour plus de sécurité veuillez valider votre compte via Boite Mail. ", "success")  
										 .then((value) => { 
										  $("#signupForm")[0].reset();
										  window.location.replace("<?=base_url('register/validate'); ?>" );
											   });
											  }else {
										 $("#load").button('reset');  
										  swal("Erreur",' '+data.messages+' ', "warning"); 
									  }
							    }
                        });
			 
		}
	});
	
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
		
	 </script>
</body>
</html>