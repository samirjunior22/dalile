<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing_map extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
		$this->load->library('pagination');
		$this->load->library('googlemaps');
        $this->load->model('model_listings');
		$this->load->model('model_category');
		$this->load->model('model_rating');
		$this->load->model('model_commune');
    }

  public function index() { 
     $names = array(22,  31);	
	 $marker = array();
     $marker['lat'] = 36.731417;
     $marker['lng'] = 3.107969 ;
	 $marker['center'] = 6;	
	 $this->data['results'] = '' ;
	
  
	 
 if(isset($_GET['wilaya'] , $_GET['cat'] ) && $_GET['wilaya']  != '' && $_GET['cat'] != '') {
	 $w=$_GET['wilaya'] ;
	 $this->data['categ'] = $categ = $_GET['cat'] ;
	 $this->data['wilsel'] = $wilayaCord = $this->model_commune->getWilayaData($w);
	 
	 if($wilayaCord){ $marker['lat'] = $wilayaCord["lat"];
                      $marker['lng'] = $wilayaCord["lng"];
	                  $marker['center'] = 13 ; }
	 $config["base_url"] = base_url('Listing_map/index?wilaya=' . $_GET['wilaya'].'&cat='.$_GET['cat']);
	 $config['total_rows'] =  $this->model_listings->getAllActiveListing($categ);
   } elseif (isset($_GET['cat']) && $_GET['cat'] != ''){
         $w = null;
		 $this->data['categ'] = $categ = $_GET['cat'] ;
		 $config['total_rows'] =  $this->model_listings->getAllActiveListing($categ); 
		 $config["base_url"] = base_url('Listing_map/index?cat=' . $_GET['cat']); 
   } elseif(isset($_GET['wilaya']) && $_GET['wilaya']  != '')  {
	     $w=$_GET['wilaya'] ;
		 $categ =null ;
		 $this->data['wilsel'] = $wilayaCord = $this->model_commune->getWilayaData($w);
		  $config["base_url"] = base_url('Listing_map/index?wilaya=' . $_GET['wilaya']); 
	     if($wilayaCord){ $marker['lat'] = $wilayaCord["lat"];
                      $marker['lng'] = $wilayaCord["lng"];
	                  $marker['center'] = 13 ; }
    $config['total_rows'] =  $this->model_listings->getAllActiveListingByWilaya($w);
   }else  {
	   
	    $w = null; 
	    $categ =null ;
	    $config['total_rows'] =  $this->model_listings->getAllActiveListings();
	   $config["base_url"] = base_url('Listing_map/index?wilaya=&cat='); 
   }
	

     $totalRecords = $config['total_rows'];
     $limit = 10;	
 

   $this->data['total_count'] = $config['total_rows'];
 
        $config["per_page"] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['num_links'] = 2;
        $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $links = explode('&nbsp;', $str_links);
	    $offset = 0;
   if ($config['total_rows']  > 0) {
	     
		 
   
        if (!empty($_GET['per_page'])) {
            $pageNo = $_GET['per_page'];
            $offset = ($pageNo - 1) * $limit;
        }
	    
        $listings =  $this->model_listings->getActiveListing($categ, $w, $limit, $offset); 
		
	if($listings){
		foreach ($listings as  $value) { 
		        
				
	             $info = $this->model_listings->getContactInfoData($value['id']); 
	             $Images = $this->model_listings->getImagesData($value['id']); 
	             $wilaya = $this->model_commune->getWilayaData($info['wilaya']); 
	             $Category = $this->model_category->getCategoryData($value['Category']); 
		         $rating = $this->model_rating->get_rating($value['id']);
				 $nested_data['Title'] = $value['Title'];
				 $nested_data['id'] = $value['id'];
				 $nested_data['Tag_Line'] = $value['Tag_Line'];
				 $nested_data['Description'] = $value['Description'];
				 $nested_data['photo'] =$value['photo'];
				 $nested_data['Category'] =$Category['name'];
				 $nested_data['Category_id'] =$Category['id'];
				 $nested_data['icon'] =$Category['icon'];
				 $nested_data['totals'] =$rating['totals'];
				 $nested_data['rating'] =$rating['rating'];
				 $nested_data['wilaya'] =$wilaya['name']; 
			 	
		      $item_array []= $nested_data;
		   }
		  $this->data['results'] = $item_array;
		  
	    }   
	 }
	 
	   $this->data['wilaya']= $this->model_commune->getWilayaData();
       $this->data['marker'] =  $marker ;
       $this->data['links'] = $links ;
	   $this->data['cord'] = $this->getinfo($categ , $w , $limit, $offset); 
	   $cat = $this->model_category->getCategoryData();
	   $this->data['map'] = $this->googlemaps->create_map();
	   $this->data['cats'] = $this->model_category->getCategoryData();
	   $this->data['page_title'] = 'Home';
       $this->render('public/listing_map');
	    
    }
	
	public function category()
    {    
	     $this->data['cats'] = $this->model_category->getCategoryData();
		 $this->data['listings'] = $this->model_listings->getActiveListing(); 
	     $this->data['google_login_url']=$this->google->get_login_url();
		
	     $titre = 'title_'.$this->current_lang ;
		 $cotent = 'cotent_'.$this->current_lang;
	     $this->data['page_title'] = 'Home';
	 
         $this->render('public/listing_map');
    }
	
	 public function getinfo ($cat , $wilaya , $limit, $offset){
	  $result = array('mark' => array()); 
	
	  $ListingByCat =  $this->model_listings->getListingByCat($cat, $wilaya ,$limit, $offset); 
	 
	  foreach($ListingByCat as $key => $value) {
		  
            $coords = $this->model_listings->getContactInfoData($value['id']); 
		    $iconcat = $this->model_category->getCategoryData($value['Category']); 
		     $result['mark'][$key] = array(
			 
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                     <a href="'.base_url("listing_detail/index/".$value['id']).'" class="map-post-thumb-m"> 
							 <img style="height:230px;" src="'.base_url('assets/images/listings/'.$value['photo']).'" alt="">
							 </a><div class="objects">
                             <div class="map-post-des-m">
					         <h5><a href="'.base_url("listing_detail/index/".$value['id']).'">'.$value['Title'].'</a></h5><span><i class="fa fa-map-marker"></i> '.$coords['Address'].'</span></div>
                             </div></div>', 
	 		  'lat' => $coords['lat'],
			  'lng' =>$coords['lng'] ,
			  'icon' => $iconcat['icon']  );
			 
	        } 
	return  json_encode($result);
	 
   }
	   
}