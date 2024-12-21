<!-- Modal -->
 
  <link rel="stylesheet" href="<?=base_url('assets/css/dist/simpleLightbox.min.css') ;?>">
  <script src="<?=base_url('assets/css/dist/simpleLightbox.min.js') ;?>"></script>
<style>
  .modal-full-height { 
  width: 100%; 
  max-width: 100%; 
  min-height: 0;
  top: 130px;
   height: auto;
 bottom: auto; 
     position: absolute;
     margin: 0;
    right: 0;
	}
    .imageGallery1 {

        overflow: hidden; margin: 30px -20px;

    }
    .imageGallery1 > a {

        float: left; width: 33.3333%; padding: 1px; box-sizing: border-box; position: relative;

    }

    .imageGallery1 > a:first-child { left: -1px; }
    .imageGallery1 > a:last-child { right: -1px; }

    .imageGallery1 > a > img {

        display: block; width: 100%;

    }
 
</style>


<div class="modal fade fadeInUp  " id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="overflow: auto:"
  aria-hidden="true">
  <div class="modal-dialog  modal-full-height modal-bottom" role="document" >
    <div class="modal-content" >
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        
		
		 
<div class="container" >
  <div class="imageGallery1">
	<div class="row"> 
	 
	   
		      
				   <?php foreach ($allPhoto as $image) {?>	<div class="col-md-3 col-sm-4 col-xs-6">
         <a href="<?php echo base_url('/assets/images/product_image/'.$image['photo']) ; ?>" ><img  class="img-thumbnail" src="<?php echo base_url('/assets/images/product_image/'.$image['photo']) ; ?>" alt="image " /></a>
	        </div>     <?php } ?>  
        
	 
     </div> 
 
 
 
 
<script>
    $('.imageGallery1 a').simpleLightbox();
 
</script>
  
      </div>
    </div>
   </div>
  </div>
  </div>
</div> 


 