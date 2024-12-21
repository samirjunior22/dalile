<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->model('model_commune');
	    $this->load->model('model_category');
	    $this->load->model('model_listings');
	    $this->load->model('model_rating'); 
	    $this->load->model('Model_ser_category'); 
  }

    public function index($page)
    {    
	    
		 $type = $page ;
         $this->render('public/'.$type.'');
    }  
	
	
    public function city()
    {    
	   
		   $this->data['wilayas'] = $this->model_commune->getWilayaData();  
		  
           $this->render('public/city');
    }  
	
	 public function services()
    {    
	       
		   $this->data['wilaya'] = $this->model_commune->getWilayaData($_GET['wilaya']);  
		   $this->data['cats'] = $this->model_category->getCategoryData(); 
		   $this->data['Services'] = $this->Model_ser_category->getCategoryData(); 
		   $this->render('public/services');
    }	
	public function detail()
	  {   
	      $perPage = 4 ;
  	      $style = 'content';
             $marker['lat'] =  35.0690290;
             $marker['lng'] =  2.7628065;
             $marker['id'] = '';
	         $marker['center'] = 9 ; 
 
         $this->data['GsouCat'] = $id =$this->input->get('souCat');
	     $this->data['Gtitle'] = $title =$this->input->get('title');
	     $this->data['Gwilaya'] = $getWilaya =$this->input->get('wilaya');
	     $this->data['Gcat'] = $catid =$this->input->get('catid');
		 $this->data['Gtable'] = '';
		 
	    if(isset($_GET['style'])){ 
		$style =$this->input->get('style'); }
		
	    if(isset($_GET['search'])){ 
		      $table = $this->input->get('table');
		      $this->data['Gtable'] = $table ;
		   }
	
		   
	         $wilayaCord = $this->model_commune->getWilayaData($getWilaya);
	 
	        if($getWilaya != ''){ 
		              $marker['lat'] = $wilayaCord["lat"];
                      $marker['lng'] = $wilayaCord["lng"];
                      $marker['id'] = $wilayaCord["id"];
	                  $marker['center'] = 14 ; }
			   else{
				      $marker['lat'] =  35.0690290;
                      $marker['lng'] =  2.7628065;
                      $marker['id'] = '';
	                  $marker['center'] = 9 ;
			    }
		   
		 if($catid != ''){
		     $this->data['cord'] = $this->getinfo($catid , $getWilaya , 'cat'); 
		 }elseif($id != ''){
			   $this->data['cord'] = $this->getinfo($id , $getWilaya , 'soucat'); 
		  }else{
			  $this->data['cord'] = $this->getinfo($title , $getWilaya , 'searsh'); 
		   }
		     $this->data['marker'] = $marker ;
	         $this->data['cats'] = $this->model_category->getCategoryData(); 
		     $this->data['wilaya']= $this->model_commune->getWilayaData();
		     $this->data['style']= $style;
		   
		   $this->render('public/service-'.$style);
    }
	
	
	 
  public function getinfo ($cat , $wilaya, $Gtab){
	  $result = array('mark' => array()); 
	 
	 if( $Gtab == 'searsh'){
		 $listing  = $this->model_listings->getListingByTilte($cat);
	  }elseif($Gtab == 'cat') {
		  $listing  = $this->model_listings->getListingByCat($cat, $wilaya);
	    }else{	 
	     $listing  = $this->model_listings->getListingBySouCat($cat, $wilaya);
	  }
	  
	  
	 
	  foreach($listing as $key => $value) {
		  
             $coords = $this->model_listings->getContactInfoData($value['id']); 
		     $iconcat = $this->model_category->getCategoryData($value['Category']); 
		     $result['mark'][$key] = array(
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                     <a href="'.base_url("listing_detail/index/".$value['id']).'" class="map-post-thumb-m"> 
							 <img  width="150px" src="'.base_url('assets/images/listings/'.$value['photo']).'" alt="">
							 </a>
							 <div class="objects">
                             <div class="map-post-des-m">
					         <h5><a href="'.base_url("listing_detail/index/".$value['id']).'">'.$value['Title'].'</a></h5><span><i class="fa fa-map-marker"></i> '.$coords['Address'].'</span></div>
                             </div></div>', 
	 		  'lat' => $coords['lat'],
			  'lng' =>$coords['lng'] ,
			  'icon' => $iconcat['icon']  );
			 
	        } 
	return  json_encode($result);
	 
   }
	 function load_more_data()
	{    
	        $GsouCat = $this->input->post('GsouCat'); 
	        $start = $this->input->post('limit'); 
            $end = $this->input->post('start');
            $getWilaya = $this->input->post('wilaya');
            $Gcat = $this->input->post('Gcat');
            $Gtable = $this->input->post('Gtable');
            $Gtitle = preg_replace( '~\s+~', ' ', $this->input->post('Gtitle'));
		
      $output = '';
	 if( $Gtable == 'listing'){
		 $listing  = $this->model_listings->getListingByTilte($Gtitle, $start , $end);
	  }elseif($Gtable == 'Cat' or $Gcat != '') {
		  $listing  = $this->model_listings->getListingByCat($Gcat, $getWilaya, $start , $end );
	    }else{	 
	  $listing  = $this->model_listings->getListingBySouCat($GsouCat, $getWilaya, $start , $end );
	  }
	       foreach($listing as $value){ 
		  
		         $info = $this->model_listings->getContactInfoData($value['id']); 
	             $Images = $this->model_listings->getImagesData($value['id']); 
	             $wilaya = $this->model_commune->getWilayaData($info['wilaya']); 
	             $Category = $this->model_category->getCategoryData($value['Category']); 
	             $sou_category = $this->model_category->getSouCategoryData($value['sou_category']); 
		         $rating = $this->model_rating->get_rating($value['id']);
			   
				$output .= '
				
		  
		  <div id="coln'.$value['id'].'" class=" grid_col show_listing brick">
             <div class="items-list listing_wrap" data-post-id="1">
                  <div class="listing_info">
				  
				        <div class="row">
						    <div class="col-xs-6">
							   <img src="'.site_url("assets/images/listings/". $value['photo']).'" alt="" class="img-rounded img-responsive" />
							  </div>
							 <div class="col-xs-6">
                               <div class="post_category">
                                 <a href="#" style="letter-spacing: 0px;">'.$Category['name'].'</a>
                               </div>
                                <h4><a href="'.base_url('Listing_detail/index/'.$value['id']).'" >'.$value['Title'].'</a></h4>
                               <p><i class="fa fa-phone"></i> <a href="tel:'.$info['Phone'].'">'.$info['Phone'].'</a></p>
							 </div>
						 </div>
						 
						<div class="listing_review_info">
                            <p><span class="review_score">'.number_format($rating['rating'], 2).'/5</span> ';
                               for($i = 1; $i <= 5; $i++){
									  if($i <= $rating['rating']){  
							       $output .= ' <i class="fa fa-star active"></i>';
									  } else {  
						             $output .='<i class="fa fa-star"></i> ';
						               } }  
                                   $output .= '( '.$rating['totals'].'views) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> '.$wilaya['name'].'</p>
                        </div>
				 
                    </div>
                </div>
            </div>';
		   
			}
	 	echo  $output ;
 
	}
	
	
}