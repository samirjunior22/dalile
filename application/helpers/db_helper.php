<?php 
 
  function resume_xmots($MaChaine,$xmots) 
     {  
	 
   	 $text=str_word_count($MaChaine);
	 
	if($text >= $xmots) {
     $NouvelleChaine = '';
     $ChaineTab=explode(" ",$MaChaine); 
      for($i=0;$i<$xmots;$i++) 
         {   $NouvelleChaine.=" "."$ChaineTab[$i]"; 
               }   
         return $NouvelleChaine; 
	}else {
		return $MaChaine ;
	   }
		 
   }
	   
 function timeAgo($time_ago)
  {
    $time_ago =  $time_ago ;
	
   $cur_time   = strtotime(date('Y-m-j H:i:s'));
    $time_elapsed   = $cur_time -  $time_ago  ;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return " maintenant";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "il y a une minute";
        }
        else{
            return "$minutes min";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "il y a une heure";
        }else{
            return "$hours h";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "hier";
        }else{
            return "$days jours";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "il y a une semaine";
        }else{
            return "$weeks semaines";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "il y a un mois";
        }else{
            return "$months mois";
        }
    }
    //Years
    else{
        if($years==1){
            return "il y a un an";
        }else{
            return "$years années";
        }
    }
	
	 
}
 
 

  function export_database() {
	 $CI = get_instance();
	$CI->load->dbutil();
	
	$prefs = array(
		'format' => 'zip',
		'filename' => 'cciap.sql'
	);
	$backup = & $CI->dbutil->backup($prefs);
	$db_name = 'crm-on-' . date("Y-m-d-H-i-s") . '.zip';
	$save = 'assets/' . $db_name;
	$CI->load->helper('file');
	write_file($save, $backup);
	$CI->load->helper('download');
	force_download($db_name, $backup);
  }
  
   function page_photo ($slug) {
	   
	  $CI = get_instance();
	  
	  $CI->load->model('Pages_model');
	  
	  $photo = $CI->Pages_model->getPageDetail($slug);
	   
	  return $photo->photo  ;
	  
	  }
	  
	function packs ($customer, $s) { 
     
	  $CI = get_instance();
	  
	  $CI->load->model('Model_pack');
		
	  $packs = $CI->Model_pack->getPackDataById($customer);
		
		return $packs[$s] ;
		
	} 
	  
    function customer($id , $index){

       $CI = get_instance();
	   $CI->load->model('model_customer');
	 
	 $customer = $CI->model_customer->fetch_customer_by_id($id);
	 $index = $index ;
     return $customer->$index  ; 


	}  
	
	function Checking_like($id , $customer_id, $type){

       $CI = get_instance();
	   $CI->load->model('model_listings');
	   
	 $Checking =  $CI->model_listings->Checking_user($id , $customer_id , $type);
	 
	 
     return $Checking[$type]  ; 


	} 
	
	function countListingCat ($cat) {
		
		$CI = get_instance();
	    $CI->load->model('model_listings'); 
       return	 $CI->model_listings->getAllActiveListing($cat);
	  }
	  
	  function getLByWilaya ($wilaya) {
		
		$CI = get_instance();
	    $CI->load->model('model_listings'); 
       return	 $CI->model_listings->getAllActiveListingByWilaya($wilaya);
 
	  } 
     function getLBySouCat ($souCat ,  $wilaya) {
		
		$CI = get_instance();
	    $CI->load->model('model_listings'); 
        return	 $CI->model_listings->getAllActiveListingBySouCat($souCat , $wilaya);
	  } 
	     function getSBySouCat ($souCat ,  $wilaya) {
		
		$CI = get_instance();
	    $CI->load->model('model_services'); 
        return	 $CI->model_services->getAllActiveServiceBySouCat($souCat , $wilaya);
	  } 
	  
	  function countListingCustomer ($id , $stat) {
		
		$CI = get_instance();
	    $CI->load->model('model_listings'); 
       return	 $CI->model_listings->countListingCustomer($id , $stat);
	  }
	  
	  function countDevis($type, $id){
		  $CI = get_instance();
	    $CI->load->model('model_orders'); 
       return	 $CI->model_orders->countTotalDevis($type , $id);
		  
	  }
	
// Category Places 	
	function getCategoryData(){  
	   $CI = get_instance();
	      $CI->load->model('model_category'); 
	   return $CI->model_category->getCategoryData(); 
	}
	function getSouCategoryData($cat = null){  
	   $CI = get_instance();
	      $CI->load->model('model_category'); 
	   return $CI->model_category->getSouCategoryDataById($cat); 
	}
// End  Category Places 	


// Category Services 
   function getServicesCategoryData(){  
	   $CI = get_instance();
	      $CI->load->model('Model_ser_category'); 
	   return $CI->Model_ser_category->getCategoryData(); 
	}
	function getServicesSouCategoryData($cat = null){  
	   $CI = get_instance();
	      $CI->load->model('Model_ser_category'); 
	   return $CI->Model_ser_category->getSouCategoryByCat($cat); 
	}

//eNd Category Services 	
	
	function getCategoryEntData(){  
	   $CI = get_instance();
	      $CI->load->model('model_Entreprises'); 
	   return $CI->model_Entreprises->getCategoryData();
	}
	function getEtaCategoryData(){ 
      
	   $CI = get_instance();
	   $CI->load->model('Model_Etablissement'); 
	   $cats = $CI->Model_Etablissement->getActiveCategroy(); 
	   $output ='' ;	
	  foreach($cats as $cat) {
		  $soucats =  $CI->Model_Etablissement->getSouCategroyByCat($cat['id']); 
	     $output .=  '<li class="menu-item-has-children"><a href="'.base_url('/Etablissement?cat='.$cat["id"].'&sou_category=&wilaya=').'">'.$cat["name"].'</a> <span class="arrow"></span>';
		    $output .= '<ul class="sub-menu">';
	   	 foreach($soucats as $soucat){
					 $output .= '<li><a href="'.base_url('/Etablissement?cat='.$cat["id"].'&sou_category='.$soucat["id"].'&wilaya=').'">'.$soucat["name"].'</a></li>';
			       }
			 $output .='</ul></li> ';
		 
					  
	  }
	 return $output ;  
	}
	  function notifications ($id) {
		 $item_array  = null ;
		 $CI = get_instance();
	     $CI->load->model('notifications_model'); 
	     $CI->load->model('model_listings'); 
	     $CI->load->model('model_customer'); 
    
         $not = $CI->notifications_model->get_unread_notifications($id);
		 
		   foreach ($not as  $value) { 
            $customer = $CI->model_customer->fetch_customer_by_id($value->from);		   
		     if ($value->from == 9925 ) {
				   $nested_data['from'] = 'l\'équipe El Dalile';
			       $nested_data['picture'] = base_url().'assets/images/users/support-d.png';
				    $nested_data['photo'] =$value->photo;
						    $nested_data['listing_id'] = '' ;
			        }else {
				  $listing =  $CI->model_listings->getListingData($value->photo);
				  $nested_data['photo'] =$listing['photo'];
				  $nested_data['from'] = $customer->firstname.' '.$customer->lastname;
			      $nested_data['picture'] = $customer->picture;
				 }
		      
			    $nested_data['status'] =$value->status;
			    $nested_data['id'] =$value->id;
			    $nested_data['content'] = $value->content;
			    $nested_data['generated_on'] =$value->generated_on;
			    $item_array []= $nested_data;
			   
			   
		     } 
		  
     	  return $item_array ;
	   
	  }
	  
	  function notifications_count ($id) {
		
		 $CI = get_instance();
	     $CI->load->model('notifications_model'); 
         return $CI->notifications_model->get_unread_notifications_count($id);
	   
	  }
	  
	  
	  
	   function string_limit_words($string, $word_limit) { 
        $words = explode(' ', $string); 
        return implode(' ', array_slice($words, 0, $word_limit)); 
    }
	
	function time_diff($date_in){
            $start_date = $date_in;
            $end_date=date('Y-m-d H:i:s');

            $start_time = strtotime($start_date);
            $end_time = strtotime($end_date);
            $difference = $end_time - $start_time;

            $seconds = $difference % 60;            //seconds
            $difference = floor($difference / 60);

            $min = $difference % 60;              // min
            $difference = floor($difference / 60);

            $hours = $difference % 24;  //hours
            $difference = floor($difference / 24);

            $days = $difference % 30;  //days
            $difference = floor($difference / 30);

            $month = $difference % 12;  //month
            $difference = floor($difference / 12);
            
            $year = $difference % 1;  //month
            $difference = floor($difference / 1);


            $result = null;
            if($year!=0) {                
                if($year == 1){
                    $result.=$year.' Year ';    
                }else{
                    $result.=$year.' Years ';   
                }
            }
            if($month!=0) {                
                if($month == 1){
                    $result.=$month.' Month ';    
                }else{
                    $result.=$month.' Months ';   
                }
            }
            if($days!=0) {                
                if($days == 1){
                    $result.=$days.' Day ';    
                }else{
                    $result.=$days.' Days ';   
                }
            }
            if($hours!=0) {                
                if($hours == 1){
                    $result.=$hours.' Hour ';    
                }else{
                    $result.=$hours.' Hours ';   
                }
            }
            if($min!=0) {                
                if($min == 1){
                    $result.=$min.' Min ';    
                }else{
                    $result.=$min.' Mins ';   
                }
            }
            
            if($result==null){
                return 'Just Now';   
            }
            return $result.'  ';
        }

  
?>
