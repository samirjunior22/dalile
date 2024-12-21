<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/_parts/public_master_header');  
$this->load->view('templates/_parts/public_master_header_top'); ?>
<?php echo $the_view_content;?>  
<?php $this->load->view('templates/_parts/public_master_footer');?>