   <?php 

class Model_services extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	private $_limit;
    private $_pageNumber;
    private $_offset;
   
   public function setLimit($limit) {
        $this->_limit = $limit;
    }

    public function setPageNumber($pageNumber) {
        $this->_pageNumber = $pageNumber;
    }

    public function setOffset($offset) {
        $this->_offset = $offset;
    }
     /* get active Category infromation */
	 public function getActiveService($cat = null,  $wilaya = null ,$limit = null, $offset = null){
		 
		 if($cat && $wilaya ){
			  $this->db->select('services.* ');
             $this->db->where('services.wilaya' , $wilaya); 
              $this->db->where('services.Category' , $cat); 
              $this->db->where('services.status' , 1); 
			  $this->db->limit($limit, $offset);
	          $this->db->order_by('services.Title' , 'ASC'); 			  
              $query = $this->db->get('services');
			 return $query->result_array();
			 
		}elseif($cat && ($wilaya == null )){
			 
			 $this->db->select('services.* ');
              $this->db->where('services.status' , 1); 
              $this->db->where('services.Category' ,$cat); 
			  $this->db->limit($limit, $offset);
			  $this->db->order_by('services.Title' , 'ASC'); 
              $query = $this->db->get('services ' );
			  return $query->result_array();
		}elseif ($wilaya && ($cat == null)){
			  $this->db->select('services.* ');
              $this->db->where_in('services.wilaya' , $wilaya); 
              $this->db->where('services.status' , 1);
              $this->db->limit($limit, $offset);	
	          $this->db->order_by('services.Title' , 'ASC'); 			  
              $query = $this->db->get('services ');
			 return $query->result_array();
			 
		 } else {
			  $this->db->select('services.* ');
              $this->db->where('services.status' , 1); 
			  $this->db->limit($limit, $offset);
			  $this->db->order_by('services.Title' , 'ASC'); 
              $query = $this->db->get('services ' );
                      
			 return $query->result_array(); 
		 }
	 }
	 
	 public function getServiceByCat($cat = null , $wilaya = null ,$limit = null, $offset = null)
	{
		if($cat&&$wilaya ){
			
			  $this->db->select('services.* ');
             $this->db->where_in('services.wilaya' , $wilaya); 
              $this->db->where('services.Category' , $cat); 
              $this->db->where('services.status' , 1); 
              $this->db->limit($limit, $offset);
              $this->db->order_by('services.Title' , 'ASC'); 			  
              $query = $this->db->get('services ');
			 
			return $query->result_array();
		}elseif($cat && ($wilaya == null )) {
			  $this->db->select('services.* ');
              $this->db->where('services.Category' , $cat); 
              $this->db->where('services.status' , 1); 
              $this->db->limit($limit, $offset);	
              $this->db->order_by('services.Title' , 'ASC'); 			  
              $query = $this->db->get('services ');
			return $query->result_array();
		}elseif($wilaya && ($cat == null )){
			  $this->db->select('services.*');
              $this->db->from('services');
        $this->db->limit($limit, $offset);
              $this->db->where_in('services.wilaya' , $wilaya);
			  $this->db->where('services.status' , 1); 
			  $this->db->order_by('services.Title' , 'ASC'); 
              $query = $this->db->get();
			return $query->result_array();
		  }else {
			  $this->db->select('services.* ');
              $this->db->where('services.status' , 1); 
			  $this->db->limit($limit, $offset);
			  $this->db->order_by('services.Title' , 'ASC'); 
              $query = $this->db->get('services');
             return $query->result_array(); 
         }
	}
	
	public function getServiceBySouCat($sou = null ,$wilaya = null , $limit = null, $start = null){
		
		if($sou && $wilaya) {
			  $this->db->select('services.* ');
           $this->db->where_in('services.wilaya' , $wilaya); 
              $this->db->where('services.sou_category' , $sou); 
              $this->db->where('services.status' , 1); 
			  $this->db->limit($limit, $start);
              $query = $this->db->get('services');
		  } elseif($sou && ($wilaya == null)) {
			   $this->db->select('services.* ');
                $this->db->where('services.sou_category' , $sou); 
               $this->db->where('services.status' , 1);
		       $this->db->limit($limit, $start);			   
               $query = $this->db->get('services');
		   }elseif($sou == null &&( $wilaya != null)){
			    $this->db->select('services.* ');
                 $this->db->where_in('services.wilaya' , $wilaya); 
                $this->db->where('services.status' , 1); 
			   $this->db->limit($limit, $start);
                $query = $this->db->get('services');
			  }else{
			     $this->db->select('services.* ');
                $this->db->where('services.status' , 1); 
			    $this->db->limit($limit, $start);
                $query = $this->db->get('services');
                return $query->result_array(); 
				  
			  }
		 	return $query->result_array();
		  
	 }
	
	public function getAllActiveService($Cat = null) {
		
		if($Cat){
         $this->db->from('services');
		 $this->db->where('Category' , $Cat);
		  $this->db->where('services.status' , 1); 
		}else { $this->db->from('services'); } 
        return $this->db->count_all_results(); 
     }
	 public function getAllActiveServiceBySouCat($SouCat = null ,$wilaya) {
		
		if($SouCat){
         $this->db->select('services.* ');
         $this->db->from('services');
                $this->db->where_in('services.wilaya' , $wilaya); 
              $this->db->where('services.sou_category' , $SouCat); 
              $this->db->where('services.status' , 1); 
           
		   } 
        return $this->db->count_all_results(); 
     }
	 public function getAllActiveServiceByWilaya($wilaya = null) {
		
		if($wilaya){
             $this->db->select('services.*');
              $this->db->from('services');
        
			  $this->db->where_in('services.wilaya' , $wilaya);
			  $this->db->where('services.status' , 1); 
       }else { $this->db->from('services'); } 
        return $this->db->count_all_results(); 
     }
	 

	 
	
	public function getServiceData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM services  WHERE services.id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM services ORDER by id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
 
	
	/*  --   Customer  -- */
	
	public function getServiceCustomer($id = null , $stat = null)
	{
		 if($stat) { 
			
			$sql = "SELECT * FROM services WHERE customer_id = $id AND status = ? ORDER BY id DESC";
			$query = $this->db->query($sql, array($stat));
			return $query->result_array();
			 
		}

			$sql = "SELECT * FROM services WHERE customer_id = ?  ORDER BY date_add DESC";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
	}	
	 
	 public function countServiceCustomer($id , $stat = null) {
		 if( $stat == null){
			  $this->db->from('services');
		  $this->db->where('customer_id' ,$id );
         return $this->db->count_all_results(); 
		 }else{
			  $this->db->from('services');
		  $this->db->where('customer_id',$id );
		  $this->db->where('status', $stat);
         return $this->db->count_all_results(); 
			 
		 }
        
     }
  
	public function create_Service($data)
	{
		if($data) {
			$insert = $this->db->insert('services', $data);
			$insert_id = $this->db->insert_id();
			
			if ($insert == true) { 
				return $insert_id ; 
			} else { 
				return false ;
			} 
		}
	}

	public function update_Service($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('services', $data);
			return ($update == true) ? true : false;
	    } 
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('services');
			return ($delete == true) ? true : false;
		}
	}
  
 
    public function insert_time($data)
	{
		if($data) {
			
			$insert = $this->db->insert('opening', $data);
			 return ($insert == true) ? true : false;
		}
	} 
	/*   Images Listing    */
	public function insert_images($data)
	{
		if($data) { 
		$insert =	$this->db->insert_batch('images', $data); 
			return ($insert == true) ? true : false; 
		}
	} 
	 public function update_images($data , $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('images', $data);
			return ($update == true) ? true : false;
		}
	} 
	public function getImagesData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM images WHERE service_id = ? limit 4";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}
  	}
	
	public function getAllImages($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM images WHERE service_id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}else {
			
			return null ;
		}
 
	}
	public function countImages($id = null)
	{
		if($id) {
			$sql = "SELECT COUNT(*) AS total FROM images WHERE services_id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
 	}
   
   /* Amenities */
   
   public function getAmenitiesData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM amenities WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM amenities";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	
    // Count post total likes and unlikes
	
	 public function Countlike($listing_id) {
		 
	     $type = 'type';
		
		 $sql = "SELECT COUNT(*) AS cntLikes FROM listing_like WHERE listing_id = ? and  $type = 1  ";
         $result = $this->db->query($sql, array($listing_id));
		 foreach($result->result_array() as $row)
          {
			   if($row['cntLikes'] != 0) 
				   return $row['cntLikes'];
			    else return '';
             } 
	 }
    public function cntUnlikes($listing_id) {
		 
		 $type = 'Favoris';
		 
		 $sql = "SELECT COUNT(*) AS cntUnlikes FROM listing_like WHERE $type = 1 and  listing_id = ?  ";
         $result = $this->db->query($sql , array($listing_id));
		 foreach($result->result_array() as $row)
           {   
		     if($row['cntUnlikes'] != 0) 
		         return $row['cntUnlikes'];
			    else return '';
              } 
	 } 
	 public function Checking_user($listing_id ,$user ,$type) {
		
	       $sql = "SELECT count(*) as cntStatus , type , Favoris , id FROM listing_like WHERE listing_id = $listing_id AND user_id = $user ";
           $result = $this->db->query($sql);
		   $row = $result->row_array() ;
		   return $row;
			 
	 }
	 
	 public function insert_like ($likeData) {
	      $q = $this->db->insert('listing_like', $likeData);
          $insert_id = $this->db->insert_id();
		  return ($q == true) ? $insert_id : false;
	  }
	  
    public function update_like($like_id, $data, $type){
		
	  $this->db->set($type, $data)
				->where('id', $like_id)
				->update('listing_like');
	}
	
	public function exclusives () {
		
		$sql = "SELECT * FROM services  WHERE status = 1 LIMIT 0 , 10";
			  $query = $this->db->query($sql);
			 return $query->result_array();
		
	}
	
 function update_counter($slug) {
// return current article views 
    $this->db->where('id', urldecode($slug));
    $this->db->select('vue');
    $count = $this->db->get('services')->row();
// then increase by one 
    $this->db->where('id', urldecode($slug));
    $this->db->set('vue', ($count->vue + 1));
    $this->db->update('services');
}

 public function searshService($title){

	    $this->db->like('Title', $title , 'both');
		$this->db->order_by('Title', 'ASC');
		$this->db->limit(10);
		return $this->db->get('services')->result();
 } 
 
 public function getServiceByTilteAndWilaya($title , $wilaya){
 	            $this->db->select('listings.* ');
			     $this->db->where('services.wilaya' , $wilaya); 
                $this->db->where('services.status' , 1); 
			    $this->db->like('services.Title', $title , 'both');
			    $query = $this->db->get('services');
                return $query->result_array(); 
 } 
  public function getServiceByTilte($title){
 	            $this->db->select('services.* ');
	            $this->db->where('services.status' , 1); 
			    $this->db->like('services.Title', $title , 'both');
			    $query = $this->db->get('services');
                return $query->result_array(); 
 } 
 

 public function getServiceDistance($title , $lat , $lng  ){
 
    $radius = "10";
	
	$sql = "SELECT services.* , services.lat ,services.lng, services.wilaya ,services.id as cordId,  ( 6371 * acos( cos( radians('$lat') ) * cos( radians( services.lat) ) * cos( radians( services.lng) - radians('$lng') ) + sin( radians('$lat') ) * sin( radians( services.lat) ) ) ) AS distance FROM services,services WHERE services.id = services.listing_id AND services.status = 1 AND services.Title LIKE '%$title%' HAVING distance < '$radius' ORDER BY distance LIMIT 0 , 10";
	 
 	$query = $this->db->query($sql);
	  return $query->result_array();
 }
}

