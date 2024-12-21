<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Etablissement extends Admin_Controller 
{
	public function __construct()
	{
      parent::__construct();

      if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }

		  $this->data['page_title'] = 'Etablissement';

		  $this->load->model('model_Etablissement');
		  $this->load->model('model_commune');
		 $this->load->library('custom_upload');
		 $this->load->library('form_validation');
	}

	/* 
	* It only redirects to the manage category page
	*/
	public function index()
	{
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/etablissement/index');	
	}	

	/*
	* It checks if it gets the category id and retreives
	* the category information from the category model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchEtablissementDataById($id) 
	{
		if($id) {
			$data = $this->model_Etablissement->getCategoryData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Fetches the category value from the category table 
	* this function is called from the datatable ajax function
	*/
	public function fetchEtablissementData()
	{
		$result = array('data' => array());

		$data = $this->model_Etablissement->getCategoryData();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

		 
				$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			    $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
		  $status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
               $icon = '<span class="lnr  tg-categoryicon"></span>';
			$result['data'][$key] = array(
				$icon,
				$value['name'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}
 
	public function create()
	{
		 
      $response = array();

		$this->form_validation->set_rules('category_name', 'Category name', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		 'name' => $this->input->post('category_name'),
        	     'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_Etablissement->create_cat($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}

	/*
	* Its checks the category form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id)
	{
 
     $response = array();

		if($id) {
			$this->form_validation->set_rules('edit_category_name', 'Category name', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('edit_category_name'),
        		    'icon' => $this->input->post('edit_category_icon'),
        		    'color' => $this->input->post('color'),
        		    'active' => $this->input->post('edit_active'),	
	        	);

	        	$update = $this->model_Etablissement->update_cat($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

    public function remove()
	
	 {
		 
		 $category_id = $this->input->post('category_id');

		$response = array();
		if($category_id) {
			$delete = $this->model_Etablissement->remove($category_id);
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
	
	 /* ********  sou category ********** */
	 
 public function souCategory()
	{
 
	    $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/etablissement/soucategory');	
	}
	
 public function fetchSouCategoryDataById($id) 
	{
		if($id) {
			$data = $this->model_Etablissement->getSouCategoryData($id);
			echo json_encode($data);
		}

		return false;
	}

  
 
	public function fetchSouCategoryData()
	{
		$result = array('data' => array());

		$data = $this->model_Etablissement->getSouCategoryData();
        
		foreach ($data as $key => $value) {

			// button
			$buttons = '';
		    $buttons .= '<a href="'.base_url('sou_category/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
		 
				
            $icon = '<span class="lnr  tg-categoryicon"></span>';
			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
			
            $cat = $this->model_Etablissement->getCategoryData($value['Eta_categories']);
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
 

	public function create_sou()
	{
		 $this->form_validation->set_rules('sou_category_name', 'Sou_category name', 'trim|required');
		 $this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
         
        	$data = array(
        		 'name' => $this->input->post('sou_category_name'),
				 'Eta_categories	' =>$this->input->post('category'),
				 'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_Etablissement->create_sou($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('admin/etablissement/souCategory', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('admin/etablissement/create', 'refresh');
        	}
        }
        else {
            // false case
            $user = $this->ion_auth->user()->row();
            $this->data['user'] = $user;
        	       	
			$this->data['category'] = $this->model_Etablissement->getActiveCategroy();  
            $this->data['sou_category'] = $this->model_Etablissement->getActiveSouCategroy(); 			
			        	

            $this->render('admin/etablissement/create');
        }	
	}
	
 
	public function update_sou($sou_category_id)
	{    

              $this->form_validation->set_rules('sou_category_name', 'Sou_category name', 'trim|required');
			  $this->form_validation->set_rules('availability', 'Active', 'trim|required');
			  $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
            // true case
            
            $data = array(
                     'name' => $this->input->post('sou_category_name'),
					 'Eta_categories' =>$this->input->post('category'),
					 'active' => $this->input->post('availability'),
            );
 

            $update = $this->model_Etablissement->update_sou($data, $sou_category_id);
            if($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('admin/etablissement/souCategory', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('admin/etablissement/update_sou/'.$sou_category_id, 'refresh');
            }
        }
        else {
             
            
            $user = $this->ion_auth->user()->row();
            $this->data['user'] = $user;
                    
              $this->data['category'] = $this->model_Etablissement->getActiveCategroy();
              $this->data['sou_category'] = $this->model_Etablissement->getActiveSouCategroy();  			
                      

            $sou_category_data = $this->model_Etablissement->getSouCategoryData($sou_category_id);
            $this->data['sou_category_data'] = $sou_category_data;
            $this->render('admin/etablissement/edit'); 
        }   
	}
 
	public function remove_sou()
	{
		 
		$category_id = $this->input->post('sou_category_id');

		$response = array();
		if($category_id) {
			$delete = $this->model_Etablissement->remove_sou($category_id);
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
	
	
	
	
		
	/* ****************************************** */
	
 public function etablissement()
	{
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/etablissement/etaIndex');	
	}
 
	
 public function fetchEtaData()
	{
		$result = array('data' => array());

		$data = $this->model_Etablissement->getEtablissementData();

		foreach ($data as $key => $value) {
			 $categ = $this->model_Etablissement->getSouCategoryData($value['Eta_sou_categories']);

		     $buttons = '';

		      $buttons .= '<a type="button" class="btn btn-default" href="'.base_url('admin/etablissement/edit/'.$value['id']).'"  ><i class="fa fa-pencil"></i></a>';
			  $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
	  if ($value['status'] == 0) 
		  $status = '<span class="label label-danger"> desactiver </span>';
	     elseif ($value['status'] == 1) 
			 $status = '<span class="label label-success"> Active </span>';
			else 
		     $status = '<span class="label label-warning">en attente</span>';
  $photo = ' <div class="thumbnail" style="width:150px">
        <a href="'.base_url('listing_detail/index/'.$value['id']).'" target="_blank">
          <img src="'.base_url('assets/images/etablissements/'.$value['photo']).'" alt="Fjords" >
       </a>
 </div> ';	  
	   
		  $result['data'][$key] = array(
			    $photo ,
				$value['name'],
				$categ['name'],
				$status,
				$buttons
			);
		} 

		echo json_encode($result);
	}
	
	public function create_eta()
	{
		 $this->form_validation->set_rules('name', 'name name', 'trim|required');
		 $this->form_validation->set_rules('Eta_category', 'Eta category', 'trim|required');
		 $this->form_validation->set_rules('sou_category', 'sou category', 'trim|required');
		 $this->form_validation->set_rules('Wilaya', 'Wilaya', 'trim|required');
		 $this->form_validation->set_rules('discription', 'discription', 'trim|required');
		 $this->form_validation->set_rules('phone', 'Telephone', 'trim|required');
		 $this->form_validation->set_rules('email', 'email', 'trim|required');
		 $this->form_validation->set_rules('addresse', 'Active', 'trim|required');

	   $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
	  
        if ($this->form_validation->run() == TRUE) {
         
      $address = $this->input->post('addresse'); // Address
      $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAdI0GSQlVslIEcOTXlbsJ2Lm9lBVy0o3g&address='.urlencode($address).'');
      $geo = json_decode($geo, true);  
      if (isset($geo['status']) && ($geo['status'] == 'OK')) {
          $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
          $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
       }
	    $refineaddress = str_replace("#_#","&",$this->input->post('addresse'));
	 $image = $this->upload_image();
        	$data = array(
        		 'name' => $this->input->post('name'),
				 'photo' => $image,
				 'Eta_categories' => $this->input->post('Eta_category'),	
				 'Eta_sou_categories' => $this->input->post('sou_category'),	
				 'discription' => $this->input->post('discription'),	
				 'addresse' => $refineaddress,	
				 'wilaya' => $this->input->post('Wilaya'),	
				 'phone' => $this->input->post('phone'),	
				 'fax' => $this->input->post('fax'),	
				 'site' => $this->input->post('site'),	
				 'email' => $this->input->post('email'),	
				 'lat' => $latitude,	
				 'lng' => $longitude ,	
				 'status' => 1	
        	);

        	$create = $this->model_Etablissement->create_Etablissement($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('admin/etablissement/etablissement', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('admin/etablissement/create_eta', 'refresh');
        	}
        }
        else {
            // false case
            $user = $this->ion_auth->user()->row();
            $this->data['user'] = $user;
        	       	
			$this->data['Category'] = $this->model_Etablissement->getActiveCategroy();  
            $this->data['Wilaya'] = $this->model_commune->getWilayaData(); 			
			        	

            $this->render('admin/etablissement/etaCreate');
        }	
	}
	
	   public function edit($id) 
	  {
		      $this->form_validation->set_rules('name', 'Titre de l\'annonce', 'trim|required');
	          $this->form_validation->set_rules('sou_category', 'Slogan', 'trim|required');
	          $this->form_validation->set_rules('discription', 'Category', 'trim|required');
	          $this->form_validation->set_rules('Wilaya', 'Description', 'trim|required');
	          $this->form_validation->set_rules('phone', 'phone', 'trim|required');
	          
	    
	if ($this->form_validation->run() == TRUE) {

      $address = $this->input->post('addresse'); // Address
      $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAdI0GSQlVslIEcOTXlbsJ2Lm9lBVy0o3g&address='.urlencode($address).'');
      $geo = json_decode($geo, true);  
      if (isset($geo['status']) && ($geo['status'] == 'OK')) {
          $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
          $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
       }        
        
		 $data= array( 
				 'name' => $this->input->post('name'),
				  'Eta_categories' => $this->input->post('Eta_category'),	
				 'Eta_sou_categories' => $this->input->post('sou_category'),		
				 'discription' => $this->input->post('discription'),	
				 'addresse' =>  $this->input->post('addresse'),	
				 'wilaya' => $this->input->post('Wilaya'),	
				 'phone' => $this->input->post('phone'),	
				 'fax' => $this->input->post('fax'),	
				 'site' => $this->input->post('site'),	
				 'email' => $this->input->post('email'),	
				 'lat' => $latitude,	
				 'lng' => $longitude ,	
				 'status' => 1	
			 );
			 
		 if($_FILES['image']['size'] > 0) {
                $this->updatePhoto($id);
            }	
	     $updat_L = $this->model_Etablissement->update_Etablissement($data, $id);
		   
			 
		   if( $updat_L == true ) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('admin/etablissement/etablissement', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('admin/etablissement/edit/'.$id.'', 'refresh');
        	}
		  
		  } else {
				 
		  
		  $user = $this->ion_auth->user()->row();
             $this->data['user'] = $user;
             $this->data['etablissements'] = $etablissements = $this->model_Etablissement->getEtablissementData($id);
			 $this->data['Categories'] = $this->model_Etablissement->getActiveCategroy(); 
             $this->data['SouCategory']  = $this->model_Etablissement->getSouCategoryData($etablissements['Eta_sou_categories']);			 
             $this->data['Category']  = $this->model_Etablissement->getCategoryData($etablissements['Eta_categories']);			 
             $this->data['Wilaya'] = $this->model_commune->getWilayaData(); 			
			        	

            $this->render('admin/etablissement/etaEdit');
			
		 }
	  }
	
	public function getSouCatByCat($id) {
		
		
		 $data  = $this->model_Etablissement->getSouCategoryDataById($id);
		 echo json_encode($data); 
	}
	public function updatePhoto ($id) {
		 
		 $image = $this->upload_image();
		
		$image_data= array( 
			 'photo' =>  $image  ); 
		$update_photo = $this->model_Etablissement->update_Etablissement($image_data, $id);
		 
		  
	}
	
public function upload_image()
    {
    	$file = $this->custom_upload->single_upload('image', array(
			 'upload_path' => 'assets/images/etablissements', 
			 'allowed_types' => 'jpg|jpeg|bmp|png|gif', // etc
			 'max_size' => 0
		));
		
		$imageName =  $file ; 
		
		return $imageName ;
    } 
	
 public function remove_Etablissement()
	{
		 
		$id = $this->input->post('id');

		$response = array();
		if($id) {
			$delete = $this->model_Etablissement->remove_Etablissement($id);
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