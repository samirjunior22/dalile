<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing_detail extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
		$this->load->library('googlemaps');
		$this->load->library('ratings'); 
	    $this->load->model('model_listings');
	    $this->load->model('model_category');
	    $this->load->model('model_commune');
	    $this->load->model('model_customer');
	    $this->load->model('messages_model');
	    $this->load->model('notifications_model');
	    $this->load->model('model_rating');
    } 
	
	public function profil() {
		
		
		 
         $this->render('public/listing-profil');
		
	}

    public function index($id = null)
    {   
	  $this->add_count($id);
	  $listings = $this->model_listings->getListingData($id); 
      if (!$listings ) { 
		  redirect(base_url());
	   } if ($listings['status'] != 1) { 
		  redirect(base_url('/pages/index/listing-desactive'));
	   }   
		   
		  $info = $this->model_listings->getContactInfoData($listings['id']); 
		  $ImagesData = $this->model_listings->getImagesData($listings['id']); 
		  $this->data['allPhoto']= $this->model_listings->getAllImages($listings['id']); 
	      $Category = $this->model_category->getCategoryData($listings['Category']); 
		  $wilaya = $this->model_commune->getWilayaData($info['wilaya']);  
		  $rating = $this->model_rating->get_rating($listings['id']);  
		  $reviews = $this->model_rating->get_reviews($listings['id'] , 0);  
		  
		  $item_array = array();
		  $yummy = json_decode($listings['Amenities']); 
		   if($yummy){foreach ($yummy as  $value) {   
			   $Amenities = $this->model_listings->getAmenitiesData($value);
			   $nested_data['Amenities'] = $Amenities['Amenities'];
			   $nested_data['icon'] =$Amenities['icon'];
			   $item_array []= $nested_data;
		   } }
			 
	    
		      $this->data['listings'] = $listings;
	          $this->data['Category'] = $Category;
	          $this->data['Wilaya'] = $wilaya;
	          $this->data['Images'] = $ImagesData;
	          $this->data['info'] =  $info;
	          $this->data['Amenities'] =  $item_array; 
	          $this->data['rating'] =  $rating; 
	          $this->data['reviews'] =  $reviews; 
			  
		$this->model_listings->setPageNumber(3);
        $this->model_listings->setOffset(0);	  
	    $listingSimilar = $this->model_listings->getActiveListing($listings['Category']);
			  foreach ($listingSimilar as  $value) { 
		        $infoc = $this->model_listings->getContactInfoData($value['id']); 
	            $Images = $this->model_listings->getImagesData($value['id']); 
	            $wilaya = $this->model_commune->getWilayaData($infoc['wilaya']); 
	            $Category = $this->model_category->getCategoryData($value['Category']); 
		         $ratings = $this->model_rating->get_rating($value['id']);
				 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = $value['id'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['photo'] =$value['photo'];
				 $nested_data['Category_id'] =$value['Category'];
				 $nested_data['Category'] =$Category['name'];
				 $nested_data['icon'] =$Category['icon'];
				 $nested_data['totals'] =$ratings['totals'];
				 $nested_data['rating'] =$ratings['rating'];
				 $nested_data['wilaya'] =$wilaya['name']; 
			    $listingSimilarL []= $nested_data;
		   }
		 
		   $this->data['lat'] = $lat = $info['lat'];
           $this->data['lng'] =  $lng = $info['lng']; 
           $this->data['icon'] =  $Category['icon']; 
           $this->data['infowindow_content'] =  ' Posistion'; 
		   
		  
		 $total_likes = $this->model_listings->Countlike($id);
	     $total_unlikes = $this->model_listings->cntUnlikes($id); 
		 $this->data['listingSimilarArray'] =  $listingSimilarL ;
		 $this->data['total_likes'] =  $total_likes ;
		 
	     $this->data['comments'] = $this->getReviews($id , 0);
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
	 
         $this->render('public/listing-profil');
    }
	
	
	
 public function addRating(){
	 
	 $response = array(); 
	  $rate = 1 ;
	  $listing = 0 ;
     	 
  if ($this->input->post('Email') && $this->input->post('Review')) {
		 
	   if ($this->input->post('p_rating')){
			   $rate = $this->input->post('p_rating');
		    }
			if ($this->input->post('listing_id')){
			   $listing = $this->input->post('listing_id');
		    }  
		  $review_id = $this->input->post('review_id') ;
	      $Review = $this->input->post('Review');
		  $Email = $this->input->post('Email');
		  $Date_add  = strtotime(date('Y-m-d h:i:s'));
          $rateData = array(
			 'listing_id' => $listing,
			 'pere' => $review_id,
			 'p_rating'	  => $rate,
			 'Title'	  => $Date_add,
			 'Review'	  => $Review,
			 'Email'	  => $Email,
			 'Date_add'	  => $Date_add ,
		); 
		
	   $add_review = $this->model_rating->insertRating($rateData);
	   
       if($add_review){
			    $response['success'] = true;
                $response['messages'] = $add_review;
		  } else { 
			   $response['success'] = false;
               $response['messages'] = "error"; 
		  }
        }else {
	      
 		    $response['success'] = false;
            $response['messages'] = "Erreur"; 
	  
       }	
		
	  echo json_encode($response);
  }
 
	 public function loadReview () {
		   
		   $row = $this->input->post('row') ;
		   $listings = $this->input->post('listings') ; 
	       echo  $this->getReviews($listings ,  $row);
		   
	 } 
	 public function getReviews($listings_id , $row){
       
		 $html = '' ;
		  
     $reviews = $this->model_rating->get_reviews($listings_id , $row) ;
     foreach($reviews as $country){
	   $c = $b = '';
	   $customer = $this->model_customer->fetch_customer_by_id($country->Email);
       $reviews_child = $this->model_rating->get_child($country->id);
       $count_child = $this->model_rating->count_child($country->id);
	   $total_likes = $this->model_rating->Countlike($country->id);
	   $total_unlikes = $this->model_rating->cntUnlikes($country->id);
	   $Checking = $this->model_rating->Checking_user($country->id ,$customer->id );
	   if($Checking['type'] == 1) { $c ='style = "color:#38ccff;"'; }
	   if($Checking['type'] == 2) { $b ='style = "color:#38ccff;"'; }
 if($this->session->userdata('v_user_id') != 0) { 
                                       $customerid = customer($this->session->userdata('v_user_id'), 'id') ; $li1 = '<li><a  '.$c.'  class="like menu" value="Like" rat="'. $customerid.'" id="like_'.$country->id.'" ><span id="spanl'. $country->id.'" '.$c.'  >'.$total_likes.' </span><i class="fa fa-thumbs-o-up"  '.$c.'  aria-hidden="true"></i></a> </li>'; 
					                   $li2='<li><a  '.$b.' class="unlike menu" value="Unlike" rat="'. $customerid.'" id="unlike_'.$country->id.'" ><span id="spanu'. $country->id.'" '.$b.' >'.$total_unlikes.' </span><i class="fa fa-thumbs-o-down"   aria-hidden="true"></i></a> </li> ' ;	 }else { $li1 = $li2= '' ; }
	                       
		  $html .='<li  class="formComment" id="com'.$country->id.'">
								 <div class="lr-user-wr-img"> <img class="media-object img-circle" src="'.$customer->picture.'" alt=""> </div>
								 <div class="lr-user-wr-con">
										 <h6>'. $customer->firstname.' '.$customer->lastname.'<span>'.$country->p_rating.' <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date"> </span>
										  <p>'. $country->Review.'</p>
										  <ul>
										  '.$li1.' '.$li2.'
 
													<li><a data-toggle="collapse" href="#replycone'.$country->id.'"><span>Répondre</span> <i class="fa  fa-reply" aria-hidden="true"></i></a> </li>';
							  if ($reviews_child) {  $html .=  '<li><a  data-toggle="collapse" href="#replyco'.$country->id.'"><span>'.$count_child['total'].' réponses</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li> ' ; }
					                        $html .=  '<li><a> <span>'. timeAgo($country->Date_add ) .'</span> </a> </li>';
											$html .=  ' </ul>
											   </div></li> ' ;
									 
		 if($this->session->userdata('v_user_id') != 0) { $html .= ' <li class=" media-replied collapse"  id="replycone'.$country->id.'"> 
											<div class="lr-user-wr-img"> <img class="media-object img-circle"  src="'.customer($this->session->userdata('v_user_id'), 'picture').'" alt=""> </div>
											<div class="lr-user-wr-con ">
		   <form id="formReply'.$country->id.'" method="post"  >
			 <h6>'.customer($this->session->userdata('v_user_id'),'firstname').'</h6> 
			 <input name="review_id" type="hidden" value="'.$country->id.'" class="form-control" >
			  <input name="Email" type="hidden" value="'.$this->session->userdata('v_user_id').'" class="form-control" >
			 <textarea id="Te_'.$country->id.'" class="form-control" name="Review"  style="min-height: 1em" rows="1" placeholder="Répondez..."></textarea>
               <ul>
		    </ul>
			  </form>
			 </div>
				 </li>';
		       }else { 
					 $html.= '<li class=" media-replied collapse"  id="replycone'.$country->id.'"> 
											<div class="lr-user-wr-img"> <img class="media-object img-circle"  src=" " alt=""> </div>
											<div class="lr-user-wr-con   ">
												<div class="col-sm-12">
												<h4>Connectez-vous pour poster  réponse<h4>
                                                <p>Vous n\'avez pas de compte?<a href="'.base_url('register/pric').'">Inscrivez-vous </a></p>
												<button data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i>Se connecter</button>
                                                </div>
											</div>
										</li>';
									  }
					  if ($reviews_child) {
						     $html.= '<ul  class=" media-replied collapse"  id="replyco'.$country->id.'">';
							  foreach($reviews_child as $child ){
 							   $html .=  ' <li> 
											<div class="lr-user-wr-img"> <img class="media-object img-circle"  src="'.$customer->picture.'" alt=""> </div>
											<div class="lr-user-wr-con   ">
												<h6> '. $customer->firstname.' '.$customer->lastname.'</h6> <span class="lr-revi-date"> </span>
												<p>'. $child->Review.'</p>
												<ul>
							                  <li><a data-toggle="collapse" href="#replycone'.$country->id.'"><span>Répondre</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
												    <li><a> <span>'. timeAgo($child->Date_add ) .'</span> </a> </li>  
												 </ul> 
											</div>
										   </li> ';
								         }
                              $html .= '</ul>';
					  } else {$html .= '<ul  class=" media-replied collapse"  id="replyco'.$country->id.'"></ul>';} 
                 }
       return $html ;
	   
    } 
	public function getOneReview(){ 
	     
	   $review_id = $this->input->post('review') ;
	   $html = '';
	    $c = $b = '';
	   $review = $this->model_rating->getReviewData($review_id) ;
	   $customer = $this->model_customer->fetch_customer_by_id($review['Email']);
       $reviews_child = $this->model_rating->get_child($review['id']);
       $count_child = $this->model_rating->count_child($review['id']);
	   $total_likes = $this->model_rating->Countlike($review['id']);
	   $total_unlikes = $this->model_rating->cntUnlikes($review['id']);
	   $Checking = $this->model_rating->Checking_user($review['id'] ,$customer->id );
	   if($Checking['type'] == 1) { $c ='style = "color:#38ccff;"'; }
	   if($Checking['type'] == 2) { $b ='style = "color:#38ccff;"'; }
	   
	   if($this->session->userdata('v_user_id') != 0) { 
                                       $customerid = customer($this->session->userdata('v_user_id'), 'id') ; $li1 = '<li><a  '.$c.'  class="like menu" value="Like" rat="'. $customerid.'" id="like_'.$review['id'].'" ><span id="spanl'. $review['id'].'" '.$c.'  >'.$total_likes.' </span><i class="fa fa-thumbs-o-up"  '.$c.'  aria-hidden="true"></i></a> </li>'; 
					                   $li2='<li><a  '.$b.' class="unlike menu" value="Unlike" rat="'. $customerid.'" id="unlike_'.$review['id'].'" ><span id="spanu'.$review['id'].'" '.$b.' >'.$total_unlikes.' </span><i class="fa fa-thumbs-o-down"   aria-hidden="true"></i></a> </li> ' ;	 }else { $li1 = $li2= '' ; }
	 
	             $html .='<li  class="formComment">
											<div class="lr-user-wr-img"> <img class="media-object img-circle" src="'.$customer->picture.'" alt=""> </div>
											<div class="lr-user-wr-con">
												<h6>'. $customer->firstname.' '.$customer->lastname.'<span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">  </span>
												<p>  '.$review['Review'].'</p>
												<ul>
												'.$li1.' '.$li2.'
												<li><a data-toggle="collapse" href="#replycone'.$review['id'].'"><span> Répondre </span> <i class="fa fa-reply" aria-hidden="true"></i></a> </li>';
				  if ($reviews_child) {  $html .=  '<li><a  data-toggle="collapse" href="#replyco'.$review['id'].'"><span>'.$count_child['total'].' réponses</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li> ' ; }
										 $html .=  '<li><a href="#!"> '. timeAgo($review['Date_add'] ) .' </a> </li>';
											$html .=  ' </ul>
											   </div></li> ' ;
											   
  if($this->session->userdata('v_user_id') != 0) { $html .= ' <li class=" media-replied collapse"  id="replycone'.$review['id'].'"> 
											<div class="lr-user-wr-img"> <img class="media-object img-circle"  src="'.customer($this->session->userdata('v_user_id'), 'picture').'" alt=""> </div>
											<div class="lr-user-wr-con ">
              <form id="formReply'.$review['id'].'" method="post"  >
												<h6> Gabriel Elijah  </h6> 
												   <input name="review_id" type="hidden" value="'.$review['id'].'" class="form-control" >
									               <input name="Email" type="hidden" value="'.$this->session->userdata('v_user_id').'" class="form-control" >
									               <textarea class="form-control" name="Review"  rows="1" placeholder="Répondez..."></textarea>
                                                 <ul>
		      <li><button onclick="Reply('.$review['id'].')" type="submit"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></button> </li>
												 </ul>
											 </form>
											</div>
										</li>';
		                            }else { 
									
									$html.= '<li class=" media-replied collapse"  id="replycone'.$review['id'].'"> 
											<div class="lr-user-wr-img"> <img class="media-object img-circle"  src="'.customer($this->session->userdata('v_user_id'), 'picture').'" alt=""> </div>
											<div class="lr-user-wr-con   ">
												<div class="col-sm-12">
												<h4> Connectez-vous pour poster  réponse<h4>
                                                <p>Vous n\'avez pas de compte ? <a href="'.base_url('register/pric').'">Inscrivez-vous </a></p>
                                                </div>
											</div>
										</li>';
									  }
					  if ($reviews_child) {
						     $html.= '<ul  class=" media-replied collapse"  id="replyco'.$review['id'].'">';
							  foreach($reviews_child as $child ){
 							   $html .=  ' <li> 
											<div class="lr-user-wr-img"> <img class="media-object img-circle"  src="'.$customer->picture.'" alt=""> </div>
											<div class="lr-user-wr-con   ">
												<h6> '. $customer->firstname.' '.$customer->lastname.'</h6> <span class="lr-revi-date">'.timeAgo($child->Date_add).'</span>
												<p>'. $child->Review.'</p>
												<ul>
												 <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
												 </ul> 
											</div>
										   </li> ';
								         }
                           $html .= '</ul>';
					     }  
	      echo $html ;
	   } 
	   
	   public function getOneChild () {
		    $html = '';
			
			 $review_id = $this->input->post('review') ;
	         
	   
		 
 		   $reviews_child = $this->model_rating->getReviewData($review_id);
           $customer = $this->model_customer->fetch_customer_by_id($reviews_child['Email'] );
		   
            $html.='  
			     <li> 
				 <div class="lr-user-wr-img"> <img class="media-object img-circle"  src="'.$customer->picture.'" alt=""> </div>
				    <div class="lr-user-wr-con   ">
						 <h6> '. $customer->firstname.' '.$customer->lastname.'</h6> <span class="lr-revi-date"> </span>
							 <p>'. $reviews_child['Review'].'</p>
						 <ul>
						<li><a data-toggle="collapse" href="#replycone'.$reviews_child['pere'].'"><span>Répondre</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
												    <li><a> <span>'. timeAgo($reviews_child['Date_add'] ) .'</span> </a> </li> 
						</ul> 
						 </div>
				 </li> '; 
				 
		  echo $html ;	 
				 
	      }
		  
  public function likeunlike ($i) {
		
  if ($i == 1) {  
       $model =  'model_rating' ;
	    $Rid = 'review_id' ;
		$TyL = 'type' ; 
     }elseif ($i == 2)  { 
	     $model =  'model_listings' ;
         $Rid = 'listing_id' ;	
         $TyL = 'type' ; 
		 } else {

         $model =  'model_listings' ;
         $Rid = 'listing_id' ;	
         $TyL = 'Favoris' ;   }	
			  
			 $review_id =  $this->input->post('postid') ;
			 $user =    $this->input->post('userid') ;
			 $type =   $this->input->post('type') ;
			 
			 $Checking = $this->$model->Checking_user($review_id , $user , $TyL);
			 $Date_add  = strtotime(date('Y-m-d h:i:s'));
			  if($Checking['cntStatus'] == 0){ 
			  
			    $typeda = array ( 
                  'timestamp' => $Date_add,				
                  'user_id' => $user,				
                  $Rid => $review_id	,			
                  $TyL => $type,				
				);
			  
			    $insert = $this->$model->insert_like($typeda);
			 
   
			  } else { 
			   $updat = $this->$model->update_like($Checking['id'] , $type , $TyL);
			    
                   } 
				   
		       $total_likes = $this->$model->Countlike($review_id);
	           $total_unlikes = $this->$model->cntUnlikes($review_id);  
			  
			  $return_arr = array("likes"=>$total_likes,"type"=>$type ,'unlikes' => $total_unlikes );

             echo json_encode($return_arr); 
			  
		     }
			 
   function send(){
	    $response = array();
	    $user = $this->input->post('Email') ;
        $msg  =  $this->messages_model;        
        $id =   $msg->send_message($user);
		
        if($id){
			    $response['success'] = true;
                $response['messages'] = 'success';
		  } else { 
			   $response['success'] = false;
               $response['messages'] = "error"; 
		  }
  
	       echo json_encode($response); 
	
	  }
 public function addNoti ($user , $listing) 
	{ 
	  $customer = $this->model_customer->fetch_customer_by_id($user);
	  $listings = $this->model_listings->getListingData($listing); 
	  
	  if($listings['customer_id'] != $user) {
		  
		   $this->notifications_model->create_notification($listings['customer_id'], $user , ' like ' , $listings['id']);
	  } 
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
        $this->model_listings->update_counter(urldecode($slug));
    }
}
	
	
   } 