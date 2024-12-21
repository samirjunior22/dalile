<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends Public_Controller {

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
        $msg = $this->messages_model;
        
       $this->data['record'] = $msg->get_messages($this->user_email );  
        if(! $this->data['record']){
             $this->data['nodata'] = TRUE;   
        }
        
       $this->data['title']= 'Messages';
      
        
	    $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);
        $this->data['count_inbox'] = $this->messages_model->count_inbox($this->user_email);
        $this->data['count_sent'] = $this->messages_model->count_sent($this->user_email);
     
         
		$this->data['customer'] = $customer;
	    $this->render_customer('customer/messages/inbox'); 
    }
    
    function search(){
        $msg = $this->messages_model;
        $data['record'] = $msg->get_messages_by_search();
        if(!$data['record']){
            $data['nosearch'] = TRUE;   
        }
        $data['title'] = 'Search Message';
        $data['user'] = $this->user_model->user_info();
        $data['main'] = 'inbox';
		$this->load->view('include/template',$data);
    }
    
    function sent(){
        $msg = $this->messages_model;
        
        $data['record'] = $msg->get_messages_sent();  
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Sent Messages';
        $data['user'] = $this->user_model->user_info();
		$this->load->view('inbox/sent',$data);
    }
    
    function trash(){
        $msg = $this->messages_model;
        
        $data['record'] = $msg->get_messages_trash();  
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Sent Messages';
        $data['user'] = $this->user_model->user_info();
		$this->load->view('inbox/trash',$data);
    }
    
    function read_message(){
        $id = $this->input->post('id');
         $this->data['msg']= $this->messages_model->get_message_by_id($id,'inbox');
        //$this->load->view('readMessage',$data);
        echo json_encode($this->data['msg']); 
    }
    
    function get_sender(){
        $id = $this->input->post('id');
        $msg = $this->messages_model->get_message_by_id($id);
//        foreach($msg as $row):
//            $sender = $this->message_model->get_username($row->user_from);
//            echo '<select name="send_to" class="form-control" readonly id="sent_to">';    
//            echo '<option value="'.$row->user_from.'">'.$sender.'</option>';
//            echo '</select>';
//        endforeach;
        return $msg;
    }
    
    function send(){
        $msg = $this->messages_model; 
	   
        $msg->send_message($this->user_email);
        redirect('customer/messages/sentitems?send');
    }
    function delete(){
        
        $this->messages_model->delete_message();		
        redirect('customer/messages/inbox?delete');
    } 
    
    function deleteTrash(){
        $msg = $this->messages_model;        
        $msg->delete_message_trash();
        redirect('inbox/trash?delete');
    }
       
}