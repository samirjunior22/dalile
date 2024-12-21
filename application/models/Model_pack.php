<?php 

class Model_pack extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active pack infromation */
	public function getAllPack()
	{
		$query = $this->db->get("pack"); 
		return $query->result_array();
	}

	/* get the pack data */
	public function getPackData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM pack WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM pack";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getPackDataById($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM pack WHERE user_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM pack";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getPackdetail($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM pack_detail WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
 
	}

	public function insert_pack($data)
	{
		if($data) {
			$insert = $this->db->insert('pack', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update_pack($data, $id)
	{
		if($data && $id) {
			$this->db->where('user_id', $id);
			$update = $this->db->update('pack', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('pack');
			return ($delete == true) ? true : false;
		}
	}
	
   
}