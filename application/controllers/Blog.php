<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->model('model_blogs');

    }

    public function index()
    {    
	    $this->data['posts'] = $this->model_blogs->getBlog(); 
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
		 
         $this->render('public/blog');
    }
	 
  public function blog()
    {    
	 
		 $this->data['posts'] = $this->model_blogs->getBlog(); 
		 
         $this->render('public/blog_detail');
    }
	 
	 public function detail($id)
    {    
	     
		  $this->data['post'] = $this->model_blogs->getBlog($id); 
		  $this->data['posts'] = $this->model_blogs->getBlog(); 
		
	      $this->add_count($id);
	      $this->data['page_title'] = 'Home';
	      $this->render('public/blog_detail');
    }
	
 function add_count($slug)
   {
    $this->load->helper('cookie');
    $check_visitor = $this->input->cookie($slug , FALSE);
    $ip = $this->input->ip_address();
 
    if ($check_visitor == false) {
        $cookie = array(
            "name"   => urldecode($slug),
            "value"  => "$ip",
            "expire" =>  time() + 7200,
            "secure" => false
        );
        $this->input->set_cookie($cookie);
        $this->model_blogs->update_counter(urldecode($slug));
    }
}
}