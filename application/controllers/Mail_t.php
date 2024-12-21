<?php
class Mail_t extends Public_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Model_email');
    }
    public function index() {
        $this->load->helper('form');
        $this->load->view('public/mail');
    }
    public function send_mail() {
		
		$email = $this->Model_email->send_mail();
	 
        
        if($email)
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent","You have encountered an error");
        $this->load->view('public/mail');
    }
}
?>