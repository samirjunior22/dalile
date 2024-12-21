<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
.tg-categoryicon {
    color: #fff;
    width: 42px;
    height: 42px;
    float: left;
    font-size: 20px;
    line-height: 42px;
    background: #fff;
    text-align: center;
    border-radius: 50%;
    margin: 0 10px 0 0;
}

 .tg-categoryicon, .tg-savingyourcost {
    background: #26c6da;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

      <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
     
          <br /> <br />

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage visiteur</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
			   <th>visiteur</th>
                <th> ip </th> 
                <th> date </th>
                 <th>Action</th>
            
              </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>

  <script type="text/javascript">
 
 
var manageTable;

$(document).ready(function() {
  
  $("#visiteur").addClass('active'); 
  
  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'Visiteur/fetchVisiteurData',
    'order': []
  });
  });
  </script>