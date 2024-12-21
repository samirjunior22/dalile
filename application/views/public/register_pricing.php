<?php $this->load->view('templates/_parts/public_master_header');    ?>

<body>
 
<section class="primary-bg">
<section id="inner_pages">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="pricing_wrap">
                	<div class="pricing_header">
                    	<h2>Pack Starter</h2>
                     </div>
					  <div class="plan_info">
                    <div class="plan_price">gratuit</div>
                        <ul>
                        	<li><span> </span>  Apparaissez dans le site </li>
                            <li><span>90 Jours</span> Disponibilité</li>
                            <li><span>standard </span> annonce</li>
                            <li><span>Limité </span> Support</li>
                        </ul>
      <a class="btn btn-primary btn-lg" href="<?=base_url('/register/index?pack=1') ?>"  >Commencer</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="pricing_wrap active">
                	<div class="pricing_header">
                    	<p class="popular_plan"> populaire</p>
                    	<h2> Professionnel</h2>
                    </div>
                    <div class="plan_info">
                    	<div class="plan_price">500 Dzd/mois</div>
                        <ul>
                        	<li><span>Apparaissez</span> dans le site </li>
                        	<li><span>Apparaissez</span> dans les dépliants</li>
                            <li><span>12 mois</span> Disponibilité</li>
						    <li><span>24/7 </span> Support</li>
                        </ul>
                        
      <a class="btn btn-primary btn-lg" href="<?=base_url('/register/index?pack=2') ?>"  >Commencer</a>
					 
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="pricing_wrap">
                	<div class="pricing_header">
                    	<h2>Pack entreprise</h2>
                     </div>
                    <div class="plan_info">
                    	<div class="plan_price">1600 Dzd/mois</div>
                        <ul>
                        	<li><span>Apparaissez</span> dans le site </li>
                        	<li><span>Apparaissez</span> dans les dépliants</li>
                            <li><span>IlLimité </span> Disponibilité</li>
						    <li><span>Propriétés </span> supplémentaires </li>
                            <li><span>24/7 </span> Support</li>
                        </ul>
      <a class="btn btn-primary btn-lg" href="<?=base_url('/register/index?pack=3') ?>"  >Commencer</a>
                    </div>
                </div>
            </div>
        </div>
     </div>
	</section>
</section>
<!-- /Pricing --> 

 
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
			         
					 $.ajax({
                            url:"<?=base_url('register/register'); ?>",
                             method:"POST",
                             data : $("#signupForm").serialize(),
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès", " Pour plus de sécurité veuillez valider votre compte via un numéro de téléphone. ", "success")  
										 .then((value) => { 
										  $("#signupForm")[0].reset();
										  window.location.replace("<?=base_url('/login'); ?>" );
											   });
											  }else {
											 		  
										  swal("error", "Email déja existe ", "warning"); 
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
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
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
				email: "S'il vous plaît, mettez une adresse email valide",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});
		
	 </script>
</body>
</html>