<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sou_category extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
	     $this->data['page_title'] = 'Sou_category';
         $this->load->model('model_category');
 		  $this->load->library('form_validation');
		 
	}

	/* 
	* It only redirects to the manage category page
	*/
	public function index()
	{
 
	    $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/sou_category/soucategory');	
	}	

	/*
	* It checks if it gets the category id and retreives
	* the category information from the category model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchSouCategoryDataById($id) 
	{
		if($id) {
			$data = $this->model_category->getSouCategoryData($id);
			echo json_encode($data);
		}

		return false;
	}

 
	public function fetchSouCategoryData()
	{
		$result = array('data' => array());

		$data = $this->model_category->getSouCategoryData();
        
		foreach ($data as $key => $value) {

			// button
			$buttons = '';
		    $buttons .= '<a href="'.base_url('admin/sou_category/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
		 
				
            $icon = '<span class="lnr '.$value['icon'].' tg-categoryicon"></span>';
			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
			
            $cat = $this->model_category->getCategoryData($value['category_id']);
			$result['data'][$key] = array(
			    $icon,
				$value['name'],
				$cat['name'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}
 

	public function create()
	{
		 $this->form_validation->set_rules('sou_category_name', 'Sou_category name', 'trim|required');
		 $this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
         
        	$data = array(
        		'name' => $this->input->post('sou_category_name'),
				'category_id' =>$this->input->post('category'),
				'icon' =>$this->input->post('sou_category_icon'),
        		'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_category->create_sou($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('admin/sou_category/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('admin/sou_category/create', 'refresh');
        	}
        }
        else {
            // false case
            $user = $this->ion_auth->user()->row();
            $this->data['user'] = $user;
        	       	
			$this->data['category'] = $this->model_category->getActiveCategroy();  
            $this->data['sou_category'] = $this->model_category->getActiveSouCategroy(); 			
			        	

            $this->render('admin/sou_category/create');
        }	
	}
	
 
	public function update($sou_category_id)
	{    

              $this->form_validation->set_rules('sou_category_name', 'Sou_category name', 'trim|required');
			  $this->form_validation->set_rules('availability', 'Active', 'trim|required');
			  $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
            // true case
            
            $data = array(
                    'name' => $this->input->post('sou_category_name'),
					'category_id' =>$this->input->post('category'),
					'icon' =>$this->input->post('sou_category_icon'),
	        		'active' => $this->input->post('availability'),
            );
 

            $update = $this->model_category->update_sou($data, $sou_category_id);
            if($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('admin/sou_category/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('admin/sou_category/edit/'.$sou_category_id, 'refresh');
            }
        }
        else {
             
            
            // false case
                    
              $this->data['category'] = $this->model_category->getActiveCategroy();
              $this->data['sou_category'] = $this->model_category->getActiveSouCategroy();  			
                      

            $sou_category_data = $this->model_category->getSouCategoryData($sou_category_id);
            $this->data['sou_category_data'] = $sou_category_data;
            $this->render('admin/sou_category/edit'); 
        }   
	}
 
	public function remove()
	{
		 
		$category_id = $this->input->post('sou_category_id');

		$response = array();
		if($category_id) {
			$delete = $this->model_category->remove_sou($category_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

}