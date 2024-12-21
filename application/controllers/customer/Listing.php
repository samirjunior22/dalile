<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends Public_Controller
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
		$this->load->model('model_listings');
		$this->load->model('model_services');
		$this->load->model('model_commune');
		$this->load->model('model_category');
		$this->load->model('model_rating');
		$this->load->model('Model_ser_category');
       $this->user_id = $this->session->userdata('v_user_id');
	   $this->load->helper('security');
	  }
	
   public function index($stat = null)
     {   if($stat == null){
			
				redirect('customer/listing/index/1', 'refresh');
		}

   	  $item_array = array (); 
        $items= array (); 
          $Images = '' ; 
          $Category = '' ; 
	  $listings = $this->model_listings->getListingCustomer( $this->user_id , $stat); 
	  $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
	  foreach ($listings as  $value) { 
		        $rating = $this->model_rating->get_rating($value['id']);
	            $info = $this->model_listings->getContactInfoData($value['id']); 
	            $Images = $this->model_listings->getImagesData($value['id']); 
	            $Category = $this->model_category->getCategoryData($value['Category']); 
		         
				 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = $value['id'];
				 $nested_data['vue'] = $value['vue'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['photo'] =$value['photo'];
				 $nested_data['totals'] =$rating['totals'];
			 	
		  $item_array []= $nested_data;
		  
		  }
		  
		    $service = $this->model_services->getServiceCustomer( $this->user_id , $stat); 
		   foreach ($service as  $value) { 
		        $rating = $this->model_rating->get_rating($value['id']);
	 
		                 $nested['Title'] = $value['Title'];
				 $nested['id'] = $value['id'];
				 $nested['vue'] = $value['vue'];
				 $nested['Tag_Line'] = $value['Tag_Line'];
				 $nested['Description'] = $value['Description'];
				 $nested['photo'] =$value['photo'];
				 $nested['totals'] =$rating['totals'];
			 	
		       $items []= $nested;
		    }
		   
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
	          $this->data['listings'] = $listings;
	          $this->data['results'] = $item_array;
	         $this->data['resultsSer'] = $items ;
	          $this->data['Images'] = $Images;
	          $this->data['Categories'] = $Category;
			  
			  if ($stat == 1) 
				  $page= 'my-listings';
			    elseif($stat == 2)
				  $page= 'pending';
				  else 
				  $page= 'expired';  
		       $this->render_customer('customer/'.$page); 
    } 
 
	
   public function edit($id = null) 
	  {   if($id == null) {
			 	redirect('customer/listing/', 'refresh');
			  }
		      $this->form_validation->set_rules('Title', 'Titre de l\'annonce', 'trim|required');
	          $this->form_validation->set_rules('Tag_Line', 'Slogan', 'trim|required');
 	          $this->form_validation->set_rules('Description', 'Description', 'trim|required');
	      
	if ($this->form_validation->run() == TRUE) {
         
		 $url360 = '';
         $iframe_string = $this->input->post('vue_360');
      	 if($iframe_string)	{
		  preg_match('/src="([^"]+)"/', $iframe_string, $match);
		  $url360 = $match[1]; }
         
		 $url = $this->convertYoutube($this->input->post('Video_URL'));	
	    
		 
		 $data= array( 
				'customer_id' => $this->user_id,
				'Title' => $this->input->post('Title'),
				'Tag_Line' => $this->input->post('Tag_Line'),
				'Category' => $this->input->post('Category'),
				'Amenities' =>$this->input->post('Amenities'),
				'sou_category' => $this->input->post('sou_category'),
				'Description' => $this->input->post('Description'),
			    'Min_Price' => $this->input->post('Min_Price'),
				'Max_Price' => $this->input->post('Max_Price'),
				'Video_URL' => $url,
				'vue_360' => $url360 ,
			    'status' => $this->input->post('status'),
			 );
		 
	     $updat_L = $this->model_listings->update_Listing($data, $id);
		
		 $info= array( 
			    'Address' =>  $this->input->post('Address'),
			    'wilaya' => $this->input->post('wilaya'),
			    'Zip-Code' => $this->input->post('Zip-Code'),
				'Phone' => $this->input->post('Phone'),
				'Email' => $this->input->post('Email'),
				'Website' =>$this->input->post('Website'),
				'Facebook' =>$this->input->post('Facebook'),
				'Linkdin' => $this->input->post('Linkdin'),
				'Twitter' => $this->input->post("Twitter"),
				'Google' => $this->input->post('Google'),
			 );
		 $update_info = $this->model_listings->update_ContactInfo($info, $id);
		         
				 // Modifier L'image
		          if($_FILES['image']['size'] > 0){ 
	               $listingPhoto = $this->upload_image();
	                   if($listingPhoto == false){
			              $this->session->set_flashdata('error', 'Error  image no supported');
        		         redirect('customer/listing/edit/'.$id.'', 'refresh');
		                 }else{
							  $upload_photo = array(
							   'photo' => $listingPhoto, 
							  );
							  $update_info = $this->model_listings->update_Listing($upload_photo, $id);
						 }
					  }	
					
	     if($update_info == true && $updat_L == true ) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('customer/listing/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customer/listing/edit/'.$id.'', 'refresh');
        	}
		  
		  } else {
		  $listings = $this->model_listings->getListingData($id); 
		  $info = $this->model_listings->getContactInfoData($listings['id']); 
		  $Amenities = $this->model_listings->getAmenitiesData(); 
		  $Category = $this->model_category->getCategoryData($listings['Category']); 
		  $souCategory = $this->model_category->getSouCategoryData($listings['sou_category']); 
		  $Wilaya = $this->model_commune->getWilayaData($info['wilaya']); 
	         
			  $customer = $this->model_customer->fetch_customer_by_id($this->user_id); 
		      $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		      $this->data['Categories']= $this->model_category->getActiveCategroy(); 
			 
		$yummy = json_decode($listings['Amenities']);	  
			  
			  
	          $titre = 'title_'.$this->current_lang ;
		      $cotent = 'cotent_'.$this->current_lang;
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
	          $this->data['listings'] = $listings;
	          $this->data['Category'] = $Category;
	          $this->data['souCategory'] = $souCategory;
	          $this->data['Wilaya'] = $Wilaya;
	          $this->data['info'] = $info;
	          $this->data['yummy'] =  $yummy;
	          $this->data['Amenities'] =  $Amenities;
		 	
		     $this->render_customer('customer/update-listing'); 
		   }
	   }
	 
  public function add_listing () { 
   $this->form_validation->set_rules('Title', 'name de l\'annonce', 'trim|required');
    
	$date = date("Y-m-d H:i:s");
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
		  $this->session->set_flashdata('errors', 'cet endroit déjà marqué sur le site Pour le récupérer Envoyer message a <a href="mail:Support@eldalile.com">Support@eldalile.com</a> ');
          redirect('customer/Listing/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
	   }else{
	          $url = $this->convertYoutube($this->input->post('Video_URL'));
		        if( $this->input->post('vue_360')){
			       $iframe_string = $this->input->post('vue_360');	 
			       preg_match('/src="([^"]+)"/', $iframe_string, $match);
                   $url360 = $match[1];
	              }
	  
	       if($_FILES['image']['size'] > 0){
	            $listingPhoto = $this->upload_image();
			    $this->resizeImage($listingPhoto);
	             if($listingPhoto == false){
			         $this->session->set_flashdata('error', 'Error  image no supported');
                     redirect('customer/Listing/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
		         }
		      }else{
		 		     if($photo != null) {
		               $images=$this->get_furl($photo);
		               $url=$images;
                       $contents=file_get_contents($url);
                       $save_path="assets/images/listings/".$place_id.".jpg" ;
                       file_put_contents($save_path,$contents);
		               
		                 }else{ 
						 
						 $listingPhoto = "listing_pic.png";
 
						 }
				  }
			  
	      $data= array( 
				'photo' => $listingPhoto,
				'customer_id' => $this->user_id,
				'Title' => $this->input->post('Title'),
				'Tag_Line' => $this->input->post('Tag_Line'),
				'Category' => $this->input->post('Category'),
				'sou_category' => $this->input->post('sou_category'),
				'Description' => $this->input->post('Description'),
		        'place_id' => $this->input->post('place_id'),
			    'date_add' => $date,
				'status' => 2,
			 );
		 
	     $insert = $this->model_listings->create_Listing($data);
		
		 $info= array( 
				'listing_id' =>  $insert,
				'Address' => $this->input->post('location'),
			    'wilaya' => $this->input->post('wilaya'),
			    'lat' => $this->input->post('lat'),
			    'lng' => $this->input->post('lng'),
				'Zip-Code' => $this->input->post('Zip-Code'),
				'Phone' => $this->input->post('Phone'),
				'Email' => $this->input->post('Email'),
				'Website' =>$this->input->post('Website'),
			  );
		
		         $insert_info = $this->model_listings->create_ContactInfo($info);
	               if($insert_info == true && $insert == true ) {
        		       $this->session->set_flashdata('success', 'Successfully created');
        		      redirect('customer/listing/index/2', 'refresh');
        	        }  else {
        		      $this->session->set_flashdata('errors', 'Error occurred!!');
                     redirect('customer/Listing/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
        	     }
			 }	
		  }else{
			
			  $this->data['Amenities']  = $this->model_listings->getAmenitiesData(); 
			  $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
		      $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		      $this->data['Category']= $this->model_category->getActiveCategroy(); 
		      $this->data['cord'] = $this->getinfo($_GET['sou_category'], $_GET['wilaya']); 	
			  $this->data['wilaya']= $this->model_commune->getWilayaData($_GET['wilaya']); 
              $this->data['Category']= $_GET['Category']; 
		      $this->data['sou_category']= $_GET['sou_category']; 
		      $this->data['type']= $_GET['place_types']; 
		      $this->data['Zip']= $_GET['Zip-Code']; 
			  
	          $this->data['customer'] = $customer;
			  
		 	   if (packs($this->user_id , 'status') != 0 ) {
				    if($this->per_listing($this->user_id) == false){
					    $this->data['limitOffre'] = 'limitOffre';
			             $this->render_customer('customer/desactiver');
					  }else{
			           $this->render_customer('customer/listings/add-listing'); }
			     } else {
				       $this->data['status'] = 'desactiver';
			           $this->render_customer('customer/desactiver');
                      }
		  }
	 } 
	 
	
	// first Step choose places 
	public function places($slug = null)
	{
		  if($slug == null){
		       $this->data['customer']   = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		       $this->data['Category']= $this->model_category->getActiveCategroy(); 
			   $this->render_customer('customer/listings/places');
		  }else{
			   if (packs($this->user_id , 'status') != 0 ) {
				    if($this->per_listing($this->user_id) == false || $this->per_service($this->user_id) == false){
					   $this->data['customer']   = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			               $this->data['limitOffre'] = 'limitOffre';
			              $this->render_customer('customer/desactiver');

                }else{
			   
			   $this->data['customer']   = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		       $this->data['Category']= $this->model_category->getActiveCategroy(); 
		       $this->data['serCategory']= $this->Model_ser_category->getCategoryData();
		       $this->data['slug']= $slug ;
			   $this->render_customer('customer/listings/places');

					   }
			     } else {
				      $this->data['customer']   = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			               $this->data['limitOffre'] = 'limitOffre';
			             $this->render_customer('customer/desactiver');
                  }
			   
		   }
			   
	}	
 public function add_new () { 
	 $this->form_validation->set_rules('Title', 'name de l\'annonce', 'trim|required');
    
	$date = date("Y-m-d H:i:s");
    if ($this->form_validation->run() == TRUE) { 
	   
 	    $Category = $this->input->post('Category');
	    $sou_category = $this->input->post('sou_category');
		$place_types = $this->input->post('place_types');
		$photo = $this->input->post('photo');
		$wilaya = $this->input->post('wilaya');
		$Zip = $this->input->post('Zip-Code');
	  
	  
	       if($_FILES['image']['size'] > 0){
	           $listingPhoto = $this->upload_image();
			     $this->resizeImage($listingPhoto);
	             if($listingPhoto == false){
			         $this->session->set_flashdata('error', 'Error  image no supported');
                     redirect('customer/listing/places/add_new', 'refresh');
		       }
		   }else{
			   $listingPhoto = "listing_pic.png";   
			   $this->resizeImage($listingPhoto);
		   } 
	      $data= array( 
				'photo' => $listingPhoto,
				'customer_id' => $this->user_id,
				'Title' => $this->input->post('Title'),
				'Tag_Line' => $this->input->post('Tag_Line'),
				'Category' => $this->input->post('Category'),
				'sou_category' => $this->input->post('sou_category'),
				'Description' => $this->input->post('Description'),
		        'date_add' => $date,
				'status' => 2,
			 );
		 
	     $insert = $this->model_listings->create_Listing($data);
		
		 $info= array( 
				'listing_id' =>  $insert,
				'Address' => $this->input->post('location'),
			    'wilaya' => $this->input->post('wilaya'),
			    'lat' => $this->input->post('lat'),
			    'lng' => $this->input->post('lng'),
				'Zip-Code' => $this->input->post('Zip-Code'),
				'Phone' => $this->input->post('Phone'),
				'Email' => $this->input->post('Email'),
			   );
		
		         $insert_info = $this->model_listings->create_ContactInfo($info);
	               if($insert_info == true && $insert == true ) {
        		       $this->session->set_flashdata('success', 'Successfully created');
        		      redirect('customer/listing/index/2', 'refresh');
        	        }  else {
        		      $this->session->set_flashdata('errors', 'Error occurred!!');
                     redirect('customer/Listing/add_listing?Category='.$Category.'&sou_category='.$sou_category.'&place_types='.$place_types.'&wilaya='.$wilaya.'&Zip-Code='.$Zip, 'refresh');
        	     }
			 
		  }else{
			
		     $dataL=array();
			  $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
		      $this->data['wilayas']= $this->model_commune->getWilayaData(); 
		      $this->data['Category']= $this->model_category->getActiveCategroy(); 
			  
			  $this->data['wilaya']= $this->model_commune->getWilayaData($_GET['wilaya']); 
              $this->data['Category']= $_GET['Category']; 
		      $this->data['sou_category']= $sou_category =$_GET['sou_category']; 
		      $this->data['type']= $_GET['place_types']; 
		      $this->data['Zip']= $_GET['Zip-Code']; 
		       $this->data['customer'] = $customer;
			  $this->data['cord'] = $this->getinfo($sou_category , $_GET['wilaya']); 	
			  
			  
		 	   if (packs($this->user_id , 'status') != 0 ) {
				    if($this->per_listing($this->user_id) == false){
					    $this->data['limitOffre'] = 'limitOffre';
			             $this->render_customer('customer/desactiver');
					  }else{
			           $this->render_customer('customer/listings/add-listing-new'); }
			     } else {
				       $this->data['status'] = 'desactiver';
			           $this->render_customer('customer/desactiver');
                  }
		  }
	 } 
	
  public function getinfo ($cat , $wilaya){
	  $result = array('mark' => array()); 
	  $listing  = $this->model_listings->getListingBySouCat($cat, $wilaya);
  foreach($listing as $key => $value) {
		  
             $coords = $this->model_listings->getContactInfoData($value['id']); 
		     $iconcat = $this->model_category->getCategoryData($value['Category']); 
		     $result['mark'][$key] = array(
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                    <div class="objects">
                             <div class="map-post-des-m">
					         <p><a href="'.base_url("listing_detail/index/".$value['id']).'">'.$value['Title'].'</a></p><span><i class="fa fa-map-marker"></i> '.$coords['Address'].'</span></div>
                             </div></div>', 
	 		  'lat' => $coords['lat'],
			  'lng' =>$coords['lng'] ,
			  'icon' => $iconcat['icon']  );
			 
	        } 
	return  json_encode($result);
	 
   }
	
	 
	public function remove () {
		
		 $listing_id = $this->input->post('listing_id');

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

	   public function getSerSouCategory($id) {
		   $result = $this->Model_ser_category->getSouCategoryByCat($id); 
		   echo json_encode($result); 
	   }
	
	public function updatePhoto ($id) {
		 
		 $image = $this->upload_image();
		 $image_data= array( 
			 'photo' =>  $image  ); 
		$update_photo = $this->model_listings->update_Listing($image_data, $id);
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
     public function resizeImage($filename)
   {
      $source_path =  'assets/images/listings/' . $filename;
      $target_path =  'assets/images/listings/thumbnail/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );


      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }


      $this->image_lib->clear();
   }
	
 public function convertYoutube($string) {
	return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"$2",
		$string
	  );
}


 function per_listing($id){
		 
		   $cpack = packs($this->user_id, 'pack');
		   $coutlisting = $this->model_listings->countListingCustomer($id );
	 $output = false;
	switch ($cpack) {
           case 1:
             if($coutlisting >= 1 ){ $output = false; }else{$output = true; }
             break;
        case 2:
            if($coutlisting >=  5 ){ $output = false; }else{$output = true; }  
            break;
			case 3:
              if($coutlisting >= 20){ $output = false; }else{$output = true; }  
            break;
			case 4:
			 if($coutlisting >= 50 ){ $output = false; }else{$output = true; }  
            break;
         }
		   
		return $output;   
	 }
 function per_service($id){
		 
		   $cpack = packs($this->user_id, 'pack');
		   $coutlisting = $this->model_services->countServiceCustomer($id);
	
	switch ($cpack) {
           case 1:
             if($coutlisting >= 1 ){ $output = false; }else{$output = true; }
             break;
        case 2:
            if($coutlisting >=  5 ){ $output = false; }else{$output = true; }  
            break;
			case 3:
              if($coutlisting >= 20){ $output = false; }else{$output = true; }  
            break;
			case 4:
			 if($coutlisting >= 50 ){ $output = false; }else{$output = true; }  
            break;
         }
		   
		return $output;   
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
}