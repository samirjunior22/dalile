<?php 

class Model_ser_category extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
	public function getActiveCategroy()
	{
		$query = $this->db->get("ser_categories"); 
		return $query->result_array();
	}
		function search_sou($title){
		$this->db->like('name', $title , 'both');
		$this->db->order_by('name', 'ASC');
		$this->db->limit(10);
		return $this->db->get('ser_categories')->result();
	}

	/* get the Category data */
	public function getCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM ser_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM ser_categories WHERE active = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create_cat($data)
	{
		if($data) {
			$insert = $this->db->insert('ser_categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update_cat($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('ser_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('ser_categories');
			return ($delete == true) ? true : false;
		}
	}
	
	
	
  /* get active Sou Categroy infromation */
	public function getActiveSouCategroy()
	{
		$sql = "SELECT * FROM ser_sou_categories WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the Sou Categroy data */
	public function getSouCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM ser_sou_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM ser_sou_categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getSouCategoryByCat($cat = null)
	{
		if($cat) {
			$sql = "SELECT * FROM ser_sou_categories WHERE category_id = ?";
			$query = $this->db->query($sql, array($cat));
			return $query->result_array();
		}
 
	}
	
	function search_cat($title){
		$this->db->like('name', $title , 'both');
		$this->db->order_by('name', 'ASC');
		$this->db->limit(10);
		return $this->db->get('ser_sou_categories')->result();
	}


	public function create_sou($data)
	{
		if($data) {
			$insert = $this->db->insert('ser_sou_categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update_sou($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('ser_sou_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove_sou($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('ser_sou_categories');
			return ($delete == true) ? true : false;
		}
	}
	public function getSouCategoryDataById($id)
	{
		 if($id) {
			$sql = "SELECT * FROM ser_sou_categories WHERE category_id = ?  ORDER BY  id ASC";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		 }

		$sql = "SELECT * FROM ser_sou_categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	 
	}
	
	
	

}