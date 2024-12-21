<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->is_login();
		$this->load->model('model_customer');
		$this->load->model('model_listings');
		$this->load->model('model_rating');
       $this->user_id = $this->session->userdata('v_user_id');
	  }
	
   public function index()
    
    {    
	    $customer = $this->model_customer->fetch_customer_by_id( $this->user_id); 
			   
	          $titre = 'title_'.$this->current_lang ;
		      $cotent = 'cotent_'.$this->current_lang;
	          $this->data['page_title'] = 'Home';
	          $this->data['customer'] = $customer;
		      
			  
			 $this->data['comments'] = $this->getReviews(0);
			 $this->data['tolals'] = $this->countReviews();
		     $this->render_customer('customer/reviews'); 
    } 
	 public function loadReview () {
		   
		  $row = $this->input->post('row') ;
		  echo  $this->getReviews ($row);
	 } 
	
	public function getReviews($row){ 
        
        $html = '' ;
	    $listings = $this->model_listings->getListingCustomer($this->user_id , 1); 
		
		foreach ($listings as  $value) { 
		
		       	$reviews = $this->model_rating->get_reviews($value['id'] , $row) ;
	             
		         foreach ($reviews as  $review) {

				  $customer = $this->model_customer->fetch_customer_by_id($review->Email); 
				 
				   $nested_data['Title'] =$value['Title'];
				   $nested_data['Review'] = $review->Review;
				   $nested_data['Title_re'] = $review->Title;
				   $nested_data['Date_add'] = $review->Date_add;
			 	
		           $item_array []= $nested_data;
				   
			 	 $html .='  <li class="listing-reviews">
                                <div class="review_img">
                                    <img src="'.$customer->picture.'" alt="image">
                                </div>
                                <div class="review_comments">
                                    <div class="comment-by">'.$customer->firstname.' '.$customer->lastname.' <span> on </span><a href="'.base_url('/listing_detail/index/'.$value['id']).'"> '.$value['Title'].'</a>
                                        <div class="listing_review_info"> 
                                            <p> '; 
											for($i = 1; $i <= 5; $i++){
									      if($i <= $review->p_rating){
										   $html .= '<i class="fa fa-star active"></i>' ;
										   } else { 
										$html .= ' <i class="fa fa-star"></i> '; } }
											
											$html .=' </p>
                                        </div>
                                     </div>
                                    <span class="date">'.timeago($review->Date_add).'</span> 
                                    <div class="star-rating">
                                    </div>
                                    <p>'.$review->Review.'</p>
                               <a class="button gray" target="_blank" href="'.base_url('/listing_detail/index/'.$value['id']).'"><i class="fa fa-reply"></i> Reply to this review</a>
                                </div>';
							 
							 
                        $html.= '</li>' ; 
				      }
	            return $html ;
		    } 
 
    }
	
	public function countReviews() {  
	$total = 0 ;
	$listings = $this->model_listings->getListingCustomer( $this->user_id , 1); 
	
	foreach ($listings as  $value) { 
	 
 	   $reviews = $this->model_rating->get_rating($value['id']) ;
	   $total += $reviews['totals'];
 
	 }
 
	 return $total ;  
	}
}