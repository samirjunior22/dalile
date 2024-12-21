<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Users extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        // Load User Model
       $this->load->model('model_customer', 'UserModel');
	          $this->load->model('model_listings', 'listings');
	          $this->load->model('model_pack');
	          $this->load->model('Notifications_model');
	          $this->load->model('model_orders');
	          $this->load->model('model_email');
	          $this->load->model('auth_model');

    }
 
    public function register_post()
	  {
		  header("Access-Control-Allow-Origin: *");
		  
		 # Form Validation
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Full Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[80]|is_unique[customer.email]',
            array('is_unique' => 'This %s already exists please enter another email address')
        );
		
		 $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 $code = substr(str_shuffle($set), 0, 12);
		    $pack = 1 ; 
			$dure = '365 DAY ' ;
			$status = 1; 
			$object = 1 ;
			$total = '0,00 Dzd'; 
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
		   
		       if ($this->form_validation->run() == FALSE)
                {
                         $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

                    $this->response($message, 400);
                }
                else
                {
					
			  $insert_data = [
                'email' => $this->input->post('email', TRUE),
				'firstname' => $this->input->post('name', TRUE),
				'lastname' => $this->input->post('lastname', TRUE),
			    'password' => md5($this->input->post('password', TRUE)),
			    'email_verification_code' => $code,
                'link' => 'connection_with_google',
				'picture' => '',
				'created' =>  date("Y-m-d H:i:s"),
				'status' => 2 ,
				
            ];

            // Insert User in Database
            $output = $this->UserModel->insert_new($insert_data);
            if ($output > 0 AND !empty($output))
            {
				$email =$this->input->post('email', TRUE);
				$date = date("Y-m-d H:i:s");
				$data_pack= array( 
		       'date_debut' => date("Y-m-d H:i:s"),
		       'date_end' => date('Y-m-d', strtotime($date. ' + '.$dure.'')),
		       'pack' => $pack,
		       'user_id' => $output,
		       'status' => $status,
		        );
				
		     $insert_pack = $this->model_pack->insert_pack($data_pack);
		     $notif = $this->Notifications_model->create_notification_admin($output, 'joined');
	         $email_send = $this->model_email->send_mail($email ,$output ,$pack , $this->input->post('password'), $code);
	         $Orders = $this->model_orders->create($output , $object , $total);
				
                // Success 200 Code Send
                $message = [
                    'value' => 1,
                    'message' => "User registration successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else
            {
                // Error
                $message = [
                    'value' => 2,
                    'message' => "Not Register Your Account."
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
         }
        
    }
	
	  
	public function users_get() {
		
      $this->load->library('Authorization_Token');
	 
	 
	 $is_valid_token = $this->authorization_token->validateToken();
	 $userData = $this->authorization_token->userData();
        
		if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
			 $outId = $this->UserModel->fetch_customer_by_id($userData->id);
			
           $output =[
                    'status' => true,
                    'message' => "Valide access  ",
					'data'=> $outId
					
                ];
		}else {
			     $output =[
                    'status' => false,
                    'message' => "Invalide access Token"
                ];
			
		} 
	   $this->response($output, REST_Controller::HTTP_OK);
	  	}
 
 
    public function login_post()
      {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
          # Form Validation
        $this->form_validation->set_rules('email', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'value' => 0,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            // Load Login Function
            $output = $this->UserModel->user_login($this->input->post('email'), $this->input->post('password'));
            if (!empty($output) AND $output != FALSE)
            {
                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                // Generate Token
                $token_data['id'] = (int)$output->id;
                $token_data['firstname'] = $output->firstname;
                $token_data['lastname'] = $output->lastname;
                $token_data['email'] = $output->email;
                $token_data['created'] = $output->created;
                $token_data['status'] = TRUE;
				$token_data['photo'] = $output->picture;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);
 
               $message = [
                    'value' => 1,
                    'email' => $output->email,
                    'name' =>$output->firstname,
                    'lastName' =>$output->lastname,
                    'id' => (int)$output->id,
                    'picture' => $output->picture,
                    'phone' => $output->phone,
                    'message' => "User login successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else
            {
                // Login Error
                $message = [
                    'value' => 0,
                    'message' => "Invalid Username or Password"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
	
	public function updateProfil_post()
	{  
	   $response = array();
	   
	   $date = date("Y-m-d H:i:s");
       $user_id = $this->input->post('idUser');
	   $data= array( 
			 	 'firstname' => $this->input->post('firstname'),
			     'lastname' => $this->input->post('lastname'),
				 'phone' => $this->input->post('phone'),
				 'address' => $this->input->post('address'),
			    'modified' => $date, ) ;
		 
            $update = $this->model_customer->update_compte($user_id , $data);
           
			
            if($update == true) {
              
			     $message = [
                     'value' => 1,
                     'message' => "User Update successful"
                   ];
               
            }
            else {
				
               $message = [
                     'value' => 0,
                     'message' => "Something Wrong"
                   ];
          } 
     $this->response($message, REST_Controller::HTTP_OK);
	
 
	} 
	
    public function oaut_post(){
		  $this->load->library('Authorization_Token');
	    $response = array();
	    $fullName = array();
		$fullName = $this->split_name($this->input->post('GivenName')); 
        $email = $this->input->post('email');
        $GivenName = $fullName[0];
         $FamilyName = $fullName[1];
        $ImageUrl = $this->input->post('ImageUrl');
         
	 $is_exist = $this->model_customer->is_exist_email($email) ;	

	  if ($is_exist == true) {
		   $result = $this->auth_model->login($email);
		   
		   // Generate Token
                $token_data['id'] = (int)$result->id;
                $token_data['firstname'] = $result->firstname;
                $token_data['lastname'] = $result->lastname;
                $token_data['email'] = $result->email;
                $token_data['created'] = $result->created;
                $token_data['phone'] = $result->phone;
                $token_data['address'] = $result->address;
                $token_data['status'] = TRUE;
				$token_data['photo'] = $result->picture;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);
               $message = [
                    'value' => 1,
                    'email' => $result->email,
                    'name' =>$result->firstname,
                    'lastName' =>$result->lastname,
                    'id' => (int)$result->id,
                    'picture' => $result->picture,
                    'phone' => $result->phone,
                    'user_token' => $user_token ,
                    'message' => "User login successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
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
				  
				  // Generate Token
                $token_data['id'] = (int)$output->id;
                $token_data['firstname'] = $GivenName;
                $token_data['lastname'] = $FamilyName;
                $token_data['email'] = $email;
                $token_data['created'] = date("Y-m-d H:i:s");
                $token_data['status'] = TRUE;
				$token_data['photo'] = $ImageUrl;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);
				  
                   $message = [
                    'value' => 1,
                    'email' => $email,
                    'name' =>$GivenName,
                    'lastName' =>$FamilyName,
                    'id' => (int)$insert,
                    'picture' => $ImageUrl,
                    'phone' => '',
                    'message' => "User login successful",
                    'user_token' => $user_token
                   ];
                  $this->response($message, REST_Controller::HTTP_OK);
				     
					  } else {
						  
				    $message = [
                      'value' => 2,
                      'message' => "message not send",
                      ];
		 
				      $this->response($message, REST_Controller::HTTP_OK);
			      }    
		 
		    } else { 
		             $message = [
                      'value' => 2,
                      'message' => "something is wrong  ",
                      ];
		  
             $this->response($message, REST_Controller::HTTP_OK);			  
		  }  
			  
	 }
     
 } 
  
    function split_name($name) {
     $name = trim($name);
     $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
     $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
    }
    
	
	public function upload_image_post () {
	   
	   
	          $image =  $this->input->post('image');
              $id = $this->input->post('id');
			  
			  $image = base64_decode($this->input->post("image"));
 
              $image_name = md5(uniqid(rand(), true)); 
              $filename = $image_name . '.' . 'png';
 
            file_put_contents('assets/images/users/'. $filename, $image);
			  
			  $data= array( 
				'picture' => 'https://eldalile.com/assets/images/users/'.$filename,
				 );
			  
			   $insert = $this->UserModel->update_compte($id, $data);
	  
	               if($insert == true ) { 
        		      $output = [
                      'value' => 1,
                      'message' =>  'Doone',
                      ];
					
        	        }  else {
        		      $output = [
                      'value' => 2,
                      'message' => "Somthing Wrong !!",
                      ];
        	     }
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
}