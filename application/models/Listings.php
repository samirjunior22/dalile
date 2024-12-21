<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Listings extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        // Load User Model
       $this->load->model('model_listings', 'listings');
       $this->load->model('model_commune');
       $this->load->model('model_category');
       $this->load->model('model_rating');
       $this->load->model('model_customer');
       $this->load->model('model_bookmarks');
    }
  
	
	public function places_get() {
		 
      $this->load->library('Authorization_Token');
	 
			
		 $cat = $this->input->get('cat') ;
		 $wilaya = $this->input->get('wilaya') ;
		 
		 if( $cat != null && $wilaya != null ) {
				
	     $listing  = $this->listings->getListingBySouCat($cat, $wilaya);
		 
		 if($listing != null){
			 
			   foreach($listing  as $value){
			   $coords = $this->listings->getContactInfoData($value['id']); 
			   $wilaya = $this->model_commune->getWilayaData($coords['wilaya']); 
			     $iconcat = $this->model_category->getCategoryData($value['Category']); 
			 	 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = $value['id'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['wilaya'] = $wilaya['name'];
			     $nested_data['photo'] =$value['photo'];
				 $nested_data['lat'] =  $coords['lat']  ;
				 $nested_data['lng'] =$coords['lng'];
				 $nested_data['icon'] = $iconcat['icon'] ;
				 
		     $item_array []= $nested_data;
		 
		      } 
		  $output =  $item_array;
			 
		 }else {
			$output =' error' ;
			 
		 }
		
	}else{
		
		$output =' no get cat && wilaya ' ;
	}
		  $this->response($output, REST_Controller::HTTP_OK);
	 
	 
	}
 	public function searsh_get() {
		 
      $this->load->library('Authorization_Token');
	  
		 $title = $this->input->get('title') ;
		 $wilayaName = $this->input->get('wilaya') ;
		 $wilayaId  = $this->model_commune->searshWilaya($wilayaName);
		 if( $title != null ) { 
	     $listing  = $this->listings->getListingByTilteAndWilaya($title , $wilayaId['id']);
		 
		 if($listing != null){
			 
			   foreach($listing  as $value){
			   $coords = $this->listings->getContactInfoData($value['id']); 
			   $wilaya = $this->model_commune->getWilayaData($coords['wilaya']); 
			     $iconcat = $this->model_category->getCategoryData($value['id']);
                  $rating = $this->model_rating->get_rating($value['id']); 	
				 	  $Category = $this->model_category->getCategoryData($value['Category']); 
       if($rating['rating'] == 0){$rat = 0;}else{$rat = $rating['rating'];}	
	  
			 	 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = (int)$value['id'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['wilaya'] = $wilaya['name'];
				 $nested_data['Category'] = $Category['name']; 
			     $nested_data['photo'] =$value['photo'];
			     $nested_data['r_totals'] = (int)$rat;
			     $nested_data['review'] = $rating['totals'] ;
				 $nested_data['lat'] =  $coords['lat']  ;
				 $nested_data['lng'] =$coords['lng'];
				 $nested_data['icon'] = $iconcat['icon'] ;  
				 $nested_data['distance'] = "";
				 
		     $item_array []= $nested_data;
		 
		      } 
		  $output =  $item_array;
			 
		 }else {
			$output ='error' ;
			 
		 }
		
	}else{
		
		$output =' no  wilaya ' ;
	}
		  $this->response($output, REST_Controller::HTTP_OK);
	 
	 
	}
   
    public function distance_get() {
		 
      $this->load->library('Authorization_Token');
	   
		 $title = $this->input->get('title') ;
		 $lat = $this->input->get('lat') ;
		 $lng = $this->input->get('lng') ;
		  
		 
		 if( $lat != null ) {
				
	     $listing  = $this->listings->getListingDistance($title ,$lat , $lng);
		 
		 if($listing != null){
			 
			   foreach($listing  as $value){
				  $iconcat = $this->model_category->getCategoryData($value['id']);
                  $rating = $this->model_rating->get_rating($value['id']);
                  $wilaya = $this->model_commune->getWilayaData($value['wilaya']);   
				  $Category = $this->model_category->getCategoryData($value['Category']); 
		  if($rating['rating'] == 0){$rat = 0;}else{$rat = $rating['rating'];}	
			     $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = (int)$value['id'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				  $nested_data['Category'] = $Category['name']; 
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['wilaya'] = $wilaya['name'];
			     $nested_data['photo'] =$value['photo'];
			     $nested_data['r_totals'] =(int)$rat;
			     $nested_data['review'] = $rating['totals'] ;
				 $nested_data['lat'] =  $value['lat']  ;
				 $nested_data['lng'] =$value['lng'];
				 $nested_data['icon'] = $iconcat['icon'] ;  
				 $nested_data['distance'] =$this->convert($value['distance']);
			   
		     $item_array []= $nested_data;
		 
		      } 
		  $output =  $item_array;
			 
		 }else {
			$output =' error' ; 
		 }
		
	}else{
		
		$output ='erreur ' ;
	}
		  $this->response($output, REST_Controller::HTTP_OK);
	 
	 
	}
	  
    public function detail_get(){
		 
		 $id = $this->input->get('id') ;
		
		 $listings = $this->listings->getListingData($id); 
		 
		  if ($listings['status'] != 1) { 
		       
			  $output = 'this listing desactiver';
		  	  $this->response($output, REST_Controller::HTTP_OK);
		   }  
		 
		  $info = $this->listings->getContactInfoData($listings['id']); 
		  $ImagesData = $this->listings->getImagesData($listings['id']);   
	      $Category = $this->model_category->getCategoryData($listings['Category']); 
		  $wilaya = $this->model_commune->getWilayaData($info['wilaya']);  
		  $rating = $this->model_rating->get_rating($listings['id']);  
		  $reviews = $this->model_rating->get_reviews($listings['id'] , 0);  
		  
	if($rating['rating'] == 0){$rat = 0;}else{$rat = $rating['rating'];}
		   $rateData = array(
			 'title' => $listings['Title'],
			 'Tag_Line' => $listings['Tag_Line'],
			 'Description' => $listings['Description'],
			 'photo' => $listings['photo'],
			 'Category' => $Category['name'],
			 'wilaya' => $wilaya['name'],
			 'r_totals' =>  number_format($rat , 1),
			 'Min_Price' => $listings['Min_Price'],
			 'Max_Price' => $listings['Max_Price'],
			 'Phone' => $info['Phone'],
			 'Email' => $info['Email'],
			 'Facebook' => $info['Facebook'],
			 'Address' => $info['Address'],
			 'lat' => $info['lat'],
			 'lng' => $info['lng'],
			  ); 
		 
			  $this->response($rateData, REST_Controller::HTTP_OK);
		 
	}  
	
    public function convert($klm){
		 
		if($klm >1 ) { 
			$m = number_format($klm, 2).' klm'; 
	      }else { 
		  $m = number_format(($klm * 1000), 2).' m';
	  } 
		return $m;
	}
	
    public function reviews_get(){
	  $item_array=array();
	  	 $listings_id = $this->input->get('id') ;
	   
	   $reviews = $this->model_rating->get_reviews_api($listings_id) ;
 
	   foreach($reviews as $count){  
		    $customer = $this->model_customer->fetch_customer_by_id($count['Email']);
		       $nested_data['customerName'] =  $customer->firstname.' '.$customer->lastname;
			    $nested_data['customerPicture'] =   $customer->picture;
			    $nested_data['timeAgo'] =  timeAgo($count['Date_add'] ) ;
			    $nested_data['Review'] =  $count['Review'] ;
			    $nested_data['p_rating'] =  $count['p_rating'] ;
				 
		     $item_array []= $nested_data;
		 
		      } 
		  $rateData =  $item_array;
		 
			
	   $this->response($rateData, REST_Controller::HTTP_OK);
  }
  
    public function postreview_post(){
	  
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
          # Form Validation
        $this->form_validation->set_rules('email', 'Username', 'trim|required');
        $this->form_validation->set_rules('Review', 'Password', 'trim|required');
        $this->form_validation->set_rules('rate', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $message = array(
                'value' => 0,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        { 
          $customer = $this->model_customer->fetch_customer_by_email($this->input->post('email'));
	      $rate= (double)$this->input->post('rate');
	      $listing = (int)$this->input->post('listing');
		  $review_id = 0; 
	      $Review = $this->input->post('Review');
		  $Email =$customer->id ;
		  $Date_add  = strtotime(date('Y-m-j H:i:s'));
          $rateData = array(
			 'listing_id' => $listing,
			 'pere' => $review_id,
			 'p_rating'	  => $rate,
			 'Title'	  => $Date_add,
			 'Review'	  => $Review,
			 'Email'	  => $Email,
			 'Date_add'	  => $Date_add ,
		); 
		
	   $add_review = $this->model_rating->insertRating($rateData);
	   
	   
	   if($add_review)
	   { 
             $message = [
                    'value' => 1,
                    'message' => " DOne"
                ];
       
			} else {
				
             $message = [
                    'value' => 0,
                    'message' => " erreur"
                ]; 
			}
        }
		
	       $this->response($message, REST_Controller::HTTP_NOT_FOUND);
	  
  }	
 
    public function favory_post () {
	  
	   $TyL = 'Favoris';
	   $model =  'listings' ;
	   $Rid = 'listing_id' ;	
	  
	  $review_id =  $this->input->post('postid') ;
	  $user =    $this->input->post('userid') ;
	  $type =   $this->input->post('type') ;
	  
	  
	  $Checking = $this->$model->Checking_user($review_id , $user , $TyL);
			 $Date_add  = strtotime(date('Y-m-d h:i:s'));
			  if($Checking['cntStatus'] == 0){ 
			  
			    $typeda = array ( 
                  'timestamp' => $Date_add,				
                  'user_id' => $user,				
                  $Rid => $review_id	,			
                  $TyL => $type,				
				);
			  
			    $insert = $this->$model->insert_like($typeda);
			 
   
			  } else { 
			   $updat = $this->$model->update_like($Checking['id'] , $type , $TyL);
			    } 
				
	  $rateData = 'done';
	  
	  $this->response($rateData, REST_Controller::HTTP_OK);	  
   }
   
    public function checkFavory_post() {
	   
	     $review_id =  $this->input->post('postid') ;
	     $user =    $this->input->post('userid') ;
	      
	   
	     $Checking = $this->listings->Checking_user($review_id , $user , "Favoris");
		 
		 if($Checking['cntStatus'] == 0){ 
		 
		 $message = [
                    'value' => 0,
                    'message' => " DOne"
                ];
		  
		 }else {
			 $message = [
                    'value' => 1,
                    'message' => " DOne"
                ];
			 
		 }
	    $this->response($message, REST_Controller::HTTP_OK);	  
   }
 
    public function publiched_get() {
		
	   
		 $user_id =  $this->input->get('userid') ;
		 $stat =   $this->input->get('stat') ;
	 
   	    $item_array = array (); 
        
	  $listings = $this->listings->getListingCustomer($user_id , $stat); 
	  
	  foreach ($listings as  $value) { 
		        $rating = $this->model_rating->get_rating($value['id']);
	            $info = $this->listings->getContactInfoData($value['id']); 
	            $Images = $this->listings->getImagesData($value['id']); 
	            $Category = $this->model_category->getCategoryData($value['Category']); 
		        $rating = $this->model_rating->get_rating($value['id']);
		 
		 if($rating['rating'] == 0){$rat = 0;}else{$rat = $rating['rating'];}	 
				 
				 $nested_data['value'] = $stat;
				 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = (int)$value['id'];
				 $nested_data['vue'] = $value['vue'];
				 $nested_data['Category'] = $Category['name']; 
				 $nested_data['r_totals'] =(int)$rat;
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['photo'] =$value['photo'];
				 $nested_data['totals'] =$rating['totals'];
			 	
		  $item_array []= $nested_data;
		  
		  }
	       
		  $output =  $item_array;
		
		  $this->response($output , REST_Controller::HTTP_OK);	
	}
    
	public function bookmarks_get (){
		 
      $user = $this->input->get('userid') ;
		 
	  $favoris = $this->model_bookmarks->getBookmarksListing($user); 
	  foreach ($favoris as  $value) { 
	  $listings = $this->listings->getListingData($value['listing_id']); 
	  
	     $rating = $this->model_rating->get_rating($listings['id']);
	     $info = $this->listings->getContactInfoData($listings['id']); 
	     $Images = $this->listings->getImagesData($listings['id']); 
	     $Category = $this->model_category->getCategoryData($listings['Category']); 
		  $rating = $this->model_rating->get_rating($listings['id']);  

	 if($rating['rating'] == 0){$rat = 0;}else{$rat = $rating['rating'];}	
	 
				 $nested_data['Title'] = $listings['Title'];
				 $nested_data['id'] = (int)$listings['id'];
				 $nested_data['r_totals'] =(int)$rat;
				 $nested_data['Tag_Line'] = $listings['Tag_Line'];
				 $nested_data['Description'] = $listings['Description'];
				 $nested_data['photo'] =$listings['photo'];
				 $nested_data['totals'] =$rating['totals'];
			 	
		  $item_array []= $nested_data;
	   }
	   
	   $output = $item_array ;
		
    $this->response($output, REST_Controller::HTTP_OK);	 
	
	}
	
	
	public function add_listing_post() { 
    $this->form_validation->set_rules('title', 'name de l\'annonce', 'trim|required');
    
	$date = date("Y-m-d H:i:s");
    if ($this->form_validation->run() == TRUE) { 
	    
	     $listingPhoto ="service.jpg";
		 
	      $data= array( 
				'photo' => $listingPhoto,
				'customer_id' =>  $this->input->post('idUser'),
				'Title' => $this->input->post('title'),
				'Tag_Line' => $this->input->post('tag_line'),
				'Category' => $this->input->post('category'),
				'sou_category' => $this->input->post('souCategory'),
				'Description' => '',
		        'date_add' => $date,
				'status' => 2,
			 );
		 
	     $insert = $this->listings->create_Listing($data);
		 $zipCode =   '000';
		 $info= array( 
				'listing_id' =>  $insert,
				'Address' => $this->input->post('address'),
			    'wilaya' => $this->input->post('wilaya'),
			    'lat' => $this->input->post('lat'),
			    'lng' => $this->input->post('lng'),
				'Zip-Code' => $zipCode,
				'Phone' => $this->input->post('phone'),
				'Email' => $this->input->post('email'),
			   );
		
		         $insert_info = $this->listings->create_ContactInfo($info);
	               if($insert_info == true && $insert == true ) {
        		         $output = [
                      'value' => 1,
                      'message' =>  'Done',
                      'insert_id' =>  $insert,
                      ];
        	        }  else {
						 $output = [
                      'value' => 2,
                      'message' => "Error occurred  !!",
                      ];
        		    }
			 
		  }else{ 
		       $output = [
                      'value' => 2,
                      'message' => "Error occurred  !!",
                      ];
		  }
		
		  $this->response($output, REST_Controller::HTTP_OK);
	}
	
	public function checkpack_post() {
			 
      $user = $this->input->post('userid') ;
	  
		     if (packs($user , 'status') != 0 ) {
				  if($this->per_listing($user) == false){
					  
					  $message = [
                             'value' => 0,
                                 'message' => 'limitOffre' 
                               ];
					      }else{
							  $message = [
                                 'value' => 1,
                                 'message' => 'ok' 
                               ];
					   }
			     } else {
					  $message = [
                             'value' => 0,
                                 'message' => 'desactiver' 
                               ];
				  
			       }
      $this->response($message, REST_Controller::HTTP_OK);	 
	}
	
	 function per_listing($id){
		 
		   $cpack = packs($id, 'pack');
		   $coutlisting = $this->listings->countListingCustomer($id);
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
	
	
} 

