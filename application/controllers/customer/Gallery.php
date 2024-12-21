<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->library('custom_upload');
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
    $listings = $this->model_listings->getListingCustomer( $this->user_id); 
	  foreach ($listings as  $value) { 
	 
	  
	     $rating = $this->model_rating->get_rating($value['id']);
	     $info = $this->model_listings->getContactInfoData($value['id']); 
	     $Images = $this->model_listings->getImagesData($value['id']); 
	     $countimage = $this->model_listings->countImages($value['id']); 
	     $Category = $this->model_category->getCategoryData($value['Category']); 
		         
				 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = $value['id'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['photo'] =$value['photo'];
				 $nested_data['countimage'] =$countimage['total'];
			 	
		  $item_array []= $nested_data;
	   }
	   
	  $this->data['results'] = $item_array;		
			   
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
	     $this->data['customer'] = $customer;
		 $this->render_customer('customer/photos/index'); 
    } 
  public function album($id)
  {    
	$item_array =array();
    $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);

 
       $this->data['results'] = $this->model_listings->getAllImages($id); 
       $this->data['listing'] = $this->model_listings->getListingData($id); 
	 
	   
         $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
	     $this->data['customer'] = $customer;
		 $this->render_customer('customer/photos/listing_album'); 
    }
	
	
  public function insertPhoto ($listing) {
	  
	  
	 $file = $this->custom_upload->multiple_upload('image_tag', array(
			      'upload_path' => 'assets/images/product_image', 
			      'allowed_types' => 'jpg|jpeg|bmp|png|gif' ,// etc
				  'max_size' => 0
		         )); 
                $image = array();  
			 foreach ($file as $f) {
			       array_push($image, array( 
				     'listing_id' => $listing,
				     'photo' => $f ,
					 'alt' => $this->input->post('price'),
			          )); 
		              }
		  
		   $insert_images= $this->model_listings->insert_images($image);
	  
	  if($insert_images == true  ) {
        		$this->session->set_flashdata('success', 'Envoyé avec succès');
        		redirect('customer/Gallery/album/'.$listing);
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customer/Gallery/album/'.$listing);
        	} 
	  
  }
  
    public function update_photo ($listing) {
	  
	    $image = array();  
	    $data = array();  
			 $id = $this->input->post('id_photo');
			  if($_FILES['image_tag_update']['size'] > 0){
			    $file = $this->custom_upload->single_upload('image_tag_update', array(
			      'upload_path' => 'assets/images/product_image', 
			      'allowed_types' => 'jpg|jpeg|bmp|png|gif' ,// etc
				  'max_size' => 0
		         )); 
				 $image = array('photo' => $file );
			     $update_images= $this->model_listings->update_images($image ,  $id);
			  }
			
		   $data = array('alt' => $this->input->post('price') );
		   $update_price= $this->model_listings->update_images($data,  $id);
	  
	   if($update_price == true  ) {
        		$this->session->set_flashdata('success', 'Envoyé avec succès');
        		redirect('customer/Gallery/album/'.$listing);
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customer/Gallery/album/'.$listing);
        	} 
	 }
	
	
	public function remove () {
		
		 $photo_id = $this->input->post('photo_id');

        $response = array();
        if($photo_id) {
            // $delete = $this->model_listings->remove($photo_id);
            $this->db->where('id', $photo_id);
			$delete_images = $this->db->delete('images'); 
			
            if($delete_images) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Erreur dans la base de données lors de la suppression des informations sur le produit";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh la page !";
        }
       echo json_encode($response);
	 }
	 
	 
  public function fetchPhotos($photo_id) 
	{
		if($photo_id) {
		$sql = "SELECT * FROM images WHERE id = ?";
			$query = $this->db->query($sql, array($photo_id));
			$data = $query->row_array();
			echo json_encode($data);
		}

		return false;
	}
	 
  
}