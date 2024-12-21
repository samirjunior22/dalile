<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wilaya extends Admin_Controller 
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

		  $this->load->model('model_category');
		  $this->load->model('model_commune');
		 $this->load->library('form_validation');
	}

	/* 
	* It only redirects to the manage category page
	*/
	public function index()
	{
		 $user = $this->ion_auth->user()->row();
         $this->data['user'] = $user;
 
		$this->render('admin/wilaya/index');	
	}	

 
 
  public function ceateWilaya(){ 
		
 $wilayas = array(
  array('id' => '1','matricule' => '1','name' => 'Adrar','lat' => '27.978024','lng' => '-0.186105','photo' => '1.jpg'),
  array('id' => '2','matricule' => '2','name' => 'Chlef','lat' => '36.171583','lng' => '1.345318','photo' => '2.jpg'),
  array('id' => '3','matricule' => '3','name' => 'Laghouat','lat' => '33.790768','lng' => '2.867074','photo' => '3.jpg'),
  array('id' => '4','matricule' => '4','name' => 'Oum El Bouaghi','lat' => '35.875097','lng' => '7.111846','photo' => '4.jpg'),
  array('id' => '5','matricule' => '5','name' => 'Batna','lat' => '35.557466','lng' => '6.173215','photo' => '5.jpg'),
  array('id' => '6','matricule' => '6','name' => 'Béjaïa','lat' => '36.767917','lng' => '5.022571','photo' => '6.jpg'),
  array('id' => '7','matricule' => '7','name' => 'Biskra','lat' => '34.858227','lng' => '5.723303','photo' => '7.jpg'),
  array('id' => '8','matricule' => '8','name' => 'Béchar','lat' => '31.633363','lng' => '-2.018817','photo' => '8.jpg'),
  array('id' => '9','matricule' => '9','name' => 'Blida','lat' => '36.486500','lng' => '2.810899','photo' => '9.jpg'),
  array('id' => '10','matricule' => '10','name' => 'Bouira','lat' => '36.381896','lng' => '3.887728','photo' => '10.jpg'),
  array('id' => '11','matricule' => '11','name' => 'Tamanrasset','lat' => '22.784314','lng' => '5.529735','photo' => '11.jpg'),
  array('id' => '12','matricule' => '12','name' => 'Tébessa','lat' => '35.413072','lng' => '8.111428','photo' => '12.jpg'),
  array('id' => '13','matricule' => '13','name' => 'Tlemcen','lat' => '34.885915','lng' => '-1.322311','photo' => '13.jpg'),
  array('id' => '14','matricule' => '14','name' => 'Tiaret','lat' => '35.367109','lng' => '1.331210','photo' => '14.jpg'),
  array('id' => '15','matricule' => '15','name' => 'Tizi Ouzou','lat' => '36.710019','lng' => '4.040925','photo' => '15.jpg'),
  array('id' => '16','matricule' => '16','name' => 'Alger','lat' => '36.755451','lng' => '3.058261','photo' => '16.jpg'),
  array('id' => '17','matricule' => '17','name' => 'Djelfa','lat' => '34.673824','lng' => '3.256824','photo' => '17.jpg'),
  array('id' => '18','matricule' => '18','name' => 'Jijel','lat' => '36.801349','lng' => '5.745336','photo' => '18.jpg'),
  array('id' => '19','matricule' => '19','name' => 'Sétif','lat' => '36.192354','lng' => '5.418152','photo' => '19.jpg'),
  array('id' => '20','matricule' => '20','name' => 'Saïda','lat' => '34.846584','lng' => '0.150935','photo' => '20.jpg'),
  array('id' => '21','matricule' => '21','name' => 'Skikda','lat' => '36.867705','lng' => '6.912967','photo' => '21.jpg'),
  array('id' => '22','matricule' => '22','name' => 'Sidi Bel Abbès','lat' => '35.212205','lng' => '-0.633424','photo' => '22.jpg'),
  array('id' => '23','matricule' => '23','name' => 'Annaba','lat' => '36.913179','lng' => '7.761063','photo' => '23.jpg'),
  array('id' => '24','matricule' => '24','name' => 'Guelma','lat' => '36.455364','lng' => '7.427261','photo' => '24.jpg'),
  array('id' => '25','matricule' => '25','name' => 'Constantine','lat' => '36.352977','lng' => '6.608984','photo' => '25.jpg'),
  array('id' => '26','matricule' => '26','name' => 'Médéa','lat' => '36.265388','lng' => '2.757247','photo' => '26.jpg'),
  array('id' => '27','matricule' => '27','name' => 'Mostaganem','lat' => '35.936291','lng' => '0.090754','photo' => '27.jpg'),
  array('id' => '28','matricule' => '28','name' => 'M\'Sila','lat' => '35.703446','lng' => '4.547375','photo' => '28.jpg'),
  array('id' => '29','matricule' => '29','name' => 'Mascara','lat' => '35.395166','lng' => '0.143333','photo' => '29.jpg'),
  array('id' => '30','matricule' => '30','name' => 'Ouargla','lat' => '31.950719','lng' => '5.331363','photo' => '30.jpg'),
  array('id' => '31','matricule' => '31','name' => 'Oran','lat' => '35.694842','lng' => '-0.639411','photo' => '31.jpg'),
  array('id' => '32','matricule' => '32','name' => 'El Bayadh','lat' => '33.673981','lng' => '1.021711','photo' => '32.jpg'),
  array('id' => '33','matricule' => '33','name' => 'Illizi','lat' => '26.505655','lng' => '8.478238','photo' => '33.jpg'),
  array('id' => '34','matricule' => '34','name' => 'Bordj Bou Arreridj','lat' => '36.070699','lng' => '4.758217','photo' => '34.jpg'),
  array('id' => '35','matricule' => '35','name' => 'Boumerdès','lat' => '36.758986','lng' => '3.473364','photo' => '35.jpg'),
  array('id' => '36','matricule' => '36','name' => 'El Tarf','lat' => '36.766368','lng' => '8.316565','photo' => '36.jpg'),
  array('id' => '37','matricule' => '37','name' => 'Tindouf','lat' => '27.673138','lng' => '-8.126715','photo' => '37.jpg'),
  array('id' => '38','matricule' => '38','name' => 'Tissemsilt','lat' => '35.604666','lng' => '1.811743','photo' => '38.jpg'),
  array('id' => '39','matricule' => '39','name' => 'El Oued','lat' => '33.371702','lng' => '6.856698','photo' => '39.jpg'),
  array('id' => '40','matricule' => '40','name' => 'Khenchela','lat' => '35.428366','lng' => '7.143763','photo' => '40.jpg'),
  array('id' => '41','matricule' => '41','name' => 'Souk Ahras','lat' => '36.270098','lng' => '7.950387','photo' => '41.jpg'),
  array('id' => '42','matricule' => '42','name' => 'Tipaza','lat' => '36.589240','lng' => '2.457972','photo' => '42.jpg'),
  array('id' => '43','matricule' => '43','name' => 'Mila','lat' => '36.452314','lng' => '6.261628','photo' => '43.jpg'),
  array('id' => '44','matricule' => '44','name' => 'Aïn Defla','lat' => '36.264190','lng' => '1.964915','photo' => '44.jpg'),
  array('id' => '45','matricule' => '45','name' => 'Naâma','lat' => '33.273727','lng' => '-0.312867','photo' => '45.jpg'),
  array('id' => '46','matricule' => '46','name' => 'Aïn Témouchent','lat' => '35.305648','lng' => '-1.141328','photo' => '46.jpg'),
  array('id' => '47','matricule' => '47','name' => 'Ghardaïa','lat' => '32.491114','lng' => '3.676385','photo' => '47.jpg'),
  array('id' => '48','matricule' => '48','name' => 'Relizane','lat' => '35.733208','lng' => '0.557150','photo' => '48.jpg')
  );
		 
	 $getInfo = $this->model_commune->getWilayaData();
	 
	 if ($getInfo) {
		 
	        	 $response['success'] = false;
        		 $response['messages'] = ' Wilayas Déja Existe ';
		  
	   }else {
		   
		$create = $this->model_commune->createWilayas($wilayas);
		 
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Il a été ajouté avec succès';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'false data problem';			
        	}
	   }
	   
	echo json_encode($response);
	
    }
 
 

	 
}