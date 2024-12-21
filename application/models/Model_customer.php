<?php 

class Model_customer extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		
		 
	}   
	public function insert_new($data_user){
		
	        $store_id = $this->db->insert('customer' ,$data_user);  
			$insert_id = $this->db->insert_id();
			return ($store_id == true ) ? $insert_id : false;
			 
	}
	
	  function fetch_customer(){
	   
            $query = $this->db->select('*') 
                              ->from('customer'); 
                 $this->db->order_by("created desc");				 
             $q = $this->db->get();
	     return $q->result();
       }
  function fetch_customer_by_id($customer_id){
	   
            $query = $this->db->select('*') 
                 ->from('customer') 
                ->where("id",$customer_id); 
             $q = $this->db->get();
	     return $q->row();
       }  
   function fetch_customer_by_email($customer_id){
	   
            $query = $this->db->select('*') 
                 ->from('customer') 
                ->where("Email",$customer_id); 
             $q = $this->db->get();
	     return $q->row();
       }  
    
	public function is_exist_email($email){
		
			$this->db->select('*') 
						->from('customer')
						->where('email', $email)
						->limit('1');
			$q = $this->db->get();
			$mail = $q->row();
		if ($mail) {
			
			return $mail ;
		}else {
			
			return false ;
		}
			
	 } 
	     
	public function is_exist_phone($phone){
		
			$this->db->select('*') 
						->from('customer')
						->where('phone', $phone)
						->limit('1');
			$q = $this->db->get();
			$mail = $q->row();
		if ($mail) {
			
			return $mail ;
		}else {
			
			return false ;
		}
			
	 }
	 
	 public function update_compte ($id , $data) {
		 
		 if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('customer', $data);
			return ($update == true) ? true : false;
		}
	 } 
	 
	 public function change_pass($identity ,$pass) { 
		 
		   $query = $this->db->select('id , password ')
            ->where("id", $identity)
            ->where("password", $pass)
            ->limit(1)
            ->order_by('id', 'desc')
            ->get('customer');

        if ($query->num_rows() !== 1)
        {
             
            return FALSE;
        }else {
			
			
			return true ;
		} 
	 }
	 
	  public function remove_customer($id){
		 
		 
		 if($id) {
			  
         $this->db->where('user_id',$id);
	     $this->db->delete('like_unlike',$id);  

               $this->db->where('id',$id);
               $this->db->delete('customer');  

               $this->db->where('customer_id',$id);
               $this->db->delete('listings');  

               $this->db->where('user_id',$id);
	           $this->db->delete('listing_like',$id); 
			   
               $this->db->where('user_id',$id);
	           $this->db->delete('notifications'); 
			   
               $this->db->where('user_id',$id);
			   $this->db->delete('pack');     
			   
               $this->db->where('customer_id',$id);
		  $delete = $this->db->delete('facture');  
  
			return ($delete == true) ? true : false;
		}
		  
		 
	 }
	 
	 public function user_login($email, $password)
    {
         $this->db->where('email', $email);
         $q = $this->db->get('customer');

        if( $q->num_rows() ) 
        {
            $user_pass = $q->row('password');
            if(md5($password) === $user_pass) {
                return $q->row();
            }
            return FALSE;
        }else{
            return FALSE;
        }
    }
	 

}