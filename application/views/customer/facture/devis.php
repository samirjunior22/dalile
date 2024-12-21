  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLT/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>"> 
 
 </style>
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					
					 <nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Mes Devis</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
  
 
       <h4>Mes Devis </h4>
	   <div class="row">
			<!-- Listings -->
			<div class="col-lg-10 col-md-10">
				<div class="dashboard-list-box">
				 
				  
				  
<div class="pricing-box-container">
	 
		
    <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Devis</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
			   <th>Devis</th>
                <th>Objet</th> 
                <th>Date de création</th>
                <th>Totals</th>
                <th>Etat</th>
            
              </tr>
              </thead>

            </table>
          </div>
        
      </div> 
 
   </div>
 
             
				</div>
			</div>
   </div>	
 </div>		

 <!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Order</h4>
      </div>

      <form role="form" action="<?php echo base_url('customer/facture/romove_order') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <script src="<?php echo base_url('assets/AdminLT/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>	 

  <script type="text/javascript">
  var manageTable;

$(document).ready(function() {
	
  	$("#devis").addClass('Act');
	  $("#Orders").addClass('open');
	  $("#Orders").addClass('active');
  
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchDevisData/0',
    'order': []
  });
 });	
 
 
// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: {order_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');
 
            $("#removeModal").modal('hide');

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