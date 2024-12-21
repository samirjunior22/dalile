<?php 

class Model_orders extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
			
		$this->load->model('model_customer');
	}

	/* get the orders data */
	public function getOrdersData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM facture WHERE id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM facture ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getOrdersCustomerData($id = null , $devis)
	{
		if($id) {
			$sql = "SELECT * FROM facture WHERE customer_id = ? AND status = ?";
			$query = $this->db->query($sql, array($id , $devis));
			return $query->result_array();
		}
 
	}
 

	public function create($customer_id , $object , $total)
	{
		 $bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
	     $data = array(
    		'bill_no' => $bill_no,
    		'customer_id' => $customer_id,
            'objet' => $object ,						
    		'date_add' => date('Y-m-d h:i:s a'),
    		'total' => $total,
    		'status' => 0,
    		 
    	);

		 $insert = $this->db->insert('facture', $data);
		 $insert_id = $this->db->insert_id();
		return ($insert) ? $insert_id : false;
	}

	 

	public function update($id)
	{
		if($id) {
			
            $data = array(
    		'bill_no' => $bill_no,
    		'customer_id' => $distributeur['id'],
            'objet' => $distributeur['firstname'] .' '.$distributeur['lastname'] ,						
    		'date_add' => date('Y-m-d h:i:s a'),
    		'date_regler' => date('Y-m-d h:i:s a'),
    		'total' => strtotime(date('Y-m-d h:i:s a')),
    		'status' => $this->input->post('gross_amount_value'),
    		 
    	     );

			$this->db->where('id', $id);
			$update = $this->db->update('facture', $data);
  
			 return true;
		}
	} 

	public function remove($id)
	{ 
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('facture');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalDevis($type , $customer_id)
	{
		$sql = "SELECT * FROM facture WHERE  status = ? AND customer_id = ?";
		$query = $this->db->query($sql, array($type , $customer_id));
		return $query->num_rows();
	}
    

}