<?php 

class Model_blogs extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
 
   public function addblog ($blog) {
		   $q = $this->db->insert('blogs', $blog);
          $insert_id = $this->db->insert_id();
		  return ($q == true) ? $insert_id : false;
	  } 
	  
	public function getBlog ($blog = null){
		if($blog){
		$sql = "SELECT * FROM blogs WHERE id = ?";
			$query = $this->db->query($sql, array($blog));
			return $query->row_array();
		}else{
			
		 $sql = "SELECT * FROM blogs limit 5";
		$query = $this->db->query($sql);
		return $query->result_array();
		}
		 
	 }
 public function getBlogByCustomer ($customer){
		 
		 $q = $this->db->get_where('blogs', array('customer_id' => $customer));
		 return $q->result_array();
		  
	}
 

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('blogs');
			return ($delete == true) ? true : false;
		}
	}
	
	public function getAllBlogs()
	{            $this->db->order_by("id" ,' DESC'); 
		$query = $this->db->get("blogs"); 
		      
		return $query->result_array();
	}
	
	function update_counter($slug) {
// return current article views 
    $this->db->where('id', urldecode($slug));
    $this->db->select('vue');
    $count = $this->db->get('blogs')->row();
// then increase by one 
    $this->db->where('id', urldecode($slug));
    $this->db->set('vue', ($count->vue + 1));
    $this->db->update('blogs');
}
 
 

}