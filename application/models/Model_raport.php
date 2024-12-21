<?php 

class Model_raport extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
 
 
	 public function addReport ($report) {
		   $q = $this->db->insert('report', $report);
          $insert_id = $this->db->insert_id();
		  return ($q == true) ? $insert_id : false;
	  } 
	  
	public function getReport($report){
		$q = $this->db->get_where('report', array('id' => $report));
		if($q->num_rows() > 0){
			return $q->result_array();
		} else{
			return false;
		}
	}
 

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('report');
			return ($delete == true) ? true : false;
		}
	}
	
	public function getActiveReport()
	{            $this->db->order_by("id" ,' DESC'); 
		$query = $this->db->get("report"); 
		      
		return $query->result_array();
	}
 

}