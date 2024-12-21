<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visiteur extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }
 
	 $this->load->model('Banned_model');
    }

    public function index($group_id = NULL)
    {
		    $user = $this->ion_auth->user()->row();
            $this->data['user'] = $user;
			
        $this->data['page_title'] = 'Users';
        //$this->data['users'] = $this->ion_auth->users($group_id)->result();
        $this->data['users'] = $this->ion_auth->users(array(1,'members'))->result();
        $this->render('admin/visiteur');
	}


	public function fetchVisiteurData()
	{
		$result = array('data' => array());

		$data = $this->Banned_model->getVisiteur();

		foreach ($data as $key => $value) {

			// button
			$buttons = ''; 
		     	$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			    $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
		      
			$result['data'][$key] = array(
			    $value['id'],
			    $value['ip_address'],
			    date('Y m d  H:i:s' , $value['timestamp']),
		        $buttons
			);
		} // /foreach

		echo json_encode($result);
	}

 
   
}