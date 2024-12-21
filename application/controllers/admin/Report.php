<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

      if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }

		$this->data['page_title'] = 'Category';

		  $this->load->model('model_raport');
		  $this->load->model('model_listings');
		 $this->load->library('form_validation');
	}
 
	public function index()
	{
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/report/index');	
	}	
 
	public function fetchCategoryDataById($id) 
	{
		if($id) {
			$data = $this->model_raport->getCategoryData($id);
			echo json_encode($data);
		}

		return false;
	}

 
	public function fetchReportData()
	{
		$result = array('data' => array());

		$data = $this->model_raport->getActiveReport();

		foreach ($data as $key => $value) {
			
		$listing = $this->model_listings->getListingData($value['listing_id']);	
			

		     $buttons = '';

		      $buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$listing['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			  $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
	  $Report = '<span class="label label-warning">'.$value['Report'].'</span>';
	   if ($listing['status'] == 0) 
		  $status = '<span class="label label-warning"> desactiver </span>';
	     else 
			 $status = '<span class="label label-success"> Active </span>';
  $photo = ' <div class="thumbnail" style="width:150px">
        <a href="'.base_url('listing_detail/index/'.$listing['id']).'" target="_blank">
          <img src="'.base_url('assets/images/listings/'.$listing['photo']).'" alt="Fjords" >
       </a>
 </div> ';	  
	   
		  $result['data'][$key] = array(
			     $photo ,
				$listing['Title'],
				$Report,
				$status,
				$buttons
			);
		} 

		echo json_encode($result);
	}

	  

}