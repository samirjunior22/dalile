<?php 

class Model_Etablissement extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active Category Etablissement infromation */
	public function getActiveCategroy()
	{
		$query = $this->db->get("eta_categories"); 
		return $query->result_array();
	}

	/* get the Category Etablissement data */
	public function getCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM eta_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM eta_categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create_cat($data)
	{
		if($data) {
			$insert = $this->db->insert('Eta_categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update_cat($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('Eta_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('Eta_categories');
			return ($delete == true) ? true : false;
		}
	}
	
	
		/* get active Sou Categroy infromation */
	public function getActiveSouCategroy()
	{
		$sql = "SELECT * FROM Eta_sou_categories WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
    public function getSouCategroyByCat($cat)
	{
		$sql = "SELECT * FROM eta_sou_categories WHERE eta_categories = ?";
		$query = $this->db->query($sql, array($cat));
		return $query->result_array();
	}
	/* get the Sou Categroy data */
	public function getSouCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM eta_sou_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM eta_sou_categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create_sou($data)
	{
		if($data) {
			$insert = $this->db->insert('eta_sou_categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update_sou($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('eta_sou_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove_sou($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('eta_sou_categories');
			return ($delete == true) ? true : false;
		}
	}
	public function getSouCategoryDataById($id)
	{
		 if($id) {
			$sql = "SELECT * FROM eta_sou_categories WHERE eta_categories = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		$sql = "SELECT * FROM eta_sou_categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	 
	}
	
	
	/* ****************************** */
	
	public function create_Etablissement($data)
	{
		if($data) {
			$insert = $this->db->insert('etablissement', $data);
			$insert_id = $this->db->insert_id();
			
			if ($insert == true) { 
				return $insert_id ; 
			} else { 
				return false ;
			} 
		}
	}
	
	
	public function update_Etablissement($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('etablissement', $data);
			return ($update == true) ? true : false;
	    } 
	}

	public function remove_Etablissement($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('etablissement');
			return ($delete == true) ? true : false;
		}
	}
	
	public function getEtablissementData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM etablissement WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM etablissement WHERE status = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}	
	
 public function getEtablissementByCat($cat = null , $wilaya = null )
	{
		if($cat&&$wilaya ){
			
			  $this->db->select('etablissement.* ');
              $this->db->where_in('etablissement.wilaya' , $wilaya); 
              $this->db->where('etablissement.eta_sou_categories' , $cat); 
              $this->db->where('etablissement.status' , 1);  
              $query = $this->db->get('etablissement '  );
			 
			return $query->result_array();
		}elseif($cat && ($wilaya == null )) {
			$sql = "SELECT * FROM etablissement WHERE status = 1  AND eta_sou_categories = ?   ";
			$query = $this->db->query($sql, array($cat));
			return $query->result_array();
		}elseif($wilaya && ($cat == null )){
			$this->db->select('etablissement.*');
              $this->db->from('etablissement');
              $this->db->where_in('etablissement.wilaya' , $wilaya);
			  $this->db->where('etablissement.status' , 1);  
              $query = $this->db->get();
			return $query->result_array();
		  }else {
			  
			  $sql = "SELECT * FROM etablissement WHERE status = 1 ";
			  $query = $this->db->query($sql);
			 return $query->result_array();
         }
	}
	
	
	

}