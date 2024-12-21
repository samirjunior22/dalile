<?php 
	/**
	* 
	*/
	class Auth_model extends CI_Model
	{
		protected $table_name = 'customer';
		protected $primary_key = 'id';
		
		function __construct()
		{
			parent::__construct();
		}

		function login($email )
		{
			$this->db->where('email', $email);
			// $this->db->where('password', $password); 
			$this->db->limit('1');

			$q = $this->db->get($this->table_name);

			if($q->num_rows()===1){
				return $q->row();
			}else{
				return FALSE;
			}
		}
		 
		 function login_gros($email, $password, $user_group)
		{
			$this->db->where('phone', $email);
			$this->db->where('password', $password);
		    // $this->db->where('type', $user_group); 
			 
			$q = $this->db->get('markers_detail');

			if($q->num_rows()===1){
				return $q->row();
			}else{
				return FALSE;
			}
		}
		
	
	}
 ?>