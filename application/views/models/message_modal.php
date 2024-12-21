<?php
if($this->session->userdata('v_user_id') != 0) {  
   $userid = $this->session->userdata('v_user_id') ; 
}else { 
	$userid = 0 ; 
}
 ?>
 
<div id="message_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Envoyer message</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Listing_detail/send') ; ?>" method="post"  id="messagetForm">
          <div class="form-group">
		  <div class="form-group">
		<?php if ($userid == 0) { ?>
          	<input type="email" class="form-control" name="Email" placeholder="Email" required>
		<?php } else { ?>
		    <label> <?php echo  customer($userid , 'email') ; ?></label>
          	<input type="hidden" class="form-control" name="Email" value="<?php echo  customer($userid , 'email') ; ?>" >
		<?php } ?>
          </div>
          	<input type="text" class="form-control"  name="subject" placeholder="subject" required>
			
			<input type="hidden" class="form-control"  name="send_to" value="<?php echo customer($listings['customer_id'], 'email')?>">
          </div>
          <div class="form-group">
            <textarea rows="4" class="form-control" name="content" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <input value="Send Message" class="btn btn-block" type="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>