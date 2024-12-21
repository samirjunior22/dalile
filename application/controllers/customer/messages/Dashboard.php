<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends Public_Controller {
	public function __construct(){
        parent::__construct();    
        $this->load->model('model_customer');
        $this->load->model('messages_model');
        $this->is_login();
		$this->user_id = $this->session->userdata('v_user_id');
		$this->user_email = $this->session->userdata('v_email');
     
    }
    
    function index()
	{
		$customer = $this->model_customer->fetch_customer_by_id( $this->user_id);
        $this->data['count_inbox'] = $this->messages_model->count_inbox($this->user_email);
        $this->data['count_sent'] = $this->messages_model->count_sent($this->user_email);
     
         
		$this->data['customer'] = $customer;
	    $this->render_customer('customer/messages/dashboard'); 
        
	}
    function barGraph(){
        $count = $this->messages_model->count_messages($this->user_email);
        $data = array(
                array(
                    'section'=>'Inbox',
                    'messages' => $count['inbox']
                    ),
                array(
                    'section'=>'Sent Items',
                    'messages' => $count['sent']
                    )
            );
        echo json_encode($data);
    } 
    function lineGraph(){
        $data = array();
        for($i=0; $i <= 15; $i++){             
            $date = date ( 'Y-m-d', strtotime ( "-$i day" ) );
            $count = $this->messages_model->count_inserted($date , $this->user_email);
            $data[] = array(
                    'period' => $date,
                    'inbox' => $count['inbox'],
                    'sent' => $count['sent']
                );
        }
         echo json_encode($data); 
    }
	
	function notif () {
	  $data = array();
	  $count  = $this->messages_model->count_inbox($this->user_email);
	  $data = array(
                     'inbox' => $count ,
                     
               );
	  echo json_encode($data); 
	 }
    
}
