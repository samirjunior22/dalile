<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Admin_Controller 
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

		  $this->load->model('Model_pack');
		  $this->load->model('model_orders');
		  $this->load->model('model_customer');
		  $this->load->model('notifications_model');
		 $this->load->library('form_validation');
	}
 
	public function index()
	{
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/customer/index');	
	}	
	public function devis()
	{
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/customer/devis');	
	}	
 
	public function fetchCustomerDataById($id) 
	{
		if($id) {
			$data =  $this->Model_pack->getPackDataById($id);
			echo json_encode($data);
		}

		return false;
	}

	public function fetchOrderDataById($id) 
	{
		if($id) {
			$data =  $this->model_orders->getOrdersData($id);
			echo json_encode($data);
		}

		return false;
	}
 
	public function fetchCustomerData()
	{
		$result = array('data' => array());

		$data = $this->model_customer->fetch_customer();

		foreach ($data as $key => $value) { 
		
	      	$packs = $this->Model_pack->getPackDataById($value->id);
			
		 if ($packs['pack'] == 1) 
		  $pack = '<span class="label label-success"> gratuit </span>';
	     elseif ($packs['pack']  == 2) 
			 $pack = '<span class="label label-warning"> profissionnel </span>';
			 elseif ($packs['pack']  == 3) 
		     $pack = '<span class="label label-info"> Prime</span>';
			 else 
			  $pack = '<span class="label label-info"> Entreprise </span>';
		      $buttons = '';

		      $buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value->id.')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			  $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
	  if ($packs['status'] == 0) 
		  $status = '<span class="label label-danger"> desactiver </span>';
	     else   
			 $status = '<span class="label label-success"> Active </span>';
			 
		 
  $photo = ' <div class="thumbnail" style="width:150px">
        <a href="'.base_url('listing_detail/index/'.$value->id).'" target="_blank">
          <img width="90" src="'.$value->picture.'" alt="Fjords" >
       </a>
 </div> ';	  
	   
		  $result['data'][$key] = array(
			    $value->firstname.' '.$value->lastname,
			    $value->email , 
				$pack,
				$status,
			    $value->created,
				$buttons
			);
		} 

		echo json_encode($result);
	}
	
 public function fetchDevisData()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersData();

		foreach ($data as $key => $value) { 
		
	      	$pack_detail = $this->Model_pack->getPackdetail($value['objet']);
			$customer = $this->model_customer->fetch_customer_by_id($value['customer_id']);
			
		 
		      $buttons = '';

		      $buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			  $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
	  if ($value['status'] == 0) 
		  $status = '<span class="label label-danger"> No Payée </span>';
	     else   
			 $status = '<span class="label label-success"> Payée </span>';
			 
	   
		  $result['data'][$key] = array(
			    $value['bill_no'],
			    $customer->email , 
				$pack_detail['pack'],
				$value['date_add'],
			    $status,
				$buttons
			);
		} 

		echo json_encode($result);
	}
	
	public function update ($id) {
		
		  $response = array();
		  $status =  $this->input->post('edit_active') ;
		  $date_end =  $this->input->post('date_end') ;
		  $user_id =  $this->input->post('user_id') ;

		 if($id) {
		 
	        	$data = array( 
        		    'status' =>  $status,	
        		    'date_end' =>  $date_end,	
	        	);

	        	$update = $this->Model_pack->update_pack($data ,$id);
			 	 	if($update == true) {
				    $action = ($status == 1 ? 'active' : 'desactiver') ;
				if($status == 2) {
					  $this->notifications_model->create_notification($user_id,  9925 , 'Votre compte est active' , 'assets/images/img/activer.jpg');
						
				       }else{
					  $this->notifications_model->create_notification($user_id,  9925 , 'Votre compte est inactive ' , 'assets/images/img/desactiver.jpg');
                    }	
				 		
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
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
		
		
	}	
	
	public function update_order($id) {
		
		  $response = array();
		  $status =  $this->input->post('edit_active') ;
		  $date_end =  date("Y-m-d H:i:s") ;
		  $customer_id =  $this->input->post('customer_id') ;
		  $pack_status =  $this->input->post('pack_status') ;

		 if($id) {
		 
	        	$data = array( 
        		    'status' =>  $status,	
        		    'date_regler' => date("Y-m-d H:i:s"),	
	        	);

	        	 $this->db->where('id', $id);
			     $update = $this->db->update('facture', $data);
				 $dure = '365 day';
				 
				 $dataa = array( 
        		    'pack' =>  $pack_status,	
        		    'status' =>  1,	
        		    'date_end' => date('Y-m-d', strtotime($date_end. ' + '.$dure.'')),
	        	 );
               $update = $this->Model_pack->update_pack($dataa ,$customer_id);
			   if($update) {
					  $this->notifications_model->create_notification($customer_id,  9925 , 'Votre Pack est active' , 'assets/images/img/activer.jpg');
						
				       }
				
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
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
		
		
	}
	
	
 public function remove()
	{ 
		 $user_id = $this->input->post('user_id');

		$response = array();
		if($user_id) {
			$delete = $this->model_customer->remove_customer($user_id);
			 
			
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