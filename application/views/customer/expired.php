 
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Listings</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Listings</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
         <div id="messages"></div>
        <div class="row">
		   <!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
					<h4> Expired</h4>
					<ul>
					
						<?php if ( $results ) {?> 
						<?php foreach ( $results as $listing) {?> 
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="<?php echo base_url('assets/images/listings/'.$listing['photo']); ?>" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a target='_blanck' href="<?=base_url('listing_detail/index/'.$listing['id']) ?>"><?php echo $listing['Title'] ?></a></h3>
										<span><?php echo $listing['Tag_Line'] ?></span>
										<div class="star-rating">
											<div class="rating-counter">(<?php echo $listing['totals'] ?> reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
							 <a href="#" onclick="removeFunc(<?php echo $listing['id'] ?>)" class="button red" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash-o"></i> Delete</a>
								<a href="<?php echo base_url('customer/listing/edit/'.$listing['id']); ?>" class="button gray"><i class="fa fa-trash-o"></i> Edit</a>
							</div>
						</li>
						  <?php } ?>
						<?php } else {  ?>
						
				 
						<li>
							Il n'y a pas  <strong><a href="#"> d'annonce</a></strong> Expired !
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<?php } ?>
			
					</ul>
				</div>
			</div>
			
			 
		</div>
		
		 <div class="row">
		   <!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
					<h4> Expired</h4>
					<ul>
					
						<?php if ( $resultsSer ) {?> 
						<?php foreach ( $resultsSer  as $resultsSer ) {?> 
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="<?php echo base_url('assets/images/services/'.$resultsSer ['photo']); ?>" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a target='_blanck' href="<?=base_url('listing_detail/index/'.$resultsSer ['id']) ?>"><?php echo $resultsSer ['Title'] ?></a></h3>
										<span><?php echo $resultsSer ['Tag_Line'] ?></span>
										<div class="star-rating">
											<div class="rating-counter">(<?php echo $resultsSer ['totals'] ?> reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
							 <a href="#" onclick="removeFunc(<?php echo $resultsSer ['id'] ?>)" class="button red" data-toggle="modal" data-target="#removeService"><i class="fa fa-trash-o"></i> Delete</a>
								<a href="<?php echo base_url('customer/services/edit/'.$resultsSer ['id']); ?>" class="button gray"><i class="fa fa-trash-o"></i> Edit</a>
							</div>
						</li>
						  <?php } ?>
						<?php } else {  ?>
						
				 
						<li>
							Il n'y a pas  <strong><a href="#"> d'annonce</a></strong> Expired !
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<?php } ?>
			
					</ul>
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

      <form role="form" action="<?php echo base_url('customer/listing/remove') ?>" method="post" id="removeForm">
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

			
 <div class="modal fade" tabindex="1" role="dialog" id="removeService">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Service</h4>
      </div>

      <form role="form" action="<?php echo base_url('customer/services/remove') ?>" method="post" id="removeForm">
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
	  $("#Expired").addClass('Act');
	  $("#listing").addClass('open');
	  $("#listing").addClass('active');
 

 function removeFunc(id)
  {
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { listing_id:id }, 
        dataType: 'json',
        success:function(response) {

         
		 if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');
            location.reload();
          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}
   </script>