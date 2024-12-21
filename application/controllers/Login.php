<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->model('auth_model');
		 $this->load->library('form_validation');
		 $this->load->model('model_customer');
		 $this->load->model('model_email');
	 
    }

    public function index()
    {    
	     $this->is_not_login();
          $banned = false ;
		 if(isset($_COOKIE['login'])){
		 if($_COOKIE['login'] > 4 ) {
			 
			 $banned = true ;
		 } }
		
	     $this->data['google_login_url']=$this->google->get_login_url();
		
	     $titre = 'title_'.$this->current_lang ;
	   
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Login';
	     $data['banned'] = $banned;
		 
		$this->load->view('public/login' ,  $data);
     
    } 
	
	
		function login()
		{
			$response = array();
			
			 
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			 

		   $result = $this->auth_model->login($email );

			if($result){
				
			if($result->password != $password) {
                   if(isset($_COOKIE['login'])){
					if($_COOKIE['login'] < 5){
						$attempts = $_COOKIE['login'] + 1;
						setcookie('login', $attempts, time()+60*10); //set the cookie for 10 minutes with the number of attempts stored
						
						$response['success'] = false;
                        $response['messages'] = ' I\'m sorry, but your username and password don\'t match. Please go back and enter the correct login details. You Click <a href=\"login.php\">here</a> to try again.';
						 
					  } else{
						  $response['success'] = false;
                          $response['messages'] = 'You\'ve had your 3 failed attempts at logging in and now are banned for 10 minutes. Try again later!';
					 }
				   } else {
				 setcookie('login', 1, time()+60*10); //set the cookie for 10 minutes with the initial value of 1
				}
			 
           }
		else {	 
			if($result->status == 2){  
				$user_data = array(
					'v_user_id' => $result->id, 
					'v_email'		=> $result->email,
				    'sess_logged_in'=> 1 
				);
 
				$this->session->set_userdata($user_data);
				
				 
				 $response['success'] = true;
                 $response['messages'] = ' Done';
				 
				
			}else {
				 
				  $response['success'] = false;
                  $response['messages'] = " Votre Compte est Désactiver";
			 }
				
		}		
				
				
			  }else{  
			 $response['success'] = false;
             $response['messages'] = " Email n'existe pas ";
		  }
         
		 echo json_encode($response);
	 }

	public function logout(){
		$this->session->unset_userdata('sess_logged_in');
			$this->session->unset_userdata('v_email');
			$this->session->unset_userdata('v_user_id');
			$this->session->sess_destroy();

			//set message
			 
        	redirect('Welcome', 'refresh');
	}
 public function forgetpassword()
    {  
	   $this->is_not_login();
       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		
		
    if ($this->form_validation->run() == TRUE) { 
	       $email = $this->input->post('email');
	       $is_exist = $this->model_customer->is_exist_email($email) ; 
		   if (!$is_exist){
			   $data = array(
                   'error' => ' Email n\'éxite pas ',
                   'page_title' => 'forget password',
               );  
			   $this->load->view('public/forgetpassword', $data);
		      }else {
				   $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		           $code = substr(str_shuffle($set), 0, 12);
				  
				  $data = array( 
                   'password' =>  md5($code),
                   'email_verification_code' => $code,
                 );
			    $up = $this->model_customer->update_compte($is_exist->id , $data); 
			    $up = $this->model_customer->fetch_customer_by_id($is_exist->id); 
			 
			    $email_send = $this->model_email->send_pass($up->email,$up->id ,$code, $up->email_verification_code);
				
				redirect('register/validate');
			     
			   }

			   
	}else { 
		$data = array(
                   'error' => ' ',
                   'page_title' => 'Login',
               );
	    
		
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Login';
		 
		$this->load->view('public/forgetpassword',  $data);
	  }
    } 
 
	
}