<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sentitems extends Public_Controller {

	public function __construct(){
        parent::__construct();    
        $this->load->model('model_customer');
        $this->load->helper('form');
        $this->load->model('messages_model');
        $this->is_login();
		$this->user_id = $this->session->userdata('v_user_id');
		$this->user_email = $this->session->userdata('v_email');
 
    }
    
    function index(){
     
        $this->data['record'] = $this->messages_model->get_messages_sent($this->user_email);  
        if(! $this->data['record']){
             $this->data['nodata'] = TRUE;   
        }
   
        $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);
        $this->data['count_inbox'] = $this->messages_model->count_inbox($this->user_email);
        $this->data['count_sent'] = $this->messages_model->count_sent($this->user_email);
     
         
		$this->data['customer'] = $customer;
	    $this->render_customer('customer/messages/sentitems');  
    }
    
    function search(){
     
        $this->data['record']  = $this->messages_model->get_messages_sent_by_search($this->user_email);
        if(!$this->data['record'] ){
             $this->data['nosearch'] = TRUE;   
        }
        $data['title'] = 'Search Message';
       $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);
        $this->data['customer'] = $customer;
	    $this->render_customer('customer/messages/sentitems'); 
    }
    
    
    function trash(){
     
        
        $data['record'] = $this->messages_model->get_messages_trash();  
        $data['contacts'] = $this->messages_model->get_contacts();
        
        $data['title'] = 'Sent Messages';
        $data['user'] = $this->user_model->user_info();
		$this->load->view('inbox/trash',$data);
    }
    
    function read_message(){
        $id = $this->input->post('id');
        $this->data['msg'] = $this->messages_model->get_message_sent_by_id($id);
        echo json_encode($this->data['msg']); 
    }
    function delete(){
          
        $this->messages_model->delete_message_sent();
        redirect('customer/messages/sentitems?delete');
    }
   
}