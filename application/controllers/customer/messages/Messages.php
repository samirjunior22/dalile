<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct(){
        parent::__construct();    
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('message_model');
        $this->login_model->is_logged_in();   
        $level = $this->session->userdata('level');
        if($level != 'admin'){
            $this->className = 'hide';   
            redirect(base_url());
        }
        $this->message_model->count_messages();
    }
    
    function index(){
        $msg = $this->message_model;
        
        $data['record'] = $msg->get_all_messages();  
        if(!$data['record']){
            $data['nodata'] = TRUE;   
        }
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Messages';
        $data['user'] = $this->user_model->user_info();
        $data['main'] = 'allmessages';
		$this->load->view('include/template',$data);
    }
    
    function search(){
        $msg = $this->message_model;
        $data['record'] = $msg->get_all_messages_by_search();
        if(!$data['record']){
            $data['nosearch'] = TRUE;   
        }
        $data['title'] = 'Search Message';
        $data['user'] = $this->user_model->user_info();
        $data['main'] = 'allmessages';
		$this->load->view('include/template',$data);
    }
    
    function read_message(){
        $id = $this->input->post('id');
        $msg = $this->message_model->get_admin_message_by_id($id);
        foreach($msg as $row):
            $receipient = $this->get_username($row->user_to);            
        endforeach;
        $msg[1] = $receipient;
        //$this->load->view('readMessage',$data);
        echo json_encode($msg); 
    }
    
    function delete(){
        $msg = $this->message_model;        
        $msg->delete_message();
        redirect('messages?delete');
    }
    function get_username($id){
        $username = $this->message_model->get_username($id);
        return $username;
    }
    
    function update(){
        $this->message_model->update_message();
        redirect('messages?update');
    }
}