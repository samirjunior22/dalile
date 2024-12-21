<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
    }

    public function index()
    {    
	    $this->data['google_login_url']=$this->google->get_login_url();
		
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
		 
         $this->render('public/pricing');
    }
	 
	 
	
}