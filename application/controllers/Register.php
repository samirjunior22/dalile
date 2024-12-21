<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->is_not_login();
		$this->load->library('form_validation'); 
		$this->load->helper('form');
		$this->load->model('model_customer');  
		$this->load->model('model_email');  
		$this->load->model('auth_model');  
		$this->load->model('model_pack');  
		$this->load->model('model_orders');  
		$this->load->model('Notifications_model'); 
	    		
   }

    public function index()
    {    
	  
	   $pack = 1;
		
		 $data = array(
          'pack' => $pack ,
          'page_title' => 'Login',
          'loginURL' => $this->google->get_login_url() 
         );
        
       $this->load->view('public/register', $data);
    }
	public function pric()
    {     
	     $this->data['page_title'] = 'Login';
		
       $this->load->view('public/register_pricing');
    }
	
	public function register () 
	 { 
	    
	    $fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email1');
		$password = md5($this->input->post('password'));
	    $profile_pic = '';
		$source = "";
		
  if ($this->valid_mail($this->input->post('email1')))
     {
         $response = array();
		 
		 $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 $code = substr(str_shuffle($set), 0, 12);
	   
	        $pack == 1 ; 
			$dure = '365 DAY ' ;
			$status = 1; 
			$object = 1 ;
			$total = '0,00 Dzd'; 
			 
		
		$date = date("Y-m-d H:i:s");
		 
  $is_exist = $this->model_customer->is_exist_email($email) ;
  
  if( $is_exist == false) { 
	  
			   $data_user= array( 
				'email' => $email,
				'firstname' => $fname,
				'lastname' => $lname,
				'password' => $password,
                'email_verification_code' => $code,
				'link' => 'tt',
				'picture' => 'user.jpg',
				'created' => $date,
				'status' => 0 ,
			 );
		 
		 $insert = $this->model_customer->insert_new($data_user);
		  
		 
		
		 if ($insert )
   		   {   
	   $data_pack= array( 
		  'date_debut' => date("Y-m-d H:i:s"),
		  'date_end' => date('Y-m-d', strtotime($date. ' + '.$dure.'')),
		  'pack' => $pack,
		  'user_id' => $insert,
		  'status' => $status,
		  );
		 
		     $insert_pack = $this->model_pack->insert_pack($data_pack);
		     $notif = $this->Notifications_model->create_notification_admin($insert, 'joined');
	         $email_send = $this->model_email->send_mail($email ,$insert ,$pack , $this->input->post('password'), $code);
	         $Orders = $this->model_orders->create($insert , $object , $total);
	         
	 
			  if ($email_send) {
			  $response['success'] = true;
              $response['messages'] = "Successfully "; } else {
				  
				  $response['success'] = false;
                  $response['messages'] = $email_send ; 
			  }    
		 
		  } else { 
		 
		      $response['success'] = false;
              $response['messages'] = "something is wrong  ";    
		  } 
     } else {  
	  
	        } 
	  
	   } else
        {
			  $response['success'] = false;
              $response['messages'] =  'email is not valid';
        
        }
	  
	  
     	echo json_encode($response);
	 
  }
	
	public function check_email()
    {    
	  $email = $this->input->post('email1');
	  $is_exist = $this->model_customer->is_exist_email($email) ;
  
       if( $is_exist == false) {
		  echo json_encode(true);;
        }else { echo json_encode(FALSE);}
    }
	
	public function validate()
    {     
	     
	    
       $this->load->view('public/cat' );
    }
	
	
  public function activate() { 
  
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);
 
		//fetch user details
		$user = $this->model_customer->fetch_customer_by_id($id) ;
 
		//if code matches
		if($user->email_verification_code  == $code){
			//update user active status
			$data = array(
			'status' => 2,
			);
			$query = $this->model_customer->update_compte($id , $data);
 
			if($query){
				
			   $result = $this->auth_model->login($user->email, $user->password);

			      if($result){
				
			         if($result->status == 2){  
				         $user_data = array(
					       'v_user_id' => $result->id, 
					       'v_email' => $result->email,
				           'sess_logged_in'=> 1 
				            );
                          $this->session->set_userdata($user_data);
						  redirect('/customer/setting/dashboard?new=1');
				        }
			        }
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
				redirect('login');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
			redirect('login');
		} 
 
	} 
  }
          
  public function oaut(){
	    $response = array();
		
        $email = $this->input->post('email');
        $GivenName = $this->input->post('GivenName');
        $FamilyName = $this->input->post('FamilyName');
        $ImageUrl = $this->input->post('ImageUrl');
         
		  
	  $is_exist = $this->model_customer->is_exist_email($email) ;	

	  if ($is_exist == true) {
		   $result = $this->auth_model->login($email);
		   $user_data = array(
					'v_user_id' => $result->id, 
					'v_email'		=> $result->email,
				    'sess_logged_in'=> 1 
				);
 
				 $this->session->set_userdata($user_data);
			     $response['success'] = true;
                 $response['messages'] = "  done";  
				 
	      }else {
		 
	 
	        $pack = 1 ;
			$dure = '365 DAY ' ;
			$status = 1; 
			$object = 1 ;
			$total = '0,00 Dzd'; 
			 
		$date = date("Y-m-d H:i:s");
			  $passw=$this->generateRandomString();
			    $data_user= array( 
				'email' => $email,
				'firstname' => $GivenName,
				'lastname' => $FamilyName,
				'password' => md5($passw),
                'email_verification_code' => 'connection_with_google ',
				'link' => 'connection_with_google',
				'picture' => $ImageUrl,
				'created' => $date,
				'status' => 2 ,
			 );
		 
		 $insert = $this->model_customer->insert_new($data_user);
     
	   $data_pack= array( 
		  'date_debut' => date("Y-m-d H:i:s"),
		  'date_end' => date('Y-m-d', strtotime($date. ' + '.$dure.'')),
		  'pack' => $pack,
		  'user_id' => $insert,
		  'status' => $status,
		  );
		 
		 $insert_pack = $this->model_pack->insert_pack($data_pack);
		 $notif = $this->Notifications_model->create_notification_admin($insert, 'joined');
		 
		 if($insert )
   		     {   
	           $email_send = $this->model_email->send_mail_auth($email, $pack , $passw);
	         
	          if ($email_send) {
				 
				         $user_data = array(
					       'v_user_id' => $insert, 
					       'v_email' => $email,
				           'sess_logged_in'=> 1 
				            );
                          $this->session->set_userdata($user_data);
			       $response['success'] = true;
                   $response['messages'] = "Successfully ";  
				      
					  } else {
				  
				  $response['success'] = false;
                  $response['messages'] = $email_send ; 
			     }    
		 
		    } else { 
		 
		      $response['success'] = false;
              $response['messages'] = "something is wrong  ";    
		  }  
			  
	 }
    	echo json_encode($response);
 } 
 
	function generateRandomString($length = 10) {
    $charactersData = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($charactersData);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $charactersData[rand(0, $charactersLength - 1)];
    }
    return $randomString;
   }
   
 public function valid_mail($email)
  {  
	 if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
      } else {
         return false;
        }
		 
	}

}