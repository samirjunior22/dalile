<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/admin/admin_master_header_view'); 
$this->load->view('templates/admin/admin_master_header_top');  
$this->load->view('templates/admin/admin_master_side_view'); ?>
<?php echo $the_view_content;?>
<?php $this->load->view('templates/admin/admin_master_footer_view');?>