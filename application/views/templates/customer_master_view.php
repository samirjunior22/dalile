<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/customer/customer_master_header');    
$this->load->view('templates/customer/customer_master_header_top');    
 $this->load->view('templates/customer/customer_master_sidebar');   ?>
<?php echo $the_view_content;?>
<?php $this->load->view('templates/customer/customer_master_footer');?>