<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->library('googlemaps');
	    $this->load->model('model_category');
	    $this->load->model('model_listings');
	    $this->load->model('model_commune');
	    $this->load->model('model_customer');
	    $this->load->model('auth_model');
	    $this->load->model('model_rating');
    }
	
	public function home() {
		
	 
		$this->load->view('public/home_view');
	}

    public function index($t = null)
    {    $listingS =array();
         $marker = array();
		 $marker['lat'] = 32.7314;
         $marker['lng'] = 2.6079 ;	
         $marker['center'] = 6;	
 if(isset($_GET['cat'])) {  $categ=$_GET['cat'] ;$this->data['categ']= $this->model_category->getCategoryData($categ); } else {  $categ = null;  }
 if(isset($_GET['wilaya'])&& $_GET['wilaya'] != '') {
	 $wilaya=$_GET['wilaya'] ;
	 $this->data['wilsel']= $wilayaCord = $this->model_commune->getWilayaData($wilaya);
	 
	 if($wilayaCord){ $marker['lat'] = $wilayaCord["lat"];
                      $marker['lng'] = $wilayaCord["lng"];
	                  $marker['center'] = 14 ; }
	  } else { $wilaya = null;  }
	  
	    $exclusives= $this->model_listings->exclusives();
	    foreach ($exclusives as  $value) { 
		        $infoc = $this->model_listings->getContactInfoData($value['id']); 
	            $Images = $this->model_listings->getImagesData($value['id']); 
	            $wila = $this->model_commune->getWilayaData($infoc['wilaya']); 
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
				 $nested_data['wilaya'] =$wila['name']; 
			     $listingS []= $nested_data;
		   }
		  $this->data['exclusives'] = $listingS; 
		  $this->data['cord'] = $this->getinfo($categ , $wilaya); 
		
	   
		 $this->data['page_title'] = 'Home'; 
	     $this->data['cats'] = $this->model_category->getCategoryData(); 
		 $this->data['wilaya']= $this->model_commune->getWilayaData();
		 $this->data['marker'] =  $marker ;
		 
      	  if ($t != null) {$type = '_'.$t;}else {$type = '';}
		  
  $this->render('public/homepage_view'.$type.'');
    }
 
	public function logout(){
		
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data=array(
				'sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect(base_url());
	}
	 
	 
 public function getinfo ($cat , $wilaya){
	  $result = array( ); 
	
	  $ListingByCat =  $this->model_listings->getListingByCat($cat, $wilaya); 
	 
	  foreach($ListingByCat as $key => $value) {
		  
            $coords = $this->model_listings->getContactInfoData($value['id']); 
            $iconcat = $this->model_category->getCategoryData($value['Category']); 
		   
		     $result[$key] = array(
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                     <a href="'.base_url("listing_detail/index/".$value['id']).'" class="map-post-thumb-m"> 
							 <img style="height:230px;" src="'.base_url('assets/images/listings/'.$value['photo']).'" alt="">
							 </a><div class="objects">
                             <div class="map-post-des-m">
					         <h5><a href="'.base_url("listing_detail/index/".$value['id']).'">'.$value['Title'].'</a></h5><span><i class="fa fa-map-marker"></i> '.$coords['Address'].'</span></div>
                             </div></div>', 
	 		  'lat' => $coords['lat'],
			  'lng' => $coords['lng'] ,
			  'lab' => '<div class="marker-container"><div class="marker-card"><div class="front face"><i class="im-icon"><img src="'.base_url().'assets/images/category-icon5.png"></i> </div><i class="im-icon"><img src="'.base_url().'assets/images/category-icon5.png"> </div></div></div>', 
		     	  
			  'icon' => $iconcat['icon'] );
	        } 
	return  json_encode($result);
	 
   }
   
     
  public function oauth2callback(){
		$google_data=$this->google->validate();
		$session_data=array(
				'name'=>$google_data['name'],
				'email'=>$google_data['email'],
				'source'=>'google',
				'profile_pic'=>$google_data['profile_pic'],
				'link'=>$google_data['link'],
				'sess_logged_in'=>1
				);
	  $is_exist = $this->model_customer->is_exist_email($google_data['email']) ;	

	  if ($is_exist = true) {
		   $result = $this->auth_model->login($google_data['email']);
		   $user_data = array(
					'v_user_id' => $result->id, 
					'v_email'		=> $result->email,
				    'sess_logged_in'=> 1 
				);
 
				$this->session->set_userdata($user_data);
		        redirect(base_url('customer/setting/dashboard'));
	  }
 
           
	}
	
	
	public function position() {
     
	  if(!empty($_GET['latitude']) && !empty($_GET['longitude'])){
		
	 $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_GET['latitude']).','.trim($_GET['longitude']).'&sensor=false';
     $json = @file_get_contents($url);
     $data = json_decode($json);
     $status = $data->status;
	 
        if($status == "OK"){
        //get address from json data
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  '';
    }
	
	  
	  }
	 echo $location;
	}
	
	
	function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->model_category->search_cat($_GET['term']);
		  	$resulta = $this->model_category->search_sou($_GET['term']);
		  	$resultListings = $this->model_listings->searshListing($_GET['term']);
		    if (count($result) > 0) {
		    foreach ($result as $row){
		     	$arr_result[] = array(
					'label'			=> $row->name,
					'id'	=> $row->id,
					'table'	=> 'souCat',
			   ); }
		     }
			if (count($resulta) > 0) {
		    foreach ($resulta as $row){
		     	$arr_result[] = array(
					'label'			=> $row->name,
					'id'	=> $row->id,
					'table'	=> 'cat',
			); }
		     	
		   	}
			if (count($resultListings) > 0) {
		    foreach ($resultListings as $row){
		     	$arr_result[] = array(
					'label'			=> $row->Title,
					'id'	=> $row->id,
					'table'	=> 'listing',
			); }
		     	
		   	}
			
			echo json_encode($arr_result);
		}
	}
}