<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Public_Controller
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
		$this->load->model('model_bookmarks');
		$this->load->model('model_listings');
		$this->load->model('model_rating');
		$this->load->model('model_category');
		$this->load->model('model_blogs');
	    $this->user_id = $this->session->userdata('v_user_id');
	  }
	
  public function index()
    {    
 
    $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);

    $posts = $this->model_blogs->getBlogByCustomer($this->user_id); 
 
	    $this->data['results'] = $posts;		
			   
	     $this->data['customer'] = $customer;
		 $this->render_customer('customer/blogs'); 
    } 
   
 public function addBlog()
    {    
 
     $this->form_validation->set_rules('title', 'title', 'trim|required');
	 $this->form_validation->set_rules('content', 'content', 'trim|required');
  
	$date = date("Y-m-d H:i:s");
    $image = $this->upload_image();
	
	if ($this->form_validation->run() == TRUE) { 
	
		      
		  $data= array( 
		         
				 'title' => $this->input->post('title'),
				 'content' => $this->input->post('content'),
				 'tags' => $this->input->post('tags'),
				 'photo' => $image,
				 'customer_id' => $this->user_id,
				 'date_add' => $date,
				 
			 );
		 
	     $insert = $this->model_blogs->addblog($data);
	
	    if($insert == true ) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('customer/blogs/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('customer/blogs/addBlog/', 'refresh');
        	}
	  } else {
		  
		   $customer = $this->model_customer->fetch_customer_by_id( $this->user_id);
           $posts = $this->model_blogs->getBlogByCustomer($this->user_id); 
 
	      $this->data['results'] = $posts;		
		  $this->data['customer'] = $customer;
		  $this->render_customer('customer/add-blogs'); 
		  
	   }
	 } 	
	
  public function romovePost() {
	  
	   $post_id = $this->input->post('post_id');

        $response = array();
	  
	    if($post_id) { 
		 
		   $delete = $this->model_blogs->remove($post_id);
	        
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
   public function upload_image()
    {
    	$file = $this->custom_upload->single_upload('image', array(
			 'upload_path' => 'assets/images/posts', 
			 'allowed_types' => 'jpg|jpeg|bmp|png|gif', // etc
			 'max_size' => 0
		));
		
		$imageName =  $file ; 
		
		return $imageName ;
    }  
	
  
}