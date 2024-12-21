<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Etablissement extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->library('googlemaps');
	    $this->load->model('model_category');
	    $this->load->model('model_listings');
	    $this->load->model('model_Etablissement');
	    $this->load->model('model_commune');
    }
	
    public function index()
    {  
         $marker = array();
		 $marker['lat'] = 32.7314;
         $marker['lng'] = 2.6079 ;	
         $marker['center'] = 6;	
 if(isset($_GET['sou_category'])) {  $categ=$_GET['sou_category'] ;$this->data['sou_category']= $this->model_Etablissement->getSouCategoryData($categ); } else {  $categ = null;  }
  if(isset($_GET['cat'])) {  $cat=$_GET['cat'] ;$this->data['cat']= $this->model_Etablissement->getCategoryData($cat); } else {  $cat = null;  }
 if(isset($_GET['wilaya'])&& $_GET['wilaya'] != '') {
	 $wilaya=$_GET['wilaya'] ;
	 $this->data['wilsel']= $wilayaCord = $this->model_commune->getWilayaData($wilaya);
	 
	 if($wilayaCord){ $marker['lat'] = $wilayaCord["lat"];
                      $marker['lng'] = $wilayaCord["lng"];
	                  $marker['center'] = 14 ; }
	  } else { $wilaya = null;  }
	    
		 
		 $this->data['cord'] = $this->getinfo($categ , $wilaya); 
	   
		 $this->data['page_title'] = 'Home'; 
	     $this->data['cats'] = $this->model_Etablissement->getActiveCategroy(); 
		 $this->data['wilaya']= $this->model_commune->getWilayaData();
		 $this->data['marker'] =  $marker ;
		  
  $this->render('public/etablissement');
    }
   
 public function getinfo ($cat , $wilaya){
	  $result = array( ); 
	
	  $ListingByCat =  $this->model_Etablissement->getEtablissementByCat($cat, $wilaya); 
	 
	  foreach($ListingByCat as $key => $value) {
		     $cats = $this->model_Etablissement->getSouCategoryData($value['Eta_sou_categories']); 
		   
		     $result[$key] = array(
			 'infowindow_content' => '<div class="bubble" id="infobox'.$value['id'].'">
		                     <a href="'.base_url("etablissement/etaDetail/".$value['id']).'" class="map-post-thumb-m"> 
							 <img style="height:230px;" src="'.base_url('assets/images/etablissements/'.$value['photo']).'" alt="">
							 </a><div class="objects">
                             <div class="map-post-des-m">
					         <h5><a href="'.base_url("etablissement/etaDetail/".$value['id']).'">'.$value['name'].'</a></h5><span><i class="fa fa-map-marker"></i> '.$value['addresse'].'</span></div>
                             </div></div>', 
	 		  'lat' => $value['lat'],
			  'lng' => $value['lng'] ,
			  'lab' => '<div class="marker-container"><div class="marker-card"><div class="front face"><i class="im-icon"><img src="'.base_url().'assets/images/category-icon5.png"></i> </div><i class="im-icon"><img src="'.base_url().'assets/images/category-icon5.png"> </div></div></div>', 
		     	  
			  'icon' =>  $cats['icon'] );
	        } 
	return  json_encode($result);
	 
   }
   
 	public function getSouCatByCat($id) {
		
		
		 $data  = $this->model_Etablissement->getSouCategoryDataById($id);
		 echo json_encode($data); 
	}
	
	
	public function etaDetail ($id) {
		
		 
          $this->data['etablissement']  = $etablissement = $this->model_Etablissement->getEtablissementData($id);		  
           $this->data['SouCategory']  = $this->model_Etablissement->getSouCategoryData($etablissement['Eta_sou_categories']);		  
          $this->render('public/eta-detail');
	}
}