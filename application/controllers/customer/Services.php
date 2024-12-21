<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	   $this->load->library(array(
			'custom_upload',
			'form_validation',
			'google'
		)); 
	    $this->is_login();
		$this->load->model('model_customer');
		$this->load->model('model_services');
		$this->load->model('model_commune');
		$this->load->model('model_category');
		$this->load->model('Model_ser_category');
		$this->load->model('model_rating');
       $this->user_id = $this->session->userdata('v_user_id');
	   $this->load->helper('security');
	  }
	 
    public function add_new_service () { 
	 $this->form_validation->set_rules('Title', 'name de l\'annonce', 'trim|required');
    
	$date = date("Y-m-d H:i:s");
    if ($this->form_validation->run() == TRUE) { 
	    
	       if($_FILES['image']['size'] > 0){
	           $listingPhoto = $this->upload_image();
	        }else{
			   $listingPhoto = "service.jpg";  
		   } 
		    
	   $data= array( 
				'photo' => $listingPhoto,
				'customer_id' => $this->user_id,
				'Title' => $this->input->post('Title'),
				'Tag_Line' => $this->input->post('Tag_Line'),
				'Category' => $this->input->post('sercategory'),
				'sou_category' => $this->input->post('ser_sou_category'),
				'Description' => $this->input->post('Description'), 
			    'date_add' => $date,
				'Address' => $this->input->post('location'),
			    'wilaya' =>  json_encode( $this->input->post('wilaya')),
			    'lat' => 0,
			    'lng' => 0,
				'Phone' => $this->input->post('Phone'),
				'status' => 2,
			 ); 
	     $insert = $this->model_services->create_Service($data);
	  
	               if($insert == true ) {
        		       $this->session->set_flashdata('success', 'Successfully created');
        		      redirect('customer/listing/index/2', 'refresh');
        	        }  else {
        		      $this->session->set_flashdata('errors', 'Error occurred!!');
                     redirect('customer/listing/places/service', 'refresh');
        	     }
			 
		  }else{
			
		         $this->session->set_flashdata('errors', 'Error occurred!!');
                 redirect('customer/listing/places/service', 'refresh');
		  }
	 } 
	
    public function getinfo ($cat , $wilaya){
	  $result = array('mark' => array()); 
	  $listing  = $this->model_services->getServiceBySouCat($cat, $wilaya);
  foreach($listing as $key => $value) {
		   
		     $iconcat = $this->model_category->getCategoryData($value['Category']); 
		     $result['mark'][$key] = array(
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                    <div class="objects">
                             <div class="map-post-des-m">
					         <p><a href="'.base_url("listing_detail/index/".$value['id']).'">'.$value['Title'].'</a></p><span><i class="fa fa-map-marker"></i> '.$value['Address'].'</span></div>
                             </div></div>', 
	 		  'lat' => $value['lat'],
			  'lng' =>$value['lng'] ,
			  'icon' => $iconcat['icon']  );
			 
	        } 
	return  json_encode($result);
	 
   }
   
     public function edit($id = null) 
	  {  

 	  if($id == null) {
			 	redirect('customer/listing/', 'refresh');
			  }
		      $this->form_validation->set_rules('Title', 'Titre de l\'annonce', 'trim|required');
	          $this->form_validation->set_rules('Tag_Line', 'Slogan', 'trim|required');
 	          $this->form_validation->set_rules('Description', 'Description', 'trim|required');
	      
	if ($this->form_validation->run() == TRUE) {
         
		  
		 $data= array( 
			    'customer_id' => $this->user_id,
				'Title' => $this->input->post('Title'),
				'Tag_Line' => $this->input->post('Tag_Line'),
				'Category' => $this->input->post('sercategory'),
				'sou_category' => $this->input->post('ser_sou_category'),
				'Description' => $this->input->post('Description'), 
			    'Address' => $this->input->post('location'),
			    'wilaya' =>  json_encode($this->input->post('wilaya')),
			    'Phone' => $this->input->post('Phone'),
			    'Min_Price' => $this->input->post('Min_Price'),
			    'Max_Price' => $this->input->post('Max_Price'),
			    'status' => $this->input->post('status'),
			 );
		 
	     $updat_L = $this->model_services->update_Service($data, $id);
		
		  		 // Modifier L'image
		          if($_FILES['image']['size'] > 0){ 
	               $listingPhoto = $this->upload_image();
	                   if($listingPhoto == false){
			              $this->session->set_flashdata('error', 'Error  image no supported');
        		         redirect('customer/service/edit/'.$id.'', 'refresh');
		                 }else{
							  $upload_photo = array(
							   'photo' => $listingPhoto, 
							  );
							  $update_info = $this->model_services->update_Service($upload_photo, $id);
						 }
					  }	
					
	     if(  $updat_L == true ) {
        		$this->session->set_flashdata('success', 'Successfully Update');
        		redirect('customer/services/edit/'.$id.'', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customer/services/edit/'.$id.'', 'refresh');
        	}
		  
		  } else {
			  
			  
		   $listings = $this->model_services->getServiceData($id); 
		   $Category = $this->Model_ser_category->getCategoryData($listings['Category']); 
		   $souCategory = $this->Model_ser_category->getSouCategoryData($listings['sou_category']); 
		   $selectedWilaya = json_decode($listings['wilaya']);
           if ($selectedWilaya) {
		   foreach ($selectedWilaya as $s){
			    $Wilaya = $this->model_commune->getWilayaData($s); 
			    
				  $nested_data['id'] =$Wilaya['id'];
			     $nested_data['name'] =$Wilaya['name'];
			 	
		      $item_array []= $nested_data;		     } 
			 
	         $this->data['selectedWilaya'] = $item_array;
		 
		   }
			  $customer = $this->model_customer->fetch_customer_by_id($this->user_id); 
		      $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		      $this->data['Categories']= $this->Model_ser_category->getCategoryData();
			 
			 
		 
	          $this->data['customer'] = $customer;
	          $this->data['listings'] = $listings;
	          $this->data['Category'] = $Category;
	          $this->data['souCategory'] = $souCategory;
	       
	        
		     $this->render_customer('customer/services/update-service'); 
		   }
	   }
	
	 
	public function remove () {
		
		 $listing_id = $this->input->post('listing_id');

        $response = array();
        if($listing_id) {
            $delete = $this->model_services->remove($listing_id);
            $delete_rat = $this->model_rating->remove($listing_id);
			
			$this->db->where('listing_id', $listing_id);
			$delete_images = $this->db->delete('images'); 
			
            if($delete == true) {
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
	
	
	public function getSouCategoryDaira($id) {
		  $result = $this->model_category->getSouCategoryDataById($id); 
		   echo json_encode($result); 
	   }
	
	public function updatePhoto ($id) {
		 
		 $image = $this->upload_image();
		 $image_data= array( 
			 'photo' =>  $image  ); 
		$update_photo = $this->model_services->update_Service($image_data, $id);
	  }
	
	
	public function upload_image(){
    	$file = $this->custom_upload->single_upload('image', array(
			 'upload_path' => 'assets/images/services', 
			 'allowed_types' => 'jpg|jpeg|bmp|png|gif', // etc
			 'max_size' => 0
		));
		 if($file != false){
			 return  $file ; 
		   }else {
			 return false ;
		    }
	     }  
 
 
  
}