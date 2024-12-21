<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmarks extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->is_login();
		$this->load->model('model_customer');
		$this->load->model('model_bookmarks');
		$this->load->model('model_listings');
		$this->load->model('model_category');
		$this->load->model('model_rating');
        $this->user_id = $this->session->userdata('v_user_id');
	  }
	
  public function index()
    {    
	$item_array =array();
   $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);

 $favoris = $this->model_bookmarks->getBookmarksListing($this->user_id); 
	  foreach ($favoris as  $value) { 
	  $listings = $this->model_listings->getListingData($value['listing_id']); 
	  
	     $rating = $this->model_rating->get_rating($listings['id']);
	     $info = $this->model_listings->getContactInfoData($listings['id']); 
	     $Images = $this->model_listings->getImagesData($listings['id']); 
	     $Category = $this->model_category->getCategoryData($listings['Category']); 
		         
				 $nested_data['Title'] = $listings['Title'];
				 $nested_data['id'] = $listings['id'];
				 $nested_data['Tag_Line'] = $listings['Tag_Line'];
				 $nested_data['Description'] = $listings['Description'];
				 $nested_data['photo'] =$listings['photo'];
				 $nested_data['totals'] =$rating['totals'];
			 	
		  $item_array []= $nested_data;
	   }
	   
	  $this->data['results'] = $item_array;		
			   
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
	     $this->data['customer'] = $customer;
		 $this->render_customer('customer/bookmarks'); 
    } 
	
  public function romoveFavoris () {
	  
	   $listing_id = $this->input->post('listing_id');

        $response = array();
	  
	    if($listing_id) {
			
			$data = '0' ;
			
            $delete = $this->model_bookmarks->update_like($listing_id , $data);
	        
			 if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Erreur dans la base de données lors de la suppression des informations sur le produit";
            } 
		} else {
            $response['success'] = false;
            $response['messages'] = "Refersh la page !";
        }

        echo json_encode($response);
   }	
	
  
}