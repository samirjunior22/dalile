<?php $this->load->view('templates/_parts/public_master_header');    ?>
   <link rel="stylesheet" href="<?=base_url('assets/docs/css/cropper.css') ?>">
    <style>
.error  { 
	color:red;
}
 .abcRioButtonBlue:hover {
	 background-color:#38ccff;
}

</style>
<body>
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <meta name="google-signin-client_id" content="555875078325-imfpg4tjk1hl23tker6jvm8ekb2okvf0.apps.googleusercontent.com">
    
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>Connexion : </h3>
					
         <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"  data-width="330"   data-height="60"   data-longtitle="true"></div>
          <button id="login" style="height:60px;width:100%;margin-top: 5px;margin-right: 0px;  ;" class="btn btn-block btn-social btn-facebook">Sing in with Facebook</button>

		<div id="error" class="   alert-danger " ></div>
		       <p>Vous n'avez pas de compte?<a href="<?=base_url('register'); ?>">Inscrivez-vous </a></p>
                    <p><a href="<?=base_url('login/forgetpassword'); ?>">mote de pass oublié </a></p>
                    <div class="back_home"><a href="<?php echo base_url();?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> retour</a></div>
                </div>
            </div>
        </div>
    </div>
</section> 			 
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
          var pack =  <?php echo 2  ; ?> ;
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
<!-- Scripts --> 

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/interface.js"></script> 
<!--Carousel-JS--> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
 <!--Switcher-->
<script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert.min.js'); ?> "></script>
 
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
						 $('#error').addClass("alert");
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
					 
 				 
			 
</script>
</body>
 </html>