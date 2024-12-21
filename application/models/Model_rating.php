<?php 

class Model_rating extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	 
	
 public function get_rating($business_id)
 {
  $this->db->select('AVG(p_rating) as rating , count(p_rating) as totals');
  $this->db->from('reviews');
  $this->db->where('listing_id', $business_id);
   $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row;
  }
 } 
    public function get_reviews($business_id , $row){
        
	    $rowperpage = 3;
        if($row) { 
        $sql = "select * from reviews WHERE listing_id = ? ORDER BY id DESC limit $row , $rowperpage  ";
        $result = $this->db->query($sql, array($business_id))->result(); 
		  }else { 
			   $sql = "select * from reviews WHERE listing_id = ? ORDER BY id DESC limit 0 , $rowperpage  ";
               $result = $this->db->query($sql , array($business_id))->result();  
		  }
		
        return $result;
   
	}
	 public function get_reviews_api($business_id){
       
      
			   $sql = "select * from reviews WHERE listing_id = {$business_id} ORDER BY id DESC   ";
              $query = $this->db->query($sql);
			 return $query->result_array();
		 
		
        return $result;
   
	}
   public function get_child($business_id ){
         
        $sql = "select * from reviews WHERE pere = $business_id ORDER BY id DESC ";
        $result = $this->db->query($sql)->result();
        return $result;  
	}
	 public function count_child($business_id ){
         
        $sql = "select count(Review) as total from reviews WHERE pere = $business_id  ";
        $result = $this->db->query($sql);
		foreach($result->result_array() as $row)
          {
             return $row;
             }
        
    }
    // Count post total likes and unlikes
	 public function Countlike($review_id) {
		 
		 $sql = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type = 1 and  review_id = $review_id  ";
	if($sql) {	 
         $result = $this->db->query($sql);
		 foreach($result->result_array() as $row)
          {
			   if($row['cntLikes'] != 0) 
				   return $row['cntLikes'];
			    else return '';
             } 
	   }else {
		   
		   return '';
	   }	 
	 }
	  public function cntUnlikes($review_id) {
		 
		 $sql = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type = 2 and  review_id = $review_id  ";
         $result = $this->db->query($sql);
		 foreach($result->result_array() as $row)
           {   
		     if($row['cntUnlikes'] != 0) 
		         return $row['cntUnlikes'];
			    else return '';
              } 
	 } 
	 public function Checking_user($review_id ,$user , $type = null) {
		 
		  $sql = "SELECT count(*) as cntStatus , type , id FROM like_unlike WHERE review_id = $review_id AND user_id = $user  ";
          $result = $this->db->query($sql);
		  $row = $result->row_array() ;
		   return $row;
			 
	 }
	 
	 public function insert_like ($likeData) {
		   $q = $this->db->insert('like_unlike', $likeData);
          $insert_id = $this->db->insert_id();
		  return ($q == true) ? $insert_id : false;
	  }
	  
    public function update_like($like_id, $data){
		
		$this->db->set('type', $data)
				->where('id', $like_id)
				->update('like_unlike');
	}

  
	public function getProductRatings($product){
		$q = $this->db->get_where('listings', array('id' => $product));
		if($q->num_rows() > 0){
			return $q->result_array();
		} else{
			return false;
		}
	}

	public function insertRating($ratingData){
		 $q = $this->db->insert('reviews', $ratingData);
          $insert_id = $this->db->insert_id();
		  return ($q == true) ? $insert_id : false;
		
	}


	public function updateProduct($product, $avg){
		$this->db->set('p_rating', $avg)
				->where('id', $product)
				->update('listings');
	}


	public function remove($id)
	{
		if($id) {
			$this->db->where('listing_id', $id);
			$delete = $this->db->delete('reviews');
			return ($delete == true) ? true : false;
		}
	}
	
	public function getReviewData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM reviews WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

}