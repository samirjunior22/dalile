<?php 

class Model_Entreprises extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
   	/* ****************************** */
	
	public function create_Entreprise($data)
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
	
	
	public function update_Entreprises($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('etablissement', $data);
			return ($update == true) ? true : false;
	    } 
	}

	public function remove_Entreprises($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('etablissement');
			return ($delete == true) ? true : false;
		}
	}
	public function getEntrepriseData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM etablissement WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM etablissement WHERE status = 2";
		$query = $this->db->query($sql);
		return $query->result_array();
	}	
	
 public function getEntrepriseByCat($cat = null , $wilaya = null )
	{
		if($cat&&$wilaya ){
			
			  $this->db->select('etablissement.* ');
              $this->db->where_in('etablissement.wilaya' , $wilaya); 
              $this->db->where('etablissement.Eta_categories' , $cat); 
              $this->db->where('etablissement.status' , 2);  
              $query = $this->db->get('etablissement '  );
			 
			return $query->result_array();
		}elseif($cat && ($wilaya == null )) {
			  $this->db->select('etablissement.* ');
               $this->db->where('etablissement.Eta_categories' , $cat); 
              $this->db->where('etablissement.status' , 2);  
              $query = $this->db->get('etablissement '  );
			return $query->result_array();
		}elseif($wilaya && ($cat == null )){
			$this->db->select('etablissement.*');
              $this->db->from('etablissement');
              $this->db->where_in('etablissement.wilaya' , $wilaya);
			  $this->db->where('etablissement.status' , 2);  
              $query = $this->db->get();
			return $query->result_array();
		  }else {
			  
			  $sql = "SELECT * FROM etablissement WHERE status = 2 ";
			  $query = $this->db->query($sql);
			 return $query->result_array();
         }
	}
	
	
	/* get active Category Etablissement infromation */
	public function getActiveCategroy()
	{
		$query = $this->db->get("ent_categories"); 
		return $query->result_array();
	}

	/* get the Category Etablissement data */
	public function getCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM ent_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

	//	$sql = "SELECT * FROM ent_categories";
		//$query = $this->db->query($sql);
		//return $query->result_array();
	}
	
		public function create_cat($data)
	{
		if($data) {
			$insert = $this->db->insert('ent_categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update_cat($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('ent_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('ent_categories');
			return ($delete == true) ? true : false;
		}
	}
	

}