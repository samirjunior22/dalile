  
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/AdminLT/plugins/iCheck/flat/blue.css">
 
 <link rel="stylesheet" href="<?php echo base_url();?>plugins/Lobibox/lobibox.css">
      <script src="<?php echo base_url();?>plugins/Lobibox/lobibox.js"></script>
 
 <div class="dashboard-content" style="min-height: 956px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        sent 
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
              <h3 class="box-title">envoyée</h3>
 
            </div>
            <!-- /.box-header -->
		  <?php echo form_open('customer/messages/sentitems/delete'); ?>	
             <div class="box-body no-padding <?php if(!$record) echo 'hide';?> ">
               <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#sent_search_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Rechercher</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Supprimer</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages" style="overflow-y: hidden;">
                <table class="table table-hover table-striped">
				 <thead>
                    <tr>
                        <th></th>
                        <th> </th>
                        <th>déstinataire</th>
                        <th>Objet</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                  <tbody  style="border-collapse: collapse;"> 
		   <?php foreach($record as $row): ?>
	  
                  <tr>
				    <td><input type="checkbox" name="message_id[]" value="<?php echo $row->message_id;?>"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="<?=base_url('customer/messages/read_mail/index/'.$row->message_id) ;?>" class="read_sent_message"  >
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo  $row->user_to ; ?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a></td>
                    <td class="mailbox-subject" ><b><?php echo ($row->subject!='') ? $row->subject:'[No Subject]'; ?></b> </b>  
                    </td>
                    <td class="mailbox-attachment"><?php echo   string_limit_words($row->content,10); ?>...
                    <td class="mailbox-date"><?php echo  time_diff($row->date); ?></td>
                  </tr>
                  <tr>
          <?php endforeach; ?>  
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
             <?php if(isset($nodata)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>assets/images/img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Wo ! Vous n'avez aucun message dans vos messages envoyés | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
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