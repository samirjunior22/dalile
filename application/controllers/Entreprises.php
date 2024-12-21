<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entreprises extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
	    $this->load->library('google');
	    $this->load->library('googlemaps');
	    $this->load->model('model_category');
	    $this->load->model('model_listings');
	    $this->load->model('Model_Etablissement');
	    $this->load->model('Model_Entreprises');
	    $this->load->model('model_commune');
    }
	
    public function index()
    {  
         $marker = array();
		 $marker['lat'] = 32.7314;
         $marker['lng'] = 2.6079 ;	
         $marker['center'] = 6;	
 if(isset($_GET['cat'])) {  $cat=$_GET['cat'] ;$this->data['cat']= $this->Model_Etablissement->getSouCategoryData($cat); } else {  $cat = null;  }
  if(isset($_GET['wilaya'])&& $_GET['wilaya'] != '') {
	 $wilaya=$_GET['wilaya'] ;
	 $this->data['wilsel']= $wilayaCord = $this->model_commune->getWilayaData($wilaya);
	 
	 if($wilayaCord){ $marker['lat'] = $wilayaCord["lat"];
                      $marker['lng'] = $wilayaCord["lng"];
	                  $marker['center'] = 14 ; }
	  } else { $wilaya = null;  }
	    
		 
		 $this->data['results'] =  $this->Model_Entreprises->getEntrepriseByCat($cat, $wilaya); 
	   
		 $this->data['page_title'] = 'Home'; 
	     $this->data['cats'] = $this->Model_Etablissement->getActiveCategroy(); 
		 $this->data['wilaya']= $this->model_commune->getWilayaData();
		 $this->data['marker'] =  $marker ;
		  
  $this->render('public/listingSideBare');
    }
    
   
 	public function getSouCatByCat($id) {
		 
		 $data  = $this->Model_Etablissement->getSouCategoryDataById($id);
		 echo json_encode($data); 
	}
	
	
	public function etaDetail ($id) {
		 
          $this->data['etablissement']  = $etablissement = $this->Model_Etablissement->getEtablissementData($id);		  
           $this->data['SouCategory']  = $this->Model_Etablissement->getSouCategoryData($etablissement['Eta_sou_categories']);		  
          $this->render('public/eta-detail');
	}
}