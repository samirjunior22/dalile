 	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/style.css"> <!-- Resource style -->
	 <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/labs.css">
     <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/masonry.css">
	<script src="<?php echo site_url('assets/filter-master/');?>js/modernizr.js"></script> <!-- Modernizr -->
 <?php 
 
 $soucats = getSouCategoryData();
 
 ?>
<style>
 
}
.post_category{
	padding-top:10px;
}
.box{
    overflow: hidden;
     position: relative;
}
.box:before{
    content: "";
    width: 100%;
    height: 100%;
    background: transparent;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    transition: all 0.4s ease 0s;
}
.box:hover:before{ background: rgba(0,0,0,0.8); }
.box img{
    width: 100%;
    height: auto;
    position: relative;
  
    transition: all 0.4s ease 0s;
}
.box:hover img{ left: 0; }
.box .box-content{
    width: 100%;
    height: 100%;
    padding: 10px;
    position: absolute;
    top: 0;
    
    z-index: 1;
}
.box .title{
	background: rgba(0,0,0,0.6);
    padding: 10px 10px  10px  10px;
	border-radius: 6px;
    margin: 0 0 20px 0;
 
    color: #fff;
    opacity: 1;
    position: relative;
    transition: all 0.3s ease 0s;
}
.box:hover .title{ opacity: 1; }
.box .title:after{
    content: "";
    width: 0;
    height: 2px;
    background: #fff;
    position: absolute;
    bottom: 0;
    left: 0;
    transition: all 0.3s ease 0s;
}
.box:hover .title:after{ width: 100%; }
.box .post{
    display: inline-block;
    font-size: 16px;
    color: #fff;
    opacity: 0;
 
    position: relative;
    left: 100%;
    transition: all 0.35s ease 0s;
}
.box:hover .post{
    opacity: 1;
    left: 0;
}
.box .icon{
    list-style: none;
    padding: 0;
    margin: 0;
    opacity: 0;
    position: relative;
    top: 50%;
    transition: all 0.35s ease 0s;
}
.box:hover .icon{
    opacity: 1;
    top: 0;
}
.box .icon li{ display: inline-block; }
.box .icon li a{
    display: block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    border-radius: 50%;
    background: #2886c9;
    text-align: center;
    font-size: 18px;
    color: #fff;
    margin-right: 10px;
    transition: all 0.5s ease 0s;
}
.box .icon li a:hover{ transform: rotate(360deg); }
@media only screen and (max-width:990px){
    .box{ margin-bottom: 10px; }
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
					<li class="filter"><a  href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&souCat='.$GsouCat.'&style=content') ?>" data-type="all">All</a></li>
					<li class="filter" data-filter=".Service"><a   class="selected"  href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&souCat='.$GsouCat.'&style=content') ?>" data-type="Service">List</a></li>
					<li class="filter" data-filter=".Pratique"><a href="<?=base_url('/pages/detail?wilaya='.$Gwilaya.'&title='.$Gtitle.'&souCat='.$GsouCat.'&style=map') ?>" data-type="Pratique">Map</a></li>
				 </ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">

			  <ul class="flex-container load_data masonry bordered" >
			  
			  </ul>
			  <div id="load_data_message"></div>
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
						 	<select class="filter" name="souCat" id="id">
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
<script src="<?php echo site_url('assets/filter-master/');?>js/main.js"></script> <!-- Resource jQuery 
 <!--	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
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
</script>

<script type='text/javascript'>
    /* <![CDATA[ */
    var CIURLS = {"siteurl" : "<?php echo base_url(); ?>",
	              "Gwilaya" : "<?php echo $Gwilaya; ?>", 
				  "Gcat" : "<?php echo $Gcat; ?>",
				  "GsouCat" : "<?php echo $GsouCat; ?>",
				  "Gtable" : "<?php echo $Gtable; ?>",
				  "Gtitle" : "<?php echo $Gtitle; ?>"};
    /* ]]> */
</script>

 <script src="<?php echo site_url('assets/scroll/script.js');?>"></script>
 <script src="<?php echo site_url('assets/scroll/jquery.cookie.min.js');?>"></script>
 