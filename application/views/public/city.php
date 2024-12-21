 
 
<!-- /Inner-Banner -->

<!-- How-it-work -->
<section id="inner_pages" >
	<div class="container" style="padding-top:30px;">
	  <div class="row">
         <?php foreach($wilayas as $wilaya) { ?>
		 <div class="col-md-3">
            <div class="thumbnail">
               <a href="<?=base_url('pages/services?wilaya='.$wilaya['id']); ?>">
               <div class="caption">
               <p><?php echo $wilaya['name']?> -  <span> <?php echo '(' .getLByWilaya($wilaya['id']).')'; ?> </span></p>
              </div>
           </a>
          </div>
       </div>
   
		 <?php } ?>
   </div> </div>
</section>
 