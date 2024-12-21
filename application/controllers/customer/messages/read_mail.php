<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_mail extends Public_Controller {

	public function __construct(){
        parent::__construct();  
		
        $this->load->model('model_customer');
       $this->load->helper('form');
        $this->load->model('messages_model');
        $this->is_login();
		$this->user_id = $this->session->userdata('v_user_id');
		$this->user_email = $this->session->userdata('v_email');
  
    }
    
    function index($id){
        $msg = $this->messages_model;
        
       $this->data['datail'] = $msg->fetch_message_sent($id);  
         
        
       $this->data['title']= 'Messages';
      
        
	    $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);
        $this->data['count_inbox'] = $this->messages_model->count_inbox($this->user_email);
        $this->data['count_sent'] = $this->messages_model->count_sent($this->user_email);
     
         
		$this->data['customer'] = $customer;
	    $this->render_customer('customer/messages/read_mail'); 
    }
     
}