 <style> 
/* image thumbnail */
.thumb {
    display: block;
	width: 100%;
	margin: 0;
}

/* Style to article Author */
.by-author {
	font-style: italic;
	line-height: 1.3;
	color: #aab6aa;
}

/* Main Article [Module]
-------------------------------------
* Featured Article Thumbnail
* have a image and a text title.
*/
.featured-article {
	width: 482px;
	height: 350px;
	position: relative;
	margin-bottom: 1em;
}

.featured-article .block-title {
	/* Position & Box Model */
	position: absolute;
	bottom: 0;
	left: 0;
	z-index: 1;
	/* background */
	background: rgba(0,0,0,0.7);
	/* Width/Height */
	padding: .5em;
	width: 100%;
	/* Text color */
	color: #fff;
}

.featured-article .block-title h2 {
	margin: 0;
}

/* Featured Articles List [BS3]
--------------------------------------------
* show the last 3 articles post
*/

.main-list {
	padding-left: .5em;
}

.main-list .media {
	padding-bottom: 1.1em;
	border-bottom: 1px solid #e8e8e8;
}
 </style> 
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Photos</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li> Photos </li>
						</ul>
					</nav>
				</div>
				
				
				
				
				
			 <div class="col-lg-12 col-md-12">
			 
			  <div class="row">
			   <?php foreach ($results as $result) {?> 
  <div class="col-md-3">
    <div class="thumbnail">
      <a href="<?php echo base_url('customer/Gallery/album/'.$result['id']); ?>">
        <img src="<?php echo base_url('assets/images/listings/'.$result['photo']); ?>" alt="Lights" style="width:100%">
        <div class="caption">
          <p><?php echo $result['Title'] ; ?></p>
          <p>photos : <?php echo $result['countimage'] ; ?></p>
        </div>
      </a>
    </div>
  </div>
   <?php  } ?>
  
</div>
 
			</div>
			</div>
		</div>
	  
	</div>
	<!-- Content / End -->
</div>
</div> 

 <div class="modal fade" tabindex="1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Listings</h4>
      </div>

      <form role="form" action="<?php echo base_url('customer/bookmarks/romoveFavoris') ?>" method="post" id="removeFavoris">
        <div class="modal-body">
          <p>vouler vous supprimer ? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <script type="text/javascript">
	   $("#Gere").addClass('act');
	   $("#Gallery").addClass('open');
	   $("#Gallery").addClass('active');
 
	    
 </script>