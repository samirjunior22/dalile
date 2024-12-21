 			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">Copyright &copy; 2019 El Dalile . All Rights Reserved</div>
			</div>
   
</div> 

<script type="text/javascript">
 var url = '<?=base_url(); ?>';
$('.nonlu').click(function() {
    $(this).next().hide();
    $(this).hide();
    var notificationId = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: url+'customer/notifications/read/'+notificationId,
        success: function(data, textStatus) {
			
            $('#notifications-liting').html(data);
			
        },
        error: function() {
            alert('Not OKay');
        }
    });
});
$('.rIcon').click(function() {
     
    var notificationId      = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: url+'customer/notifications/read/'+notificationId,
        success: function(data, textStatus) {
            $('#'+notificationId).removeClass('nonlu');
        },
        error: function() {
            alert('Not OKay');
        }
    });
});
</script>
 
 <script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert.min.js'); ?> "></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/interface.js"></script> 
<!--Carousel-JS--> 
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<!-- Clockpiker-->
<script type="text/javascript" src="<?php echo base_url();?>assets/clock/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/clock/highlight.min.js"></script>
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>
<!-- jquery validate-->
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
</body>

<!-- Mirrored from themes.webmasterdriver.net/ElemoListing/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 May 2019 01:42:23 GMT -->
</html>