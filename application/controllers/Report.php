<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class report extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	   $this->load->library('form_validation'); 
	   $this->load->model('Model_raport'); 
    }
 
	 
   public function addReport (){
	   
	   $response = array();
		 
	    $listing_id = $this->input->post('listing_id');
		$Report = $this->input->post('Report');
		$text = $this->input->post('text');
	    
		  $data= array( 
				'listing_id' => $listing_id,
				'Report' => $Report,
				'text' => $text,
			 );
		 
		 $insert = $this->Model_raport->addReport($data);
	 
	 if ($insert) {
			
   			  $response['success'] = true;
              $response['messages'] = "Successfully "; }
 			 
 			 else {
				  
				  $response['success'] = false;
                  $response['messages'] = " error" ; 
			  }   
			   
	 
     echo json_encode($response); 
	 
    }	 
	 
	 
}