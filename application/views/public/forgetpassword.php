<?php $this->load->view('templates/_parts/public_master_header');    ?>
<body>
  <style>
.error  {
	
	color:red;
}

</style>
  
<section class="primary-bg">
	<div class="container">
    	<div id="login_signup">
            <div class="form_wrap_m">
            	<div class="white_box">
                	<h3>mote de pass oublié</h3>
					<?php if ($error) { echo '<div class="error">'.$error.'</div>' ;} ?>
	                <form action="<?=base_url('login/forgetpassword'); ?>" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Continuer">
                        </div>
                    </form>
                     <p>Retour à  <a href="<?=base_url('login'); ?>"> connexion</a></p>
                    <div class="back_home"><a href="<?=base_url(); ?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> retour</a></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts --> 
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/interface.js"></script> 
<!--Carousel-JS--> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
 <!--Switcher-->
<script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>
</body>

<!-- Mirrored from themes.webmasterdriver.net/ElemoListing/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 May 2019 01:42:24 GMT -->
</html>