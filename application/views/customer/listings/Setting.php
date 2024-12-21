<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->library('custom_upload');
	    $this->load->library('form_validation');
		$this->load->library('image_moo') ;
	    $this->is_login();
		$this->load->model('model_customer');
	    $this->load->model('model_listings');
	    $this->load->model('model_rating');
	    $this->load->model('model_bookmarks');
	    $this->load->model('Notifications_model');
		 $this->user_id = $this->session->userdata('v_user_id');
	  }
	
   public function index()
    {    
	 
	  if(isset($_GET['new'])){
				
				 $this->data['welcome'] = 'welcome' ;
			 }
	    
	          $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			  $favoris = $this->model_bookmarks->getBookmarks( $this->user_id); 
			 
	         
	         $this->data['page_title'] = 'Home';
	         $this->data['customer'] = $customer;
		 	 $this->data['tolals'] = $this->countReviews();
		 	 $this->data['favoris'] = $favoris ;
		 	 $this->data['countListing'] = $this->countListing();
		     $this->render_customer('customer/dashboard'); 
    } 
	
    public function dashboard() 
	  
	  { 
	         if(isset($_GET['new'])){
				
				 $this->data['welcome'] = 'welcome' ;
			 }
	    
	          $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			  $favoris = $this->model_bookmarks->getBookmarks( $this->user_id); 
			 
	         
	         $this->data['page_title'] = 'Home';
	         $this->data['customer'] = $customer;
		 	 $this->data['tolals'] = $this->countReviews();
		 	 $this->data['favoris'] = $favoris ;
		 	 $this->data['countListing'] = $this->countListing();
		     $this->render_customer('customer/dashboard'); 
	   }
 public function notification() 
	  
	  {
		  
		      $item_array  = null ;
	          $customer_b = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			  
			   $not = $this->Notifications_model->get_all_notifications( $this->user_id); 
	         foreach ($not as  $value) {  
			  $customer = $this->model_customer->fetch_customer_by_id($value->from); 
			 if ($value->from ==  9925 ) {
				 
				   $nested_data['from'] = 'l\'équipe El Dalile';
			       $nested_data['picture'] =  base_url().'assets/images/users/support-d.png';
				     $nested_data['photo'] =$value->photo;
				    $nested_data['listing_id'] = '' ;
				   } else {
				  $listing =  $this->model_listings->getListingData($value->photo);
				  $nested_data['photo'] =$listing['photo'];
                  $nested_data['listing_id'] = $listing['id'];
				   $nested_data['from'] = $customer->firstname.' '.$customer->lastname;
			       $nested_data['picture'] = $customer->picture;
				 }
		      
			  
			   
		 	   $nested_data['content'] = $value->content;
			   $nested_data['status'] =$value->status;
			   $nested_data['id'] =$value->id;
			   $nested_data['generated_on'] =$value->generated_on;
			   $item_array []= $nested_data;
		     } 
	        
	        $this->data['notifications'] = $item_array;
	         $this->data['customer'] = $customer_b;
		 	 $this->data['tolals'] = $this->countReviews();
		 	 $this->data['countListing'] = $this->countListing();
		     $this->render_customer('customer/notification'); 
	   }
	  
 public function profil() 
 {
	         
		  $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   
	          $titre = 'title_'.$this->current_lang ;
		      $cotent = 'cotent_'.$this->current_lang;
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
		 	
		     $this->render_customer('customer/db-my-profile'); 
 }
 public function edit() 
 {
	         
		  $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   
	          $titre = 'title_'.$this->current_lang ;
		      $cotent = 'cotent_'.$this->current_lang;
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
		 	
		     $this->render_customer('customer/db-my-profile-edit'); 
 }
	  
  public function editProfil() 
   {  
	   $response = array();
	   
	   $date = date("Y-m-d H:i:s");
       
	   $data= array( 
			 	 'firstname' => $this->input->post('firstname'),
			     'lastname' => $this->input->post('lastname'),
				 'phone' => $this->input->post('Phone'),
				 'address' => $this->input->post('Address'),
				 'wilaya' => $this->input->post('wilaya'),
				 'modified' => $date, ) ;
		 
            $update = $this->model_customer->update_compte($this->user_id , $data );
           
			
            if($update == true) {
              
			   $response['success'] = true;
               $response['messages'] =   " Done.";
                 
            }
            else {
				
             $response['success'] = false;
             $response['messages'] =   "Erreur";
          } 
	    echo json_encode($response);
	  }
    public function change_password() {
		
		 $response = array();
		 
		 $old =  md5($this->input->post('password1'));
		 $new =   md5( $this->input->post('password'));
		 $c_new =  md5($this->input->post('confirm_password'));
		 
		 
		 if ( $new  ==  $c_new) {
			 
			$old = $this->model_customer->change_pass( $this->user_id , $old );   
		      
			  if (!$old) { 
			           $response['success'] = false;
                       $response['messages'] =   "Votre ancien mot de passe n’a pas été correctement saisi.";
		         }else {
					 
					   $data = array( 'password'=> $new );
					   $old = $this->model_customer->update_compte( $this->user_id , $data );
					
					   $response['success'] = true;
                       $response['messages'] =   "mot de passe bien changer ";
				   }
		           
   
		   } else {
			 
			 $response['success'] = false;
             $response['messages'] = "Les mots de passe ne sont pas identiques";
			 
		 }
	  echo json_encode($response);
	}
	
	public function check_pass () {
		
		 $response = array();
		 
		$pass = md5($this->input->post('pass')) ;
		
		$old = $this->model_customer->fetch_customer_by_id($this->user_id);  
		
		if ( $old->password ==  $pass) { 
		     
			 $response['success'] = true;
             $response['messages'] = " information bien don";
		
		}else {
			
			 $response['success'] = false;
             $response['messages'] = "Mot de pass incorrect";
			
		}
		  echo json_encode($response);
	}
 
 
  public function cropI()
    { 

	$response = array();
   
      if ($img = $_POST['dataURL']){
   
       list($type, $img) = explode(';', $img);
       list(, $img)      = explode(',', $img);
       $img = base64_decode($img);
       file_put_contents( "assets/images/users/".time().'.png', $img);
   
	  $date = date("Y-m-d H:i:s");
	  $images = base_url('assets/images/users').'/'.time().'.png';
       
	   $data= array( 
			 	 'picture' => $images,
				 'modified' => $date, ) ;
		   $response = array();
       
            $update = $this->model_customer->update_compte($this->user_id , $data );
			
		    if($update == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully  "; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Erreur dans la base de données lors de la suppression des informations sur le produit";
            }
		
		} else {
		  
		  echo 'error';
	  }
   
   
   }
   
   
   public function countReviews() {  
	$total = 0 ;
	$listings = $this->model_listings->getListingCustomer($this->user_id , 1); 
	
	foreach ($listings as  $value) { 
	 
 	   $reviews = $this->model_rating->get_rating($value['id']) ;
	   $total += $reviews['totals'];  
	  
 
	 }
	 return $total;
   }  

   public function countListing() {  
	$total =  '' ;
	$listings = $this->model_listings->getListingCustomer($this->user_id , 1); 
	
	foreach ($listings as  $value) { 
	 
 	    
	   $total ++ ;
 
	 }
	 return $total;
   }
   
   public function removeNot($id){
		
		$respense = array();
		
	   $result  = $this->Notifications_model->delet_notification($id);
		if($result){
			
		    $respense['response'] = true ;
		    $respense['messages'] = 'Done';
			
		}else{
			
			$respense['response'] = false ;
		    $respense['messages'] = ' Error was contored';
		}
		
		 echo json_encode($respense);
		
	}
	
    public function removeNotAll($id){
		
		$respense = array();
		
	   $result  = $this->Notifications_model->delet_notification_all($id);
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