	 <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/labs.css">
     <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/masonry.css">

 <style>
 
#flex-cont > :nth-child(-n + 4) {
  page-break-before: always; /* CSS 2.1 syntax */
  break-before: always;  /* New syntax */
}

 </style>
<section id="inner_pages" >
 
<div class="container" style="padding-top:30px;" >
 <p>Les activités phares de  <?php echo $wilaya['name'] ; ?> :</p>
	<div class="container masonry bordered"  id="flex-container">
	    <?php foreach($cats as $cat) { ?>
		 <div class="  " >
            <div class="thumbnail">
             <div class="caption">
               <p><?php echo $cat['name']?> </p>
               </div>
              <ul>
				<?php  foreach(getSouCategoryData($cat['id']) as $souCat){ ?>
				 <li> <a href="<?=base_url('/pages/detail?wilaya='.$wilaya['id'].'&title='.$souCat['name'].'&souCat='.$souCat['id']); ?>"><span> - <?php echo $souCat['name']?>  </span></a> (<?php echo getLBySouCat($souCat['id'] ,$wilaya['id'] )?>)</li>
				 <?php } ?>
				</ul>
          </div>
       </div> 
		 <?php } ?>
		 </div>
   </div>
  <div class="container" style="padding-top:30px;" >
 <p>Tous Les Professionnels de <?php echo $wilaya['name'] ; ?> :</p>
	<div class="container masonry bordered"  id="flex-container">
	    <?php foreach($Services as $Service) { ?>
		 <div class="  " >
            <div class="thumbnail">
             <div class="caption">
               <p><?php echo $Service['name']?> </p>
               </div>
              <ul>
				<?php  foreach(getServicesSouCategoryData($Service['id']) as $SersouCat){ ?>
				 <li> <a href="<?=base_url('/services/detail?wilaya='.$wilaya['id'].'&title='.$SersouCat['name'].'&souCat='.$SersouCat['id']); ?>"><span> - <?php echo $SersouCat['name']?>  </span></a> (<?php echo getSBySouCat($souCat['id'] ,$wilaya['id'] )?>) </li>
				 <?php } ?>
				</ul>
          </div>
       </div> 
		 <?php } ?>
		 </div>
   </div>  
</section>
 