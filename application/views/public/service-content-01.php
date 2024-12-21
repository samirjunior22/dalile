 	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/style.css"> <!-- Resource style -->
	<script src="<?php echo site_url('assets/filter-master/');?>js/modernizr.js"></script> <!-- Modernizr -->
 <?php 
 
 $soucats = getSouCategoryData();
 
 ?>
<style>
 .flex-container {
  display: flex;
  flex-flow: column wrap;
}

.flex-container > :nth-child(3n + 1) { order: 1; } /* 1st column */
.flex-container > :nth-child(3n + 2) { order: 2; } /* 2nd column */
.flex-container > :nth-child(3n + 3) { order: 3; } /* 3rd column */
 

.flex-container > :nth-child(-n + 3) {
  page-break-before: always; /* CSS 2.1 syntax */
  break-before: always;  /* New syntax */
}

 .ajax-load{
   			background: #e1e1e1;

		    padding: 10px 0px;

		    width: 100%;
 }

</style>	
<section id="inner_pages" style="padding-top:50px;">
 
	<header class="cd-header">
	 </header>
   <main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					<li class="filter"><a  href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&id='.$Gid.'&style=content') ?>" data-type="all">All</a></li>
					<li class="filter" data-filter=".Service"><a   class="selected"  href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&id='.$Gid.'&style=content') ?>" data-type="Service">List</a></li>
					<li class="filter" data-filter=".Pratique"><a href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&id='.$Gid.'&style=map') ?>" data-type="Pratique">Map</a></li>
				 </ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul class="flex-container">
		 <?php if($listing) { 
			        foreach($listing as $row ) { ?> 
	     <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="well well-sm">
                <div class="row " >
                    <div class="col-sm-6 col-md-6">
                        <img src="<?php echo site_url('assets/images/listings/'. $row['photo']);?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-6">
                 <div class="listing_info" style="padding:0;">
                        <div class="post_category">
                            <a href="#">Hôtels et voyages</a>
                        </div>
          <h4><a href="<?=base_url('/Listing_detail/index/'.$row['id']); ?>"><?php echo $row['Title'] ?></a></h4>
                          <p><p><i class="fa fa-phone "></i>   <?php echo $row['phone'] ?>.</p>
                          <p><i class="fa fa-envelope "></i> <?php echo $row['Email'] ?>.</p>
                        
                          <div class="listing_review_info" style="margin:0;">
                           
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> <?php echo $row['wilaya'] ?></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
		  <?php } }else {?>
		  <div class="cd-fail-message">Aucun résultat trouvé</div>
		  <?php } ?>
		   <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
          </div>
		     </ul>
			 
		
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form action="<?=base_url('pages/detail'); ?>">
				<div class="cd-filter-block">
					<h4>Mot clé</h4>
					
					<div class="cd-filter-content">
						<input type="search" name="title" placeholder="Mot clé">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
            <!--   <div class="cd-filter-block">
					<h4> Prix </h4>
                      <div class="cd-filter-content">
					  
					   <input type="text" name="maximum_range" id="maximum_range" class="form-control" value="1500" />
                     </div>
				</div>  -->

				<div class="cd-filter-block">
					<h4>localisation</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="wilaya" id="wilaya">
							 <option  value="">Selection Wilaya</option>
							 <?php foreach ($wilaya as $w) {?>
                 	    	    <option  value="<?php echo $w['id']?>"><?php echo $w['id'].' - '.$w['name']?></option>
                         <?php } ?>
							 </select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
               <div class="cd-filter-block">
					<h4>Catégorie</h4>
					 <div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="catid" id="ctid">
							   <option  value="">Selectionner Catégorie</option>
							<?php foreach ($cats as $cat) {?>
                	    	      <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php } ?>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				  <div class="cd-filter-block">
					<h4>Afficher Tous</h4>
					 <div class="cd-filter-content">
						<div class="cd-select cd-filters">
						 	<select class="filter" name="id" id="id">
							       <option  value="">Selectionner</option>
								<?php foreach ($soucats as $cat) {?>
                	    	      <option  value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php } ?>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				
				     <button type="submit"   class="btn btn-default" >filtrer</button>
			</form>
         
			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
<script src="<?php echo site_url('assets/filter-master/');?>js/jquery-2.1.1.js"></script>
<script src="<?php echo site_url('assets/filter-master/');?>js/jquery.mixitup.min.js"></script>
<script src="<?php echo site_url('assets/filter-master/');?>js/main.js"></script> <!-- Resource jQuery -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</section>

<script>
$( "#price_range" ).slider({
		range: true,
		min: 1000,
		max: 20000,
		values: [ 200, 1000 ],
		slide:function(event, ui){
			$("#minimum_range").val(ui.values[0]);
			$("#maximum_range").val(ui.values[1]);
			load_product(ui.values[0], ui.values[1]);
		}
	});
	
	$(window).load(function() {
    $('.container').find('img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    })
})

 var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
           loadMoreData(page);
          }
        });

 function loadMoreData(page){
      $.ajax(
            {
          url: 'http://localhost/service/pages/detail?page=' + page,
          type: "get",
          beforeSend: function()
             {
               $('.ajax-load').show();
               }
              })
          .done(function(data)

	        {
              if(data == " "){
                $('.ajax-load').html("No more records found");

	                return;

	            }

	            $('.ajax-load').hide();
                $("#post-data").append(data);
              })

	        .fail(function(jqXHR, ajaxOptions, thrownError)
              {

	              alert('server not responding...');

	        });

	}
</script>
 