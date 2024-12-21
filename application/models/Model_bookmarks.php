<?php 

class Model_bookmarks extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
  public function getBookmarks($user) {
		
	  $sql = "SELECT count(*) as total  FROM listing_like WHERE  user_id = $user AND Favoris = 1";
      $result = $this->db->query($sql);
      $row = $result->row_array() ;
	  return $row['total'];
	 }
	 
 public function getBookmarksListing($user) { 
		
	  $sql = "SELECT * FROM listing_like WHERE user_id = $user AND Favoris = 1";
      $result = $this->db->query($sql);
      $row = $result->result_array() ;
	  return $row ;
   }
	 
   
    public function update_like($like_id, $data ){
		
	 $this->db->set('Favoris', $data)
				->where('listing_id', $like_id)
				->update('listing_like');
				
		return true ;		
	}
  	

}