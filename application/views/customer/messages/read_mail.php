  
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/AdminLT/plugins/iCheck/flat/blue.css">
 
 <link rel="stylesheet" href="<?php echo base_url();?>plugins/Lobibox/lobibox.css">
      <script src="<?php echo base_url();?>plugins/Lobibox/lobibox.js"></script>
 
 <div class="dashboard-content" style="min-height: 956px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Read Mail 
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">sent</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a class="btn btn-primary btn-block margin-bottom" data-target="#compose_mail" data-toggle="modal">Compose</a>
    
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
			    <li id="Dmess1"><a href="<?php echo base_url('/customer/messages/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li id="Inbox1"><a href="<?php echo base_url('/customer/messages/inbox');?>"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right"><?php echo $count_inbox; ?> </span></a></li>
                <li id="Sent1"><a href="<?php echo base_url('/customer/messages/sentitems');?>"><i class="fa fa-envelope-o"></i> envoyée
				<span class="label label-primary pull-right"><?php echo $count_sent; ?> </a></li>
         
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
       <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $datail->subject ; ?> </h3>
                <h5> <?php echo $datail->user_from ; ?>
                  <span class="mailbox-read-time pull-right"><?php echo $datail->date ; ?>.</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                

                <p><?php echo $datail->content ; ?> .</p>
 
              </div>
              <!-- /.mailbox-read-message -->
            </div>
          
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
 
  </div>
 </div></div>
<?php $this->load->view('models/messages/confirm'); ?>
     </form> 
<?php $this->load->view('models/messages/compose'); ?>
<?php $this->load->view('models/messages/read'); ?>
<?php $this->load->view('models/messages/search'); ?>
<?php $this->load->view('models/messages/message'); ?>
<?php if(isset($_GET['delete'])): ?>
    <script>
          Lobibox.notify('success', {
          msg: 'Deleted Successfully!'
        });
    </script>
<?php endif; ?>

<script>

 $("#Sent").addClass('Act');
  $("#Sent1").addClass('active');
	  $("#Mes").addClass('open');
	  $("#Mes").addClass('active');
</script>
<script src="<?php echo base_url(); ?>assets/AdminLT/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLT/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>