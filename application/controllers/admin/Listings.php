<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listings extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		  $this->load->library(array(
			'custom_upload',
			'form_validation',
			'google'
		)); 

		  $this->data['page_title'] = 'Places';

		  $this->load->model('model_raport');
		  $this->load->model('model_customer');
		  $this->load->model('model_commune');
		  $this->load->model('model_rating');
		  $this->load->model('model_category');
	      $this->load->model('model_listings');
	      $this->load->model('notifications_model');
		  $this->load->library('form_validation');
	}
 
	public function index()
	{   
	if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }
  	    
	    $user = $this->ion_auth->user()->row();
        $this->data['user'] = $user;
		
        $this->data['allCustomer'] = $this->model_customer->fetch_customer();
		  
		$this->render('admin/listings/index');	
	}	
 
	public function places()
	{
		  $this->data['Amenities']  = $this->model_listings->getAmenitiesData(); 
			 
		      $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		      $this->data['Category']= $this->model_category->getActiveCategroy(); 
			  
	          
			  $user = $this->ion_auth->user()->row();
              $this->data['user'] = $user;
			  $this->render('admin/listings/places');  
	}	
	public function fetchListingDataById($id) 
	{   $data = array();
		if($id) {
			$listing = $this->model_listings->getListingData($id);
		if($listing['customer_id'] == 21061989){
			$customer = 'damin' ;
			$customerID = 21061989 ;
		}else{
		 $Getcustomer = $this->model_customer->fetch_customer_by_id($listing['customer_id']);
		 $customer =$Getcustomer->email ; 
		 $customerID =$Getcustomer->id ;  }
		    
			$data= array(
			    'Title' =>$listing["Title"] ,
                'Category'=>$listing["Category"] ,
                'status'=>$listing["status"] ,
                'customer'=>$customer ,
                'customerId'=>$customerID ,
			 );
			 
			
			echo json_encode($data);
		}

		return false;
	}

 
	public function fetchListingData()
	{
		$result = array('data' => array());

		$data = $this->model_listings->getListingData();

		foreach ($data as $key => $value) {
			 $info = $this->model_listings->getContactInfoData($value['id']);

		     $buttons = '';

		      $buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			  $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
	  if ($value['status'] == 0) 
		  $status = '<span class="label label-danger"> desactiver </span>';
	     elseif ($value['status'] == 1) 
			 $status = '<span class="label label-success"> Active </span>';
			else 
		     $status = '<span class="label label-warning">en attente</span>';
  $photo = ' <div class="thumbnail" style="width:150px">
        <a href="'.base_url('listing_detail/index/'.$value['id']).'" target="_blank">
          <img src="'.base_url('assets/images/listings/'.$value['photo']).'" alt="Fjords" >
       </a>
 </div> ';	  
	   
		  $result['data'][$key] = array(
			    $photo ,
				$value['Title'],
				$info['wilaya'],
				$info['Phone'],
				$info['Email'],
				$status,
				$buttons
			);
		} 

		echo json_encode($result);
	}
	
	public function update ($id) {
		
		
		 $response = array();
		 $status =  $this->input->post('edit_active') ;
		 $customer =  $this->input->post('customer') ;

		if($id) {
		 
	        	$data = array(
	        		
        		    'status' =>  $status,	
        		    'customer_id' =>  $customer,	
	        	);

	        	$update = $this->model_listings->update_Listing($data, $id);
			 	$lis = $this->model_listings->getListingData($id);
		
  		     
             $action = ($status == 1 ? 'active' : 'desactiver') ;
			 $this->notifications_model->create_notification($lis['customer_id'],  9925 , $action , $id);
		   
				 
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	         
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
		
		
	}
	
	
	
   public function add_listing () { 
    
	  $this->form_validation->set_rules('name', 'name de l\'annonce', 'trim|required');
      $this->form_validation->set_rules('Category', 'Category', 'trim|required');
      $this->form_validation->set_rules('location', 'location', 'trim|required');
	  $this->form_validation->set_rules('wilaya', 'wilaya', 'trim|required');
  
	$date = date("Y-m-d H:i:s");
	$url360 = '' ;
   
	if ($this->form_validation->run() == TRUE) { 
	 $place_id  =  $this->input->post('place_id') ;
	 $listings = $this->model_listings->getListingByPlaceId($place_id);  
	 
	    $Category = $this->input->post('Category');
	    $sou_category = $this->input->post('sou_category');
		$place_types = $this->input->post('place_types');
		$photo = $this->input->post('photo');
		$wilaya = $this->input->post('wilaya');
		$Zip = $this->input->post('Zip-Code');
	
	if( $listings > 0){	
		$this->session->set_flashdata('errors', ' Place deja existe');
       redirect('admin/Listings/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
	}else{
		  $listingPhoto = '';
		  if($_FILES['image']['size'] > 0){
	           $listingPhoto = $this->upload_image();
	             if($listingPhoto == false){
			         $this->session->set_flashdata('error', 'Error  image no supported');
                     redirect('admin/Listings/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
		         }
		      }else{
		 		     if($photo != null) {
		               $images=$this->get_furl($photo);
		               $url=$images;
                       $contents=file_get_contents($url);
                       $save_path="assets/images/listings/".$place_id.".jpg" ;
                       file_put_contents($save_path,$contents);
		               $listingPhoto = $place_id.".jpg";
		                 }else{$listingPhoto = $place_types.".jpg"; }
				  }
		
		
		
		   $data= array( 
				'photo' => $listingPhoto,
				'customer_id' => 21061989,
				'Title' => $this->input->post('name'),
				'Tag_Line' => $this->input->post('name'),
				'Category' => $this->input->post('Category'),
				'sou_category' => $this->input->post('sou_category'),
				'Description' => $this->input->post('name'),
			    'place_id' => $this->input->post('place_id'),
				'Min_Price' => '0',
				'Max_Price' => '',
				'Video_URL' =>  "",
				'vue_360' => $url360,
				'date_add' => $date,
				'status' => 1,
			 );
		 
	     $insert = $this->model_listings->create_Listing($data);
		
		 $info= array( 
				'listing_id' =>  $insert,
				'Address' => $this->input->post('location'),
			    'wilaya' => $this->input->post('wilaya'),
			    'lat' => $this->input->post('lat'),
			    'lng' => $this->input->post('lng'),
				'Zip-Code' => $this->input->post('Zip-Code'),
				'Phone' => $this->input->post('phone'),
				'Email' => $this->input->post('Email'),
				'Website' =>$this->input->post('website'),
				'Facebook' =>$this->input->post('Facebook'),
				'Linkdin' => $this->input->post('Linkdin'),
				'Twitter' => $this->input->post("Twitter"),
				'Google' => $this->input->post('Google'),
			 );
		
		
	    $insert_info = $this->model_listings->create_ContactInfo($info);
		   
		  if($insert_info == true && $insert == true ) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('admin/Listings/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('admin/Listings/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
        	}
		  
	    }
		  
	    } else {
			
			     $wilaya = $_GET['wilaya'];
		    	 $sou_category = $_GET['sou_category'];
			     $Category =  $_GET['Category']; 
			     $place_types =  $_GET['place_types']; 
			     $Zip =  $_GET['Zip-Code'];
			  $this->data['cord'] = $this->getinfo($sou_category , $wilaya ); 			 
		      $this->data['wilaya']= $this->model_commune->getWilayaData($_GET['wilaya']); 
              $this->data['Category']= $_GET['Category']; 
		      $this->data['sou_category']= $_GET['sou_category']; 
		      $this->data['type']= $_GET['place_types']; 
		      $this->data['Zip']= $_GET['Zip-Code']; 
			  $user = $this->ion_auth->user()->row();
              $this->data['user'] = $user;
			  $this->render('admin/listings/add-listing');  
			  
		}
	} 
	
	public function remove () {
		
		 $listing_id = $this->input->post('id');

        $response = array();
        if($listing_id) {
            $delete = $this->model_listings->remove($listing_id);
            $delete_info = $this->model_listings->remove_ContactInfo($listing_id);
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
	public function upload_image()
    {
    	$file = $this->custom_upload->single_upload('image', array(
			 'upload_path' => 'assets/images/listings', 
			 'allowed_types' => 'jpg|jpeg|bmp|png|gif', // etc
			 'max_size' => 0
		));
		
		if($file != false){
			
			return  $file ; 
			
		}else {
			
			return false ;
		}
		 
    }


function get_furl($url)
    {
    $furl = false;
    // First check response headers
    $headers = get_headers($url);
    // Test for 301 or 302
    if(preg_match('/^HTTP\/\d\.\d\s+(301|302)/',$headers[0]))
        {
        foreach($headers as $value)
            {
            if(substr(strtolower($value), 0, 9) == "location:")
                {
                $furl = trim(substr($value, 9, strlen($value)));
                }
            }
        }
    // Set final URL
    $furl = ($furl) ? $furl : $url;
    return $furl;
    }    
	
  public function getinfo ($cat , $wilaya){
	  $result = array('mark' => array()); 
	   
	 $listing  = $this->model_listings->getListingBySouCat($cat, $wilaya);
	 
	  
	  
	 
	  foreach($listing as $key => $value) {
		  
             $coords = $this->model_listings->getContactInfoData($value['id']); 
		     $iconcat = $this->model_category->getCategoryData($value['Category']); 
		     $result['mark'][$key] = array(
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                     <a href="'.base_url("listing_detail/index/".$value['id']).'" class="map-post-thumb-m"> 
							 <img  width="150px" src="'.base_url('assets/images/listings/'.$value['photo']).'" alt="">
							 </a>
							 <div class="objects">
                             <div class="map-post-des-m">
					         <h5><a href="'.base_url("listing_detail/index/".$value['id']).'">'.$value['Title'].'</a></h5><span><i class="fa fa-map-marker"></i> '.$coords['Address'].'</span></div>
                             </div></div>', 
	 		  'lat' => $coords['lat'],
			  'lng' =>$coords['lng'] ,
			  'icon' => $iconcat['icon']  );
			 
	        } 
	return  json_encode($result);
	 
   }

}