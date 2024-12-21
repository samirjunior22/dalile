<?php $this->load->view('templates/_parts/public_master_header');    ?>
   <link rel="stylesheet" href="<?=base_url('assets/docs/css/cropper.css') ?>">
<body>
 
    
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>Confirmation </h3>
 
			   <div id="error" class="   alert-danger " ></div>
			     
                    <p>Un email de confirmation a été envoyé à votre adresse email.  </p>
                    <p><a href="<?=base_url('login'); ?>">Vérifiez votre adresse email</a></p>
                    <div class="back_home"><a href="<?php echo base_url();?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Back to Home</a></div>
                </div>
            </div>
        </div>
    </div>
</section> 			 
	  
<!-- Scripts --> 

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/interface.js"></script> 
<!--Carousel-JS--> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
 <!--Switcher-->
<script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>

  
</body>

<!-- Mirrored from themes.webmasterdriver.net/ElemoListing/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 May 2019 01:42:24 GMT -->
</html>