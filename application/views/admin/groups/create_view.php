<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="content-wrapper">
  <section class="content"> 
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h1>Create group</h1>
            <?php echo form_open();?>
            <div class="form-group">
                <?php echo form_label('Group name','group_name');?>
                <?php echo form_error('group_name');?>
                <?php echo form_input('group_name',set_value('group_name'),'class="form-control"');?>
            </div>
            <div class="form-group">
                <?php echo form_label('Group description','group_description');?>
                <?php echo form_error('group_description');?>
                <?php echo form_input('group_description',set_value('group_description'),'class="form-control"');?>
            </div>
            <?php echo form_submit('submit', 'Create group', 'class="btn btn-primary btn-lg btn-block"');?>
            <?php echo anchor('/admin/groups', 'Cancel','class="btn btn-default btn-lg btn-block"');?>
            <?php echo form_close();?>
        </div>
    </div>
	</section>
</div>

 <script type="text/javascript">
  $(document).ready(function() {
    $("#mainGroups").addClass('active');
    $("#manageGroups").addClass('active'); 
	
	 });
  </script>