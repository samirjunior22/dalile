<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Profil extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        // Load User Model
       $this->load->model('model_customer', 'UserModel');
	          $this->load->model('model_listings', 'listings');
	          $this->load->model('model_pack');
	          $this->load->model('Notifications_model');
	          $this->load->model('model_orders');
	          $this->load->model('model_rating');
	          $this->load->model('model_email');
	          $this->load->model('auth_model');

    }
 
 
	public function getReviews_get(){ 
        
        $user_id = $this->input->get("user_id");
        $row = $this->input->get("row");
		
	    $listings = $this->listings->getListingCustomer($user_id , 1); 
		
		foreach ($listings as  $value) { 
		
		       	$reviews = $this->model_rating->get_reviews($value['id'] , $row) ;
	             
		         foreach ($reviews as  $review) {

				  $customer = $this->model_customer->fetch_customer_by_id($review->Email); 
				  
			   $nested_data['customerName'] =  $customer->firstname.' '.$customer->lastname;
			    $nested_data['customerPicture'] =   $customer->picture;
			    $nested_data['timeAgo'] = timeago($review->Date_add);
			    $nested_data['Review'] =  $review->Review ;
			    $nested_data['p_rating'] = $review->p_rating ;
				
			    $item_array []= $nested_data;
			   } 
		    }  
			
	    $rateData =  $item_array;
		 
			
	   $this->response($rateData, REST_Controller::HTTP_OK);
 
    }
	
 
 
 
}