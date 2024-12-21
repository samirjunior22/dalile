<?php 

class Model_listings extends MY_Model
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
	 public function getActiveListing($cat = null,  $wilaya = null ,$limit = null, $offset = null){
		 
		 if($cat && $wilaya ){
			  $this->db->select('listings.* ');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
              $this->db->where('contact_info.wilaya' , $wilaya); 
              $this->db->where('listings.Category' , $cat); 
              $this->db->where('listings.status' , 1); 
			  $this->db->limit($limit, $offset);
	          $this->db->order_by('listings.Title' , 'ASC'); 			  
              $query = $this->db->get('listings');
			 return $query->result_array();
			 
		}elseif($cat && ($wilaya == null )){
			 
			 $this->db->select('listings.* ');
              $this->db->where('listings.status' , 1); 
              $this->db->where('listings.Category' ,$cat); 
			  $this->db->limit($limit, $offset);
			  $this->db->order_by('listings.Title' , 'ASC'); 
              $query = $this->db->get('listings ' );
			  return $query->result_array();
		}elseif ($wilaya && ($cat == null)){
			  $this->db->select('listings.* ');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
              $this->db->where_in('contact_info.wilaya' , $wilaya); 
              $this->db->where('listings.status' , 1);
              $this->db->limit($limit, $offset);	
	          $this->db->order_by('listings.Title' , 'ASC'); 			  
              $query = $this->db->get('listings ');
			 return $query->result_array();
			 
		 } else {
			  $this->db->select('listings.* ');
              $this->db->where('listings.status' , 1); 
			  $this->db->limit($limit, $offset);
			  $this->db->order_by('listings.Title' , 'ASC'); 
              $query = $this->db->get('listings ' );
                      
			 return $query->result_array(); 
		 }
	 }
	 
	 public function getListingByCat($cat = null , $wilaya = null ,$limit = null, $offset = null)
	{
		if($cat&&$wilaya ){
			
			  $this->db->select('listings.* ');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
              $this->db->where_in('contact_info.wilaya' , $wilaya); 
              $this->db->where('listings.Category' , $cat); 
              $this->db->where('listings.status' , 1); 
              $this->db->limit($limit, $offset);
              $this->db->order_by('listings.Title' , 'ASC'); 			  
              $query = $this->db->get('listings ');
			 
			return $query->result_array();
		}elseif($cat && ($wilaya == null )) {
			  $this->db->select('listings.* ');
              $this->db->where('listings.Category' , $cat); 
              $this->db->where('listings.status' , 1); 
              $this->db->limit($limit, $offset);	
              $this->db->order_by('listings.Title' , 'ASC'); 			  
              $query = $this->db->get('listings ');
			return $query->result_array();
		}elseif($wilaya && ($cat == null )){
			  $this->db->select('listings.*');
              $this->db->from('listings');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id');
			  $this->db->limit($limit, $offset);
              $this->db->where_in('contact_info.wilaya' , $wilaya);
			  $this->db->where('listings.status' , 1); 
			  $this->db->order_by('listings.Title' , 'ASC'); 
              $query = $this->db->get();
			return $query->result_array();
		  }else {
			  $this->db->select('listings.* ');
              $this->db->where('listings.status' , 1); 
			  $this->db->limit($limit, $offset);
			  $this->db->order_by('listings.Title' , 'ASC'); 
              $query = $this->db->get('listings');
             return $query->result_array(); 
         }
	}
	
	public function getListingBySouCat($sou = null ,$wilaya = null , $limit = null, $start = null){
		
		if($sou && $wilaya) {
			  $this->db->select('listings.* ');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
              $this->db->where_in('contact_info.wilaya' , $wilaya); 
              $this->db->where('listings.sou_category' , $sou); 
              $this->db->where('listings.status' , 1); 
			  $this->db->limit($limit, $start);
              $query = $this->db->get('listings');
		  } elseif($sou && ($wilaya == null)) {
			   $this->db->select('listings.* ');
               $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
               $this->db->where('listings.sou_category' , $sou); 
               $this->db->where('listings.status' , 1);
		       $this->db->limit($limit, $start);			   
               $query = $this->db->get('listings');
		   }elseif($sou == null &&( $wilaya != null)){
			    $this->db->select('listings.* ');
                $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
			    $this->db->where_in('contact_info.wilaya' , $wilaya); 
                $this->db->where('listings.status' , 1); 
			   $this->db->limit($limit, $start);
                $query = $this->db->get('listings');
			  }else{
			     $this->db->select('listings.* ');
                $this->db->where('listings.status' , 1); 
			    $this->db->limit($limit, $start);
                $query = $this->db->get('listings');
                return $query->result_array(); 
				  
			  }
		 	return $query->result_array();
		  
	 }
	
	public function getAllActiveListing($Cat = null) {
		
		if($Cat){
         $this->db->from('listings');
		 $this->db->where('Category' , $Cat);
		  $this->db->where('listings.status' , 1); 
		}else { $this->db->from('listings'); } 
        return $this->db->count_all_results(); 
     }
	 public function getAllActiveListingBySouCat($SouCat = null ,$wilaya) {
		
		if($SouCat){
         $this->db->select('listings.* ');
         $this->db->from('listings');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
              $this->db->where_in('contact_info.wilaya' , $wilaya); 
              $this->db->where('listings.sou_category' , $SouCat); 
              $this->db->where('listings.status' , 1); 
           
		   } 
        return $this->db->count_all_results(); 
     }
	 public function getAllActiveListingByWilaya($wilaya = null) {
		
		if($wilaya){
             $this->db->select('listings.*');
              $this->db->from('listings');
              $this->db->join('contact_info', 'listings.id = contact_info.listing_id');
			  $this->db->where_in('contact_info.wilaya' , $wilaya);
			  $this->db->where('listings.status' , 1); 
       }else { $this->db->from('contact_info'); } 
        return $this->db->count_all_results(); 
     }
	  public function getAllActiveListings() {
		
	    $this->db->from('listings'); 
	    $this->db->where('listings.status' , 1); 
	    $this->db->order_by('listings.Title' , 'ASC'); 
        return $this->db->count_all_results(); 
     }
	

	 
	
	public function getListingData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM listings  WHERE listings.id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM listings ORDER by id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getListingByPlaceId($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM listings WHERE place_id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM listings ORDER by id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/*  --   Customer  -- */
	
	public function getListingCustomer($id = null , $stat = null)
	{
		 if($stat) { 
			
			$sql = "SELECT * FROM listings WHERE customer_id = $id AND status = ? ORDER BY id DESC";
			$query = $this->db->query($sql, array($stat));
			return $query->result_array();
			 
		}

			$sql = "SELECT * FROM listings WHERE customer_id = ?  ORDER BY date_add DESC";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
	}	
	 
	 public function countListingCustomer($id , $status = null) {
		 
		 $total = 0 ;
		 
		if($status == null){
			 $this->db->from('listings');
	   	     $this->db->where('customer_id' , $id);
	         $total = $this->db->count_all_results();
              
			  $this->db->from('services');
		      $this->db->where('customer_id' ,$id );
              $total = $total + $this->db->count_all_results(); 
			 
		
		    return $total ;
			
		} else {
		 
		 
         $this->db->from('listings');
		 $this->db->where('customer_id' , $id);
		 $this->db->where('status' , $status);
	     return $this->db->count_all_results(); 
		}
     }
  
	public function create_Listing($data)
	{
		if($data) {
			$insert = $this->db->insert('listings', $data);
			$insert_id = $this->db->insert_id();
			
			if ($insert == true) { 
				return $insert_id ; 
			} else { 
				return false ;
			} 
		}
	}

	public function update_Listing($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('listings', $data);
			return ($update == true) ? true : false;
	    } 
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('listings');
			return ($delete == true) ? true : false;
		}
	}
	
 
	
	/* get Contact Info data */
	
	public function getContactInfoData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM contact_info WHERE listing_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM contact_info";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create_ContactInfo($data)
	{
		if($data) {
			
			$insert = $this->db->insert('contact_info', $data);
			 return ($insert == true) ? true : false;
		}
	}

	public function update_ContactInfo($data, $id)
	{
		if($data && $id) {
			$this->db->where('listing_id', $id);
			$update = $this->db->update('contact_info', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove_ContactInfo($id)
	{
		if($id) {
			$this->db->where('listing_id', $id);
			$delete = $this->db->delete('contact_info');
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
			$sql = "SELECT * FROM images WHERE listing_id = ? limit 4";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}
  	}
	
	public function getAllImages($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM images WHERE listing_id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}else {
			
			return null ;
		}
 
	}
	public function countImages($id = null)
	{
		if($id) {
			$sql = "SELECT COUNT(*) AS total FROM images WHERE listing_id = ? ";
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
		
		$sql = "SELECT * FROM listings  WHERE status = 1 LIMIT 0 , 10";
			  $query = $this->db->query($sql);
			 return $query->result_array();
		
	}
	
 function update_counter($slug) {
// return current article views 
    $this->db->where('id', urldecode($slug));
    $this->db->select('vue');
    $count = $this->db->get('listings')->row();
// then increase by one 
    $this->db->where('id', urldecode($slug));
    $this->db->set('vue', ($count->vue + 1));
    $this->db->update('listings');
}

 public function searshListing($title){

	    $this->db->like('Title', $title , 'both');
		$this->db->order_by('Title', 'ASC');
		$this->db->limit(10);
		return $this->db->get('listings')->result();
 } 
 
 public function getListingByTilteAndWilaya($title , $wilaya){
 	            $this->db->select('listings.* ');
			     $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
			    $this->db->where('contact_info.wilaya' , $wilaya); 
                $this->db->where('listings.status' , 1); 
			    $this->db->like('listings.Title', $title , 'both');
			    $query = $this->db->get('listings');
                return $query->result_array(); 
 } 
  public function getListingByTilte($title){
 	            $this->db->select('listings.* ');
			     $this->db->join('contact_info', 'listings.id = contact_info.listing_id'); 
		         $this->db->where('listings.status' , 1); 
			    $this->db->like('listings.Title', $title , 'both');
			    $query = $this->db->get('listings');
                return $query->result_array(); 
 } 
 
 public function getListingDistance($title , $lat , $lng  ){
 
    $radius = "10";
	
	$sql = "SELECT listings.* , contact_info.lat ,contact_info.lng, contact_info.wilaya ,contact_info.id as cordId,  ( 6371 * acos( cos( radians('$lat') ) * cos( radians( contact_info.lat) ) * cos( radians( contact_info.lng) - radians('$lng') ) + sin( radians('$lat') ) * sin( radians( contact_info.lat) ) ) ) AS distance FROM listings,contact_info WHERE listings.id = contact_info.listing_id AND listings.status = 1 AND listings.Title LIKE '%$title%' HAVING distance < '$radius' ORDER BY distance LIMIT 0 , 10";
	 
 	$query = $this->db->query($sql);
	  return $query->result_array();
 }
}