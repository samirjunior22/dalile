<?php 
 
    function notifications_admin () {
		 $item_array  = null ;
		 $CI = get_instance();
	     $CI->load->model('notifications_model'); 
	     
        $not = $CI->notifications_model->get_unread_notif_admin();
		 
		   foreach ($not as  $value) { 
        		   
		     if ($value->content == 'joined' ) {
				    
				   $nested_data['content'] = ' new members joined today ';
				   
				 } else {
					 
				  $nested_data['content'] = 'a réagi à votre annonce';
			 
				 }
		     
			   $nested_data['status'] =$value->status;
			   $nested_data['id'] =$value->id;
			   $nested_data['generated_on'] =$value->generated_on;
			   $item_array []= $nested_data;
			   
			   
		     } 
		  
     	  return $item_array ;
	   
	  }
	  
	  function notifications_admin_count () {
		
		 $CI = get_instance();
	     $CI->load->model('notifications_model'); 
         return $CI->notifications_model->notif_admin_count();
	   
	  }
	  
	   
?>
