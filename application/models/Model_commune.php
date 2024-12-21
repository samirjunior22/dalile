<?php 

class Model_commune extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*get the active Commune information*/
	public function getActiveCommune()
	{
		$sql = "SELECT * FROM commune ";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the Commune data */
	public function getCommuneData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM commune WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM commune";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('commune', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('commune', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('commune');
			return ($delete == true) ? true : false;
		}
	}
	
	public function getDairaData($id = null) {
			
			
			if($id) {
			$sql = "SELECT * FROM daira WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM daira";
		$query = $this->db->query($sql);
		return $query->result_array();
		
		
	}
	
	
	
	// ********************************  Wilaya ********************************
	
		public function getWilayaData($id = null) {
			
			
			if($id) {
			$sql = "SELECT * FROM wilaya WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM wilaya";
		$query = $this->db->query($sql);
		return $query->result_array();
		
		
	}
	
	
  public function searshWilaya($wilaya){

	    $this->db->like('name', $wilaya , 'both');
		$this->db->order_by('name', 'ASC');
		$this->db->limit(1);
		return $this->db->get('wilaya')->row_array();
  } 
	
   	public function getWilaya()
	{
		$sql = "SELECT * FROM wilaya ";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
   
   public function createdaira($data)
	{
		if($data) {
			$insert = $this->db->insert('daira', $data);
			return ($insert == true) ? true : false;
		}
	}
	
	public function createWilayas($data)
	{
		if($data) {
			$insert = $this->db->insert_batch('wilaya', $data);
			return ($insert == true) ? true : false;
		}
	}
	public function createCommunes($data)
	{
		if($data) {
			$insert = $this->db->insert_batch('commune', $data);
			return ($insert == true) ? true : false;
		}
	}
	
	
	

}