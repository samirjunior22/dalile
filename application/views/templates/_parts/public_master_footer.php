 
<!-- Footer -->
<footer id="footer" class="secondary-bg">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="footer_widgets">
                	<h5>Contactez nous</h5>
                    <div class="follow_us">
                    	<ul>
                        	<li><a target="_blanck" href="https://www.facebook.com/eldalilee"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a target="_blanck" href="https://twitter.com/DalileEl"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a target="_blanck" href="https://www.linkedin.com/company/eldalile/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a target="_blanck" href="mail:contact@eldalile.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a target="_blanck" href="https://www.facebook.com/eldalilee"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="footer_widgets">
                	<h5>Liens rapides</h5>
                    <div class="footer_nav">
                    	<ul>
                        	<li><a href="<?php echo base_url('how-it-work');?>">Comment ça marche</a></li>
                            <li><a href="<?php echo base_url('about-us');?>">a propos</a></li>
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><a href="<?php echo base_url('contact-us');?>">Contactez-nous</a></li>
                         <!--  <li><a href="#">Privacy Policy</a></li> -->  
                         <!--  <li><a href="#">Terms & condition</a></li> -->  
                           
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="footer_widgets">
                	<h5>Notre newsletter</h5>
                    <div class="newsletter_wrap">
                    	<form action="#" method="get">
                        	<input type="email" class="form-control" placeholder="Enter Email Address">
                            <input type="submit" value="subscribe" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer_bottom">
    	<div class="container">
        	<p>Copyright &copy; 2019 - 2020  EL-Dalile | الدليل .Tous les droits sont réservés</p>
        </div>
    </div>
</footer>
 <script src="<?=base_url('assets/colorlib/') ; ?>js/main-min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://rawgit.com/w3c/IntersectionObserver/master/polyfill/intersection-observer.js"></script>
<!-- /Footer -->
    <script type="text/javascript">
    toastr.options = {
        "progressBar": true,
        "timeOut": "1500"
    }
	  var observer = lozad('.lozad', {
        threshold: 0.1,
        load: function(el) {
            el.src = el.getAttribute("data-src");
            
        }
    })
    
    var pictureObserver = lozad('.lozad-picture', {
        threshold: 0.1
    })
 
    var backgroundObserver = lozad('.lozad-background', {
        threshold: 0.1
    })
  observer.observe()
    pictureObserver.observe()
    backgroundObserver.observe()
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131689813-1"></script>
	 <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
 <script type="text/javascript">
		$(document).ready(function(){

		    $('#title').autocomplete({
                source: "<?php echo site_url('welcome/get_autocomplete');?>",
     
                select: function (event, ui) {
                    $('[name="title"]').val(ui.item.label); 
                    $('[name="id"]').val(ui.item.id); 
                    $('[name="table"]').val(ui.item.table); 
                }
            });

		});
	</script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-131689813-1');
    </script>
 
 
  
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/interface.js"></script> 
<!--Carousel-JS--> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>    
 <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert.min.js'); ?> "></script>
 
<script src="<?php echo base_url();?>assets/switcher/js/switcher.js"></script>
</div>
</body>

<!-- Mirrored from themes.webmasterdriver.net/ElemoListing/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 May 2019 01:35:08 GMT -->
</html>