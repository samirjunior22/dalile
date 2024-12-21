<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	     $this->is_login();
		$this->load->model('model_customer');
	    $this->load->model('model_orders');
	    $this->load->model('model_pack');
	    $this->load->model('model_commune');
	    $this->load->model('model_email');
	    $this->user_id = $this->session->userdata('v_user_id');
	  }
	
   public function detail($id)
    {    
	 
	  $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
	 
	  
	          $this->data['customer'] = $customer;
		      $this->data['devis']  = $this->model_orders->getOrdersData($id); 
		      $this->render_customer('customer/facture/index'); 
    } 

	
   public function devis()
    {    
	 
	   $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   
	          $titre = 'title_'.$this->current_lang ;
		      $cotent = 'cotent_'.$this->current_lang;
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
		       
		      $this->render_customer('customer/facture/devis'); 
    } 
	 public function facture()
    {    
	 
	   $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   
	          $titre = 'title_'.$this->current_lang ;
		      $cotent = 'cotent_'.$this->current_lang;
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
		       
		      $this->render_customer('customer/facture/facture'); 
    } 	 
	public function services($order_id = null)
	  {
	
     if($order_id){	
      $addres = $this->input->post('Address');
     
      $wilaya = $this->input->post('wilaya');
      
      if(($this->input->post('Phone')) != null) {
		  
                $Phone= $this->input->post('Phone');		  
                $customer_phone = $this->model_customer->is_exist_phone($Phone);
	      if($customer_phone == false){
	    $date = date("Y-m-d H:i:s");
        $data= array( 
			 	  'phone' => $Phone ,
				  'address' => $this->input->post('Address'),
				  'wilaya' => $this->input->post('wilaya'),
				  'modified' => $date, ) ;
		 
                $update = $this->model_customer->update_compte($this->user_id , $data); 
		       }else{
				   $this->session->set_flashdata('error',  ' le numéro saisi existe déjà.');
			       redirect('/customer/facture/checkout?order='.$order_id);  
				    }
		  }else {
			  
		 $date = date("Y-m-d H:i:s");
         $data= array( 
			 	   'address' => $this->input->post('Address'),
				  'wilaya' => $this->input->post('wilaya'),
				  'modified' => $date, ) ;
			 $update = $this->model_customer->update_compte($this->user_id , $data); 
		 
		  }
	   
		  $oreder = $this->model_orders->getOrdersData($order_id);
	      $customer = $this->model_customer->fetch_customer_by_id($this->user_id); 
	 	 if($oreder['customer_id'] == $this->user_id ){  	   
	      $pack_detail = $this->model_pack->getPackdetail($oreder['objet']);
		  $this->data['wilaya']= $this->model_commune->getWilayaData();
		  
		  
		  $name= $customer->firstname.' '.$customer->lastname;
		  $this->model_email->send_mail_pack($customer->email , $name, $oreder['bill_no'] ,$pack_detail['pack'], $oreder['total'] ,$oreder['date_add'] ,$oreder['date_add']);
			  
			  $this->data['customer'] = $customer;
	          $this->data['devis'] = $oreder ;
	          $this->data['pack_detail'] = $pack_detail ;
		$this->render_customer('customer/facture/index');
		}
	  }
	}

 
  public function fetchDevisData($devis)
	{
		$result = array('data' => array());

		$orders = $this->model_orders->getOrdersCustomerData($this->user_id , $devis);

		foreach ($orders as $key => $value) {
			
			 $pack_detail = $this->model_pack->getPackdetail($value['objet']); 
			 
        if($devis == 0) {
			 $casone = $pack_detail['pack'] ;
			 $castoo = $value['date_add'];
		}else{
			 $casone = $value['date_add'] ;
			 $castoo = $value['date_regler'];
		    }

		   $etat = ($value['status'] == 1) ? '<span class="label label-success">Payée </span>' : '<span class="label label-warning">No payée</span> <a href="'.base_url().'customer/facture/cart/'.$value['id'].'"> detail</a>';
           $buttons  = ' <button type="button" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$result['data'][$key] = array(
				$value['bill_no'],
				$casone,
				$castoo,
				$pack_detail['total'] ,
				$etat.' '.$buttons, 
			);
		} 

		echo json_encode($result);
	}
	
	public function add_cart(){
		
	  if ( $this->input->post('pack')) { 
	       $pani = $this->input->post('pack') ;
	       $p_detail = $this->model_pack->getPackdetail($pani); 
	       $Ord = $this->model_orders->create($this->user_id ,$pani, $p_detail['total']); 
		   $customer = $this->model_customer->fetch_customer_by_id($this->user_id);
		    
	    if($Ord != null){
			
			 redirect('customer/facture/cart/'.$Ord);
		   }
		
	   }
	}
	
	 public function cart($order_id = null)
    {    
	   if($order_id){
	  $customer = $this->model_customer->fetch_customer_by_id($this->user_id); 
	   
	   $orders = $this->model_orders->getOrdersData($order_id);
	   if($orders['customer_id'] == $this->user_id )
	   {
	       if($orders){$pack_detail = $this->model_pack->getPackdetail($orders['objet']); 
	                $this->data['pack_detail'] = $pack_detail; }
	    
	            $this->data['customer'] = $customer;
	            $this->data['orders'] = $orders;
	            $this->data['devis']  = $this->model_orders->getOrdersData(); 
		      
	            $this->render_customer('customer/facture/cart'); }
	   }	  
    } 
 
  public function checkout()
    {    
	
	 if(isset($_GET['order'])){
	    $order = $this->model_orders->getOrdersData($_GET['order']);
	     if($order['customer_id'] == $this->user_id )
	       {
	 
	   $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
	      
		      $this->data['order'] =  $order;
	          $this->data['customer'] = $customer;
		      $this->data['devis']  = $this->model_orders->getOrdersData(); 
		      $this->data['wilaya']= $this->model_commune->getWilayaData();

	  $this->render_customer('customer/facture/checkout'); 
		   }
	   }
   
   } 
	
	public function update(){
		
		  	   $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   $this->data['customer'] = $customer;
		      
			$this->render_customer('customer/desactiver'); 
	} 
   public function romove_order(){
		
		  	 
	   $order_id = $this->input->post('order_id');

		$response = array();
		if($order_id) {
			  $delete = $this->model_orders->remove($order_id); 
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
	
	
 
 	public function printDiv($id)
	{
		
	  $orders = $this->model_orders->getOrdersData($id);
		
		
		if($id) {
			
			
			$html ='<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/css/style.css').'">
			 
			</head>
			<body onload="window.print();">
			 <style>
  @import url(\'https://fonts.googleapis.com/css?family=Open+Sans\');
 .pricing-box-container {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
}
 .pricing-box {
	background-color: #ffffff;
	box-shadow: 0px 2px 15px 0px rgba(0,0,0,0.5);
	border-radius: 4px;
	flex: 1;
	padding: 0 30px 30px;
	margin: 2%;
	min-width: 80%;
	max-width: 80%;
}

.pricing-box h5 {
	text-transform: uppercase;
}

.price {
	margin: 24px 0;
	font-size: 36px;
	font-weight: 900;
}

.price sub, .price sup {
	font-size: 16px;
	font-weight: 100;
}

.features-list {
	padding: 0;
	list-style-type: none;
}

.features-list li {
	font-weight: 100;
	padding: 12px 0;
	font-weight: 100;
}

.features-list li:not(:last-of-type) {
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

 

.btn-primary:hover {
	box-shadow: 0px 2px 15px 0px rgba(0,0,0,0.5);
	transform: translateY(-3px);
}

.pricing-box-bg-image {
	background-image: url(\'https://images.unsplash.com/photo-1550029402-226115b7c579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=701&q=80\');
	background-size: cover;
	background-position: center center;
	color: #ffffff;
}

.pricing-box-bg-image .features-list li {
	border-bottom-color: rgba(255, 255, 255, 1);
}

 </style>
  
		
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="'.base_url().'/assets/images/logo-facture.png" style="padding-bottom:20px;max-width: 50%;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   El Dalile  LLC.</strong>
              <br />
                  <i>Address :</i> 12 ,  rue Kabir Kadour ,
              <br />
                  Tighalimet, Sidi Bel abbes,
              <br />
                 Algérie.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             
            
             <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
         <h4>  <strong> Facturé à </strong></h4>
           <strong>  Jhon Deo Chuixae</strong>
             <br />
                  <b>Address :</b> 145/908 , New York Lane,
              <br />
                 United States.
             <br />
             <b>Call :</b> +90-908-567-0987
              <br />
             <b>E-mail :</b> info@clientdomain.com
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
         <h4>  <strong>Détails de paiement </strong></h4>
            <b>Bill Amount :  990 USD </b>
              <br />
               Bill Date :  01th August 2014
              <br />
               <b>Payment Status :  Paid </b>
               <br />
               Delivery Date :  10th August 2014
              <br />
               Purchase Date :  30th July 2014
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Les détails</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Website Design</td>
                                     <td>300 USD</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Plugin Dev.</td>
                                     <td>400 USD</td>
                                </tr>
                                <tr>
                                     <td>3</td>
                                     <td>Hosting Domains</td>
                                     <td>200 USD</td>
                                </tr>
                                
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5> Montant de la facture : 900 USD </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Tax : 90 USD ( by 10 % on bill ) </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : 990 USD</strong> </h4>
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
               Il s\’agit d’une facture générée électroniquement, elle n’exige donc pas de signature.

                 </li>
                 <li>
                      Veuillez lire toutes les conditions et politiques sur eldalile.com pour les retours, les remplacements et autres problèmes.

                 </li>
             </ol>
             </div>
         </div>
    
  
 </body>
  </html>';
	 
   echo $html;
	 
			
		}
		
	 	
		
	}
 
   
}