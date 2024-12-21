  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLT/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>"> 
 
 </style>
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-10">
					
					 <nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Mes Factures</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
  
 
       <h4>Mes Factures </h4>
	   <div class="row">
			 
	 <div class="col-lg-10 col-md-10">
		  
		
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Facture</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
			   <th>Facture</th>
                <th>Date de création</th>
                <th>Date d'échéance</th> 
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
 <script src="<?php echo base_url('assets/AdminLT/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>	 

  <script type="text/javascript">
  var manageTable;

$(document).ready(function() {
	$("#facture").addClass('Act');
	  $("#Orders").addClass('open');
	  $("#Orders").addClass('active');
	 
  
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchDevisData/1',
    'order': []
  });
 });	
 </script>