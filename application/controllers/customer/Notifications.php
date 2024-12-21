<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
class Notifications extends Public_Controller
{
 
    public function __construct() {

        parent::__construct();
        $this->is_login();
		$this->load->model('model_customer');
		$this->load->model('model_listings');
		$this->load->model('notifications_model');
       $this->user_id = $this->session->userdata('v_user_id');
		
   }

 
    public function generate()
    {
        $this->notifications_model->create_notification((int)$this->session->user_id, 'Lead Management', '<b>'.rand(5, 15).'</b> new leads generated in our system.');
        $this->notifications_model->create_notification((int)$this->session->user_id, 'Twitter', '<b>' . get_random_name() . '</b> & ' . rand(2, 4) . ' others follows us on twiter.');
        $this->notifications_model->create_notification((int)$this->session->user_id, 'Facebook', '<b>' . get_random_name() . '</b> & ' . rand(5, 15) . ' others liked our latest facebbok post.');
        redirect('dashboard');
    }
	
	public function addNoti ($user , $listing) 
	{
		    $customer = $this->model_customer->fetch_customer_by_id($user);
		    $listings = $this->model_listings->getListingData($listing); 
            $this->notifications_model->create_notification($listing['customer_id'], $customer->firstname.' '.$customer->lastname , ' like  your annonce.');
       
	}

 
    public function read($id)
    {
        $this->notifications_model->mark_notification_as_read($id, $this->session->user_id);
        $data['notifications']          = $this->notifications_model->get_unread_notifications($this->session->user_id);
        $data['notifications_count']    = $this->notifications_model->get_unread_notifications_count($this->session->user_id);
       
    }
	
	public function remove($id){
		
		$respense = array();
		
	   $result  = $this->notifications_model->delet_notification($id);
		if($result){
			
		    $respense['response'] = true ;
		    $respense['messages'] = 'Done';
			
		}else{
			
			$respense['response'] = false ;
		    $respense['messages'] = ' Error was contored';
		}
		
		 echo json_encode($respense);
		
	}
}