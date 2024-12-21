<?php
 
?>
<div class="modal fade" id="compose_mail">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> New Message</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('customer/messages/inbox/send'); ?>
                <div class="form-group">
                    <label for="send_to">Send To:</label>
                    <input type="text" class="form-control" name="send_to" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject">
                </div>   
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="content" cols="40" rows="10" class="form-control" placeholder="Your Message Here" style="resize: none;"></textarea>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" name="send" value="1" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>